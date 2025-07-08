<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoReview extends Model
{
    use HasFactory;

    protected $table = 'video_reviews';

    protected $fillable = [
        'course_id',
        'image',
        'url',
        'status',
    ];
}
