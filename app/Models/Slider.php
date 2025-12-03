<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    // Add the fields you want to allow mass assignment
    protected $fillable = [
        'title',
        'description',
        'button_text',
        'button_url',
        'image',
        'status',
    ];
}
