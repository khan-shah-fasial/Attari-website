<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learnings extends Model
{
    use HasFactory;

    protected $table = 'learnings';

    protected $fillable = [
        'course_id',
        'slug',
        'heading_pdf_title',
        'pdf',
        'schedule_title',
        'testimonials_title',
        'faq_title',
        'faq',
        'page',
        'more_info',
        'statement',
        'youtube_url',
        'status',
    ];
}
