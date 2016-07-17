<?php

namespace Steller\Blog\Http\Requests;

use Auth;

/**
 * Class PostRequest
 *
 * @package Steller\Blog\Http\Requests
 */
class PostRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !Auth::guest() && Auth::getUser()->id !== $this->request->get('owner');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:posts',
            'body' => 'required|min:20',
            'blog_id' => 'required|exists:blogs,id',
            'owner_id' => 'required|exists:users,id',
        ];
    }
}
