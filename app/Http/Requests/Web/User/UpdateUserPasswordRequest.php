<?php

namespace App\Http\Requests\Web\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPasswordRequest extends FormRequest
{

    public function authorize(){
        return true;
    }


    public function rules(){
        return [
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
