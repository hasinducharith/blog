<?php

namespace App\Http\Requests\Web\Post;

use Illuminate\Foundation\Http\FormRequest;

class SearchPostRequest extends FormRequest
{

    public function authorize(){
        return true;
    }


    public function rules(){
        return [
            'Keyword'   => 'required'
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
