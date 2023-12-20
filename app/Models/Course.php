<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description'
    ];

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }

    public function instructors(): BelongsToMany
    {
        return $this->belongsToMany(Instructor::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }

    public function schools(): BelongsToMany
    {
        return $this->belongsToMany(School::class);
    }

    public function scopeInstructors(Builder $builder, $id): void
    {
        $builder->whereHas('instructors', function ($q) use ($id) {
            is_array($id) ? $q->whereIn('instructor_id', $id) : $q->where('instructor_id', $id);
        });
    }

    public function scopeSchools(Builder $builder, $id): void
    {
        $builder->whereHas('schools', function ($q) use ($id) {
            is_array($id) ? $q->whereIn('school_id', $id) : $q->where('school_id', $id);
        });
    }
}
