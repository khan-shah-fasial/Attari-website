<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCovered extends Model
{
    use HasFactory;

    protected $table = 'project_covered';

    protected $fillable = [
        'title_no',
        'course_id',
        'title',
        'description',
        'icon',
        'status',
    ];
}
