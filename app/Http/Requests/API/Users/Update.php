<?php

namespace App\Http\Requests\API\Users;

use App\Http\Requests\RequestBase;
use Illuminate\Validation\Rule;

class Update extends RequestBase
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $user_id = $this->input('user_id');

        return [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => [
                'required',
                Rule::unique('users')->ignore($user_id),
            ],
            'password'      => 'sometimes|confirmed'
        ];
    }
}
