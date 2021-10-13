<?php

namespace App\Http\Requests\Web\Comment;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
{

    public function authorize(){
        return true;
    }


    public function rules(){
        return [
            'name'          => 'required|max:20',
            'email'         => 'required|email',
            'feedback'      => 'required',
            'post_id'       => 'required',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
