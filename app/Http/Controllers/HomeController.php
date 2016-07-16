<?php

namespace Steller\Blog\Http\Controllers;

use Illuminate\Http\Response;
use Steller\Blog\Http\Requests;
use Illuminate\Http\Request;

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
     * @return Response
     */
    public function index() : Response
    {
        return view('home');
    }
}
