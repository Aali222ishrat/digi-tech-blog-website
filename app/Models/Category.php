<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $primaryKey = 'cat_id';    // important: custom PK
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['name','slug','description'];

    // auto-generate slug if missing
    public static function boot()
    {
        parent::boot();

        static::creating(function ($cat) {
            if (empty($cat->slug)) {
                $cat->slug = Str::slug($cat->name);
            }
        });

        static::updating(function ($cat) {
            if (empty($cat->slug)) {
                $cat->slug = Str::slug($cat->name);
            }
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'cat_id');
    }
}
