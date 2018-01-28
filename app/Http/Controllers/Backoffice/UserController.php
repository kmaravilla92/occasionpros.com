<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{

    const VIEW = 'backoffice.users';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $APIResponse = $this->httpClient->get('api/users',[]);
        $users = $APIResponse['results'] ? $APIResponse['results'] : [];
        // $user_groups = collect($users)->groupBy('role');
        return view(self::VIEW.'.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = new User();
        $userProfile = null;
        return view(self::VIEW.'.edit', compact('user','userProfile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userCreate = $this->httpClient->post('api/users',[
            'form_params' => $request->all()
        ]);

        $results = $userCreate['results'];

        if(isset($results['data'])) {
            $user_id = $results['data']['id'];
            return redirect(route('backoffice.users.edit', [$user_id]))->with([
                'form' => [
                    'success' => 'User successfully created.'
                ]
            ]);
        }
        
        return back()
                ->withInput()
                ->with('customErrors',$userCreate['errors']['form_errors']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        $userProfile = $this->httpClient->get('api/users/' . $user->id, [
            'query' => [
                'relationships' => 'events,events.owner'
            ]
        ]);

        $userProfile = $userProfile['results']['data'];

        return view(self::VIEW.'.edit', compact('user','userProfile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userId)
    {
        $userUpdate = $this->httpClient->put('api/users/' . $userId,[
            'form_params' => array_merge(
                ['user_id' => $userId],
                $request->all()
            )
        ]);
        
        if(isset($userUpdate['results']['data'])){
            return back()
                    ->with([
                        'form' => [
                            'success' => 'User successfully updated.'
                        ]
                    ]);
        }

        return back()
                ->withInput()
                ->with('customErrors',$userUpdate['errors']['form_errors']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $userDelete = $this->httpClient->delete('api/users/' . $user->id);
        if($userDelete['results']['data']){
            return back()->with([
                'form' => [
                    'success' => 'User successfully deleted.'
                ]
            ]);
        }
    }
}
