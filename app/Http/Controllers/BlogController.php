<?php

namespace Steller\Blog\Http\Controllers;

use Illuminate\Http\Response;
use Steller\Blog\Model\Blog;

/**
 * Class BlogController
 *
 * @package Steller\Http\Controllers
 */
class BlogController extends Controller
{
    /**
     * GET /blog/get
     *
     * @param int $id
     *
     * @return Response
     */
    public function get(int $id = 0)
    {
        if (0 !== $id) {

        }

        return view('blogs.index', ['data' => 'here']);
    }

    /**
     *
     */
    public function create() : Response
    {

    }

    public function update() : Response
    {

    }

    public function delete($id) : Response
    {

    }
}
