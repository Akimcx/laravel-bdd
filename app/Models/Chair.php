<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Chair
 *
 * @property int $id
 * @property string $vacation
 * @property int $prof_id
 * @property int $fac_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Fac $fac
 * @property-read \App\Models\Prof $prof
 * @method static \Illuminate\Database\Eloquent\Builder|Chair newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chair newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chair query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chair whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chair whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chair whereFacId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chair whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chair whereProfId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chair whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chair whereVacation($value)
 * @mixin \Eloquent
 */
class Chair extends Model
{
    use HasFactory;

    protected $fillable = [
        "dates",
        "prof_id",
        "fac_id",
        "vacation",
    ];

    public function scopeOrderByField(Builder $query, string $table, string $direction = 'asc')
    {
        if ($table == "vacation" || $table == "dates") {
            $query->orderBy($table, $direction);
            return;
        }
        $model = $table == 'profs' ? Prof::class : Fac::class;
        $id = $table == 'profs' ? 'prof_id' : 'fac_id';
        if ($direction == 'desc') {
            $query->orderByDesc(
                $model::select($table . '.name')
                    ->whereColumn($table . '.id', $id)
            );
        } else {
            $query->orderBy(
                $model::select($table . '.name')
                    ->whereColumn($table . '.id', $id)
            );
        }
    }

    function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    function prof(): BelongsTo
    {
        return $this->belongsTo(Prof::class);
    }

    function fac(): BelongsTo
    {
        return $this->belongsTo(Fac::class);
    }
}
