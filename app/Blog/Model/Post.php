<?php

namespace Steller\Blog\Blog\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Steller\Blog\User;

/**
 * Class Post
 *
 * @package Steller\Blog\Model
 */
class Post extends Model
{
    use SoftDeletes;

    /** @var  array */
    protected $fillable = ['title', 'body', 'owner_id', 'blog_id'];

    /** @var  array */
    protected $dates = ['deleted_at',];

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
