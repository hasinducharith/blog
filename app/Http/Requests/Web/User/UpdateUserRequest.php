<?php

namespace App\Http\Requests\Web\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    public function authorize(){
        return true;
    }


    public function rules(){
        return [
            'name'            => 'required',
            'role'            => 'required',
            'email'           => 'required|email'
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
