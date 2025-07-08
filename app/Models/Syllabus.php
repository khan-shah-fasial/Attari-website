<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    use HasFactory;

    protected $table = 'syllabus';

    protected $fillable = [
        'title_no',
        'course_id',
        'title',
        'description',
        'status',
    ];
}
