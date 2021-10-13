<?php

namespace App\Http\Requests\Web\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{

    public function authorize(){
        return true;
    }


    public function rules(){
        return [
            'title'            => 'required',
            'description'      => 'required',
            'category_id'      => 'required',
            'image'            => 'nullable|sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
