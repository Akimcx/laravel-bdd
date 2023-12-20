<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sigle',
        'name',
        'address',
        'phone',
        'email',
        'url',
    ];


    public function scopeWtoCourse(Builder $query, int $course_id): void
    {
        $query->doesntHave('courses')
            ->orwhereNot(function ($query) use ($course_id) {
                $query->whereHas('courses', function ($q) use ($course_id) {
                    $q->where('course_id', $course_id);
                });
            });
    }

    public function scopeWithInstructors(Builder $query, $id): void
    {
        $query->whereHas('instructors', function ($q) use ($id) {
            is_numeric($id) ? $q->where('instructor_id', $id) :  $q->whereIn('instructor_id', $id);
        });
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }

    public function instructors(): BelongsToMany
    {
        return $this->belongsToMany(Instructor::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }
}
