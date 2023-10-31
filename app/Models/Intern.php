<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Intern
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Intern newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Intern newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Intern query()
 * @method static \Illuminate\Database\Eloquent\Builder|Intern whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intern whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Intern whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Intern extends Model
{
    use HasFactory;
}
