<?php

namespace App\Http\Requests\Web\Post;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{

    public function authorize(){
        return true;
    }


    public function rules(){
        return [
            'title'          => 'required',
            'description'      => 'required',
            'category_id'      => 'required',
            'image'            => 'image|mimes:jpeg,png,jpg|max:2048|required',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
