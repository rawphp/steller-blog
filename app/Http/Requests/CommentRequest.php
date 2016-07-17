<?php

namespace Steller\Blog\Http\Requests;

use Auth;

/**
 * Class CommentRequest
 *
 * @package Steller\Blog\Http\Requests
 */
class CommentRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !Auth::guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required|min:20',
            'user_id' => 'required|exists:users,id',
            'post_id' => 'required|exists:posts,id',
        ];
    }
}
