<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Prof
 *
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Chair> $chairs
 * @property-read int|null $chairs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Prof newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prof newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prof query()
 * @method static \Illuminate\Database\Eloquent\Builder|Prof whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prof whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prof whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prof whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prof whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prof whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Prof extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "first_name", "last_name"
    ];

    function chairs(): HasMany
    {
        return $this->hasMany(Chair::class);
    }
}
