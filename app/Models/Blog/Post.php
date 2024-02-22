<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The table that maintains the data.
     *
     * @var string
     */
    protected $table = 'blog_posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'body',
        'published_by',
        'published_at',
        'created_by',
    ];

    protected $casts = [
        'published_at' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * Get validation rules for model
     *
     * @return array Validation rules
     */
    public static function getValidationRules(): array
    {
        return [
            'title' => 'required|string|min:1|max:255',
            'slug' => 'required|string',
            'body' => 'required|string',
        ];
    }
}
