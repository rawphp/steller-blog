<?php

namespace Steller\Blog\Blog\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Steller\Blog\User;

/**
 * Class Blog
 *
 * @package Steller\Blog\Blog\Model
 */
class Blog extends Model
{
    use SoftDeletes;

    /** @var  array */
    protected $fillable = ['name', 'owner_id', 'is_active'];

    /** @var  array */
    protected $dates = ['deleted_at',];

    /**
     * Get owner blog.
     *
     * @return BelongsTo
     */
    public function owner() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get blog posts.
     *
     * @return HasMany
     */
    public function posts() : HasMany
    {
        return $this->hasMany(Post::class);
    }
}
