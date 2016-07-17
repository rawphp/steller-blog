<?php

namespace Steller\Blog\Http\Controllers;

use CreatePostsTable as Posts;
use DB;
use Illuminate\View\View;

/**
 * Class HomeController
 *
 * @package Steller\Blog\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index() : View
    {
        $posts = DB::table(Posts::TABLE)
                   ->orderBy('created_at')
                   ->limit(10)
                   ->get();

        return view('home', ['posts' => $posts]);
    }
}
