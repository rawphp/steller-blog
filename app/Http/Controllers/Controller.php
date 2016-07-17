<?php

namespace Steller\Blog\Http\Controllers;

use Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Steller\Blog\User;

/**
 * Class Controller
 *
 * @package Steller\Blog\Http\Controllers
 */
class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    /** @var  User */
    protected $user;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->user = Auth::user();
    }
}
