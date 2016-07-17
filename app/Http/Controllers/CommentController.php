<?php

namespace Steller\Blog\Http\Controllers;

use Redirect;
use Session;
use Steller\Blog\Blog\Model\Post;
use Steller\Blog\Http\Requests\CommentRequest;

/**
 * Class CommentController
 *
 * @package Steller\Blog\Http\Controllers
 */
class CommentController extends Controller
{
    /**
     * POST /blogs/{id}/posts/{id}/comments/store
     *
     * @param CommentRequest $request
     * @param int $blogId
     * @param int $postId
     *
     * @return Redirect
     */
    public function store(CommentRequest $request, int $blogId, int $postId)
    {
        /** @var Post $post */
        $post = Post::find($postId);

        $post->comments()->create($request->all());

        Session::flash('message', 'Successfully created comment!');

        return redirect(route('post_view', ['blog' => $blogId, 'post' => $postId]));
    }
}
