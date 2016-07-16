<?php

namespace Steller\Blog\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Steller\Blog\User;

/**
 * Class Blog
 *
 * @package Blog\Model
 */
class Blog extends Model
{
    use SoftDeletes;

    /** @var  array */
    protected $fillable = ['name',];

    /** @var  array */
    protected $dates = ['deleted_at',];

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
