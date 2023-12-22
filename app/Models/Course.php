<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator_user_id',
        'name',
        'code',
        'course_credit',
        'lab_credit',
        'type',
        'short_description',
        'minimal_requirement',
        'study_material_summary',
        'learning_media',
    ];
}
