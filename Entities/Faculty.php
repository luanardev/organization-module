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
 * @property string $code
 * @property string $name
 * @property Collection $departments
 */
class Faculty extends Model
{
    use HasFactory, HasUuids;

    /**
     * The table name
     *
     * @var string
     */
    protected $table = 'app_organization_faculties';

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
    protected $fillable = ['code', 'name'];

    /**
     * @param string $name
     * @return Faculty|null
     */
    public static function findByName(string $name): null|Faculty
    {
        return static::where('name', $name)->first();
    }

    /**
     * @param string $code
     * @return Faculty|null
     */
    public static function findByCode(string $code): null|Faculty
    {
        return static::where('code', $code)->first();
    }

    /**
     * Get all departments for the Faculty
     *
     * @return HasMany
     */
    public function departments(): HasMany
    {
        return $this->hasMany(Department::class, 'faculty_id');
    }

    /**
     * Search Scope for Laravel Livewire DataTable
     * @var Builder $query
     * @var string $term
     * @return Builder
     */
    public function scopeSearch(Builder $query, string $term): Builder
    {
        return $query->where(
            fn($query) => $query->where('code', 'like', "%{$term}%")
                ->orwhere('name', 'like', "%{$term}%")
        );
    }


}
