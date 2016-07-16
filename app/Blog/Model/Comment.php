<?php

namespace Steller\Blog\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comment
 *
 * @package Steller\Blog\Model
 */
class Comment extends Model
{
    use SoftDeletes;

    /** @var  array */
    protected $fillable = ['content'];

    /** @var  array */
    protected $dates = ['deleted_at',];
}
