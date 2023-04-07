<?php

namespace Lumis\Organization\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 * @property string $name
 */
class Section extends Model
{
    use HasFactory, HasUuids;

    /**
     * The table name
     *
     * @var string
     */
    protected $table = 'app_organization_sections';

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
     * @param string $name
     * @return Section|null
     */
    public static function findByName(string $name): null|Section
    {
        return static::where('name', $name)->first();
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
