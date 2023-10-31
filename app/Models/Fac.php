<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Fac
 *
 * @property int $id
 * @property string $sigle
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Chair> $chairs
 * @property-read int|null $chairs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Fac newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fac newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fac query()
 * @method static \Illuminate\Database\Eloquent\Builder|Fac whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fac whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fac whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fac whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fac whereSigle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fac whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Fac extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name", "sigle"
    ];

    function chairs(): HasMany
    {
        return $this->hasMany(Chair::class);
    }
}
