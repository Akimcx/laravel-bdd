<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
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

    public function getNameAttribute(): string
    {
        return $this->attributes['first_name'] . ' ' . strtoupper($this->attributes['last_name']);
    }

    public function scopeCourses($query, $id): void
    {
        $query->whereHas('courses', function ($q) use ($id) {
            $q->whereIn('course_id', is_numeric($id) ? [$id] : $id);
        });
    }

    public function scopeSchools($query, $id): void
    {
        $query->whereIn('school_id', is_numeric($id) ? [$id] : $id);
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }

    public function sessions(): BelongsToMany
    {
        return $this->belongsToMany(Session::class)->withPivot('is_present')->using(SessionStudent::class);
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
