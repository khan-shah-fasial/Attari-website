<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextReview extends Model
{
    use HasFactory;

    protected $table = 'text_reviews';
    protected $fillable = [
        'course_id',
        'name',
        'description',
        'thumbnail',
        'type',
        'profile',
        'url',
        'status',
    ];   
}
