<?php

namespace App\Http\Requests\Web\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{

    public function authorize(){
        return true;
    }


    public function rules(){
        return [
            'name'            => 'required',
            'email'           => 'required|email|unique:users,email',
            'role'            => 'required',
            'password'        => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
