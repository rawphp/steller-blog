<?php

namespace Steller\Blog\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Steller\Blog\User;

/**
 * Class Blog
 *
 * @package Blog\Model
 */
class Blog extends Model
{
    /** @var  array */
    protected $fillable = [
        'name',
    ];

    /**
     * Get owner blog.
     *
     * @return BelongsTo
     */
    public function blog() : BelongsTo
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
