<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //it will check if posted comment is written by author or not
//        $comment = Comment::find($this->route('comment'));
//
//        return $comment && $this->user()->can('create', $comment);
        return false;
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
            'description' => 'required|max:255',
        ];
    }
}
