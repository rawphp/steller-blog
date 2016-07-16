<?php

namespace Steller\Blog\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

/**
 * Class VerifyCsrfToken
 *
 * @package Steller\Blog\Http\Middleware
 */
class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [];
}
