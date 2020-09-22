<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        $comment = Comment::find($this->route('comment'));
//
//        return $comment && $this->user()->can('create', $comment);

        //by default it is return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post_id' => 'required',
            'user_id' => 'required',
            'description' => 'required|max:255|string',
        ];
    }
}
