<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PostTag extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string|null
     */
    protected $table = 'blog_post_tags';
}
