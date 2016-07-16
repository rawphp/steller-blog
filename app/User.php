<?php

namespace Steller\Blog;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Steller\Blog\Model\Blog;

/**
 * Class User
 *
 * @package Steller\Blog
 */
class User extends Authenticatable
{
    /** @var  array */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /** @var  array */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get user blogs.
     *
     * @return HasMany
     */
    public function blogs() : HasMany
    {
        return $this->hasMany(Blog::class);
    }
}