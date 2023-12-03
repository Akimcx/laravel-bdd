<?php

namespace App\Models;

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
    ];

    public function courses(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function schools(): BelongsTo
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class)->withPivot('is_present');
    }
}
