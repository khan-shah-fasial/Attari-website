<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $table = 'batches';
    
    protected $fillable = [
        'course_id',
        'paced_title',
        'paced_pointer_list',
        'oc_title',
        'oc_pointer_list',
        'batch_detail',
        'corp_title',
        'corp_pointer_list',
        'off_percentage',
        'status',
    ];
}
