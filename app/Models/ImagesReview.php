<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesReview extends Model
{
    use HasFactory;

    protected $table = 'images_reviews';

    protected $fillable = [
        'course_id',
        'image',
        'status',
        'date',
    ];
}
