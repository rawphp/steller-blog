<?php

namespace Steller\Blog\Http\Controllers;

use DateTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Redirect;
use Session;
use Steller\Blog\Blog\Model\Blog;
use Steller\Blog\Blog\Model\Post;
use Steller\Blog\Http\Requests\PostRequest;

/**
 * Class PostController
 *
 * @package Steller\Blog\Http\Controllers
 */
class PostController extends Controller
{
    /**
     * GET /posts
     *
     * @return View
     */
    public function index() : View
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * GET /blogs/{id}/posts/{id}
     *
     * @param int $blogId
     * @param int $id
     *
     * @return RedirectResponse|View
     */
    public function view(int $blogId, int $id)
    {
        $post = Post::find($id);

        if (null === $post) {
            Session::flash('error', 'Post not found');

            return Redirect::back();
        }

        $post->publishedAt = (new DateTime($post->published_at))->getTimestamp();

        $user = $this->user ? $this->user->id : 0;

        return view('posts.show', ['blog' => $blogId, 'post' => $post, 'user' => $user]);
    }

    /**
     * GET /blogs/{id}/posts/create
     *
     * @param int $blogId
     *
     * @return View
     */
    public function create(int $blogId) : View
    {
        return view(
            'posts.create',
            [
                'blog_id' => $blogId,
                'owner' => $this->user->id,
            ]
        );
    }

    /**
     * POST /blogs/{id}/posts/store
     *
     * @param PostRequest $request
     * @param int $blogId
     *
     * @return Redirect
     */
    public function store(PostRequest $request, int $blogId)
    {
        /** @var Blog $blog */
        $blog = Blog::find($blogId);

        $post = $blog->posts()->create($request->all());

        Session::flash('message', 'Successfully created post!');

        return redirect(route('post_view', ['blog' => $blogId, 'post' => $post->id]));
    }

    /**
     * GET /blogs/{id}/posts/update/{id}
     *
     * @param int $blogId
     * @param int $id
     *
     * @return View
     */
    public function edit(int $blogId, int $id) : View
    {
        $post = Post::find($id);

        return view('posts.edit', ['blog' => $blogId, 'post' => $post]);
    }

    /**
     * POST /blogs/{id}/posts/update/{id}
     *
     * @param PostRequest $request
     * @param int $blogId
     * @param int $id
     *
     * @return Redirect
     */
    public function update(PostRequest $request, int $blogId, int $id)
    {
        /** @var Post $post */
        $post = Post::find($id);

        $post->title = $request->get('title');
        $post->body  = $request->get('body');

        $post->save();

        Session::flash('message', 'Successfully updated post!');

        return redirect(route('post_view', ['blog' => $blogId, 'post' => $post->id]));
    }

    /**
     * DELETE /blogs/{id}/posts/delete/{id}
     *
     * @param int $blogId
     * @param int $id
     *
     * @return Redirect
     */
    public function destroy(int $blogId, int $id)
    {
        /** @var Post $post */
        $post = Post::find($id);

        $post->delete();

        Session::flash('message', 'Successfully deleted post!');

        return redirect(route('blog_show', ['blog' => $blogId]));
    }
}