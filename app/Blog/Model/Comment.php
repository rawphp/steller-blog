<?php

namespace Steller\Blog\Blog\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Steller\Blog\User;

/**
 * Class Comment
 *
 * @package Steller\Blog\Model
 */
class Comment extends Model
{
    use SoftDeletes;

    /** @var  array */
    protected $fillable = ['content', 'post_id', 'user_id'];

    /** @var  array */
    protected $dates = ['deleted_at',];

    /**
     * Get comment owner.
     *
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
