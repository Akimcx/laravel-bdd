<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'session_date',
        'course_id',
        'school_id',
        'instructor_id',
    ];

    protected $casts = [
        'session_date' => 'date'
    ];

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class)->withPivot('is_present')->using(SessionStudent::class);
    }

    public function scopeSchools(Builder $query, $id): void
    {
        if (is_numeric($id)) {
            $query->where('school_id', $id);
        } else {
            $query->whereIn('school_id', $id);
        }
    }
    public function scopeCourses(Builder $query, $id): void
    {
        if (is_numeric($id)) {
            $query->where('course_id', $id);
        } else {
            $query->whereIn('course_id', $id);
        }
    }
    public function scopeInstructors(Builder $query, $id): void
    {
        if (is_numeric($id)) {
            $query->where('instructor_id', $id);
        } else {
            $query->whereIn('instructor_id', $id);
        }
    }
}
