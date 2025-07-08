<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wati extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'contact';
    // protected $fillable = [
    //     'text_testimonial',
    //     'video_testimonial',
    //     'batch_schedule',
    // ];

}
