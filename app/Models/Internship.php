<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Internship
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Internship newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Internship newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Internship query()
 * @method static \Illuminate\Database\Eloquent\Builder|Internship whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Internship whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Internship whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Internship extends Model
{
    use HasFactory;
}
