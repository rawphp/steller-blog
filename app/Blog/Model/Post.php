<?php

namespace Steller\Blog\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Steller\Blog\User;

/**
 * Class Post
 *
 * @package Steller\Blog\Model
 */
class Post extends Model
{
    /** @var  array */
    protected $fillable = [
        'title', 'body',
    ];

    /**
     * Get owner blog.
     *
     * @return BelongsTo
     */
    public function blog() : BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    /**
     * @return BelongsTo
     */
    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get post comments.
     *
     * @return HasMany
     */
    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
