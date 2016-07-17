<?php

namespace Steller\Blog;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Steller\Blog\Blog\Model\Blog;
use Steller\Blog\Blog\Model\Post;

/**
 * Class User
 *
 * @package Steller\Blog
 */
class User extends Authenticatable
{
    use SoftDeletes;

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

    /**
     * Get user posts.
     *
     * @return HasMany
     */
    public function posts() : HasMany
    {
        return $this->hasMany(Post::class);
    }
}
