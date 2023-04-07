<?php

namespace Lumis\Organization\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed $id
 * @property string $name
 * @property Collection $campuses
 */
class Branch extends Model
{
    use HasFactory, HasUuids;

    /**
     * The table name
     *
     * @var string
     */
    protected $table = 'app_organization_branches';

    /**
     * The primary key associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @param $name
     * @return Branch|null
     */
    public static function findByName($name): null|Branch
    {
        return static::where('name', $name)->first();
    }

    /**
     * Get all  campuses for the Branch
     *
     * @return HasMany
     */
    public function campuses(): HasMany
    {
        return $this->hasMany(Campus::class, 'branch_id');
    }

    /**
     * Search Scope for Laravel Livewire DataTable
     * @return Builder
     * @var string $term
     * @var Builder $query
     */
    public function scopeSearch(Builder $query, string $term): Builder
    {
        return $query->where(
            fn($query) => $query->where('name', 'like', "%{$term}%")
        );
    }

}
