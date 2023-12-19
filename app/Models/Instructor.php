<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instructor extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email'
    ];

    public function getNameAttribute()
    {
        return $this->attributes['first_name'] . ' ' . strtoupper($this->attributes['last_name']);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }

    public function schools(): BelongsToMany
    {
        return $this->belongsToMany(School::class);
    }


    public function scopeInCourses($query, $id): void
    {
        $query->whereHas('courses', function ($q) use ($id) {
            $q->whereIn('course_id', is_numeric($id) ? [$id] : $id);
        });
    }

    public function scopeInSchools($query, $id): void
    {
        $query->whereHas('schools', function ($q) use ($id) {
            $q->whereIn('school_id', is_numeric($id) ? [$id] : $id);
        });
    }
}
