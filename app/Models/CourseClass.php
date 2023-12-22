<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'syllabus_id',
        'creator_user_id',
        'name',
        'thumbnail_img',
        'class_code',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function syllabus(): BelongsTo
    {
        return $this->belongsTo(Syllabus::class);
    }
}
