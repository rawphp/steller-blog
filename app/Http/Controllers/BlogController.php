<?php

namespace Steller\Blog\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;
use Steller\Blog\Blog\Model\Blog;
use Steller\Blog\Http\Requests\BlogRequest;

/**
 * Class BlogController
 *
 * @package Steller\Http\Controllers
 */
class BlogController extends Controller
{
    /**
     * GET /blogs
     *
     * @return View
     */
    public function index() : View
    {
        $blogs = Blog::all();

        return view('blogs.index', ['blogs' => $blogs]);
    }

    /**
     * GET /blogs/{id}
     *
     * @param int $id
     *
     * @return View|RedirectResponse
     */
    public function view(int $id)
    {
        $blog = Blog::with('posts.comments')->find($id);

        if (null === $blog) {
            Session::flash('error', 'Blog not found');

            return Redirect::back();
        }

        return view('blogs.show', ['blog' => $blog]);
    }

    /**
     * GET /blogs/create
     *
     * @return View
     */
    public function create() : View
    {
        return view('blogs.create', ['owner' => $this->user->id]);
    }

    /**
     * POST /blogs/store
     *
     * @param BlogRequest $request
     *
     * @return Redirect
     */
    public function store(BlogRequest $request) : RedirectResponse
    {
        $blog = Blog::create($request->all());

        Session::flash('message', 'Successfully created blog!');

        return redirect(route('blog_view', ['blog' => $blog->id]));
    }

    /**
     * GET /blogs/update/{id}
     *
     * @param int $id
     *
     * @return View
     */
    public function edit(int $id) : View
    {
        $blog = Blog::find($id);

        return view('blogs.edit', ['blog' => $blog]);
    }

    /**
     * PUT /blogs/update/{id}
     *
     * @param BlogRequest $request
     * @param int $id
     *
     * @return Redirect
     */
    public function update(BlogRequest $request, int $id)
    {
        /** @var Blog $blog */
        $blog = Blog::find($id);

        $blog->name = Input::get('name');

        $blog->save();

        Session::flash('message', 'Successfully updated blog!');

        return redirect(route('blog_view', ['blog' => $blog->id]));
    }

    /**
     * DELETE /blogs/delete/{id}
     *
     * @param int $id
     *
     * @return Redirect
     */
    public function destroy(int $id)
    {
        /** @var Blog $blog */
        $blog = Blog::find($id);

        $blog->delete();

        Session::flash('message', 'Successfully deleted blog!');

        return redirect(route('blogs'));
    }
}
