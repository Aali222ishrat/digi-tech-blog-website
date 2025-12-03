<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;   // <-- IMPORTANT import

class Blog extends Model
{
    protected $fillable = [
    'title',
    'slug',
    'short_description',
    'content',
    'category_id',
    'tags',
    'featured_image',
    'publish_date',
    'status',
    'allow_comments',
    'author_id',
];

// 🔥 Many-to-Many Relationship
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
{
    return $this->hasMany(Comment::class);
}

public function author()
{
    return $this->belongsTo(User::class, 'author_id');
}

public function category() {
    return $this->belongsTo(Category::class, 'category_id', 'cat_id');
}
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
