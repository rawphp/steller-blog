<?php

namespace Steller\Blog\Http\Controllers;

use Illuminate\View\View;

/**
 * Class HomeController
 *
 * @package Steller\Blog\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index() : View
    {
        return view('home');
    }
}
