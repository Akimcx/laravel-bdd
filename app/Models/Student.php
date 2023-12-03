<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'school_id'
    ];

    public function scopeInSchoolForCourse($query, $schoolId, $courseId): void
    {
        $query->whereHas('school', function ($q) use ($schoolId) {
            $q->where('school_id', $schoolId);
        })->whereHas('courses', function ($q) use ($courseId) {
            $q->where('course_id', $courseId);
        });
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }

    public function sessions(): BelongsToMany
    {
        return $this->belongsToMany(Session::class)->withPivot('is_present');
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
