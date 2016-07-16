<?php

namespace Steller\Blog\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 *
 * @package Steller\Blog\Model
 */
class Comment extends Model
{
    /** @var  array */
    protected $fillable = [
      'content'
    ];
}
