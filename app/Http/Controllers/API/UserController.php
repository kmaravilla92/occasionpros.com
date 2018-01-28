<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Users\Store as StoreUser;
use App\Http\Requests\API\Users\Update as UpdateUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Repositories\User as UserRepository;
use App\User as UserEntity;
use Sentinel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = UserRepository::findAll($request->all());

        $this->responseData['results'] = $users;

        return response()->json($this->responseData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->userRepository->update($id, $request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $response = [
            'statusCode'    => 200,
            'errors'        => null,
            'message'       => null,
            'results'       => [
                'data' => null
            ]
        ];

        $user = [
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'name'          => $request->first_name . ' ' . $request->first_name,
            'email'         => $request->email,
            'password'      => $request->password,
        ];

        $sentinel_user = Sentinel::registerAndActivate($user); 
        
        if($sentinel_user) {
            if(isset($request->roles) && count($request->roles) > 0) {
                foreach($request->roles as $role) {
                    $user_role = Sentinel::findRoleById($role);
                    $user_role->users()->attach($sentinel_user);
                }
            }
            $response['results']['data'] = $sentinel_user;
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null, Request $request)
    {
        $user = UserRepository::findById($id, [
            'relationships' =>  $request->relationships
        ]);

        $this->responseData['results']['data'] = $user;
        
        return response()->json($this->responseData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {
        $response = [
            'statusCode'    => 200,
            'errors'        => null,
            'message'       => null,
            'results'       => [
                'data' => null
            ]
        ];

        $user = [
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'name'          => $request->first_name . ' ' . $request->last_name,
            'email'         => $request->email,
            'password'      => bcrypt($request->password)
        ];

        $sentinel_user = Sentinel::findById($id);
        $_user = UserEntity::find($id);
        
        if($sentinel_user->update($user)) {

            unset(
                $user['password']
            );

            $_user->update($user);
            $_profile_information = $_user->profileInformation;
            if($_profile_information){
                unset(
                    $user['name'],
                    $user['email']
                );
                $_profile_information->update($user);
            }

            if(isset($request->roles) && count($request->roles) > 0) {
                foreach($request->roles as $role) {
                    $user_role = Sentinel::findRoleById($role);
                    $user_role->users()->detach($sentinel_user);
                    $user_role->users()->attach($sentinel_user);
                }
            }
            $response['results']['data'] = $sentinel_user;
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserEntity $user)
    {
        $response = [
            'statusCode'    => 200,
            'errors'        => null,
            'message'       => null,
            'results'       => [
                'data' => null
            ]
        ];

        $response['results']['data'] = $user->delete();

        return response()->json($response);
    }
}
