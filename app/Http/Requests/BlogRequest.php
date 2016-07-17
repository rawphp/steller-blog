<?php

namespace Steller\Blog\Http\Requests;

use Auth;

/**
 * Class BlogRequest
 *
 * @package Steller\Blog\Http\Requests
 */
class BlogRequest extends Request
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
            'name' => 'required|unique:blogs',
            'owner_id' => 'required|exists:users,id',
        ];
    }
}
