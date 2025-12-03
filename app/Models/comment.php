<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = ['blog_id','name','email','comment','status','is_approved'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
