<?php

namespace Lumis\Organization\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $id
 * @property string $code
 * @property string $name
 * @property mixed $faculty_id
 * @property Faculty $faculty
 */
class Department extends Model
{
    use HasFactory, HasUuids;

    /**
     * The table name
     *
     * @var string
     */
    protected $table = 'app_organization_departments';

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
    protected $fillable = ['code', 'name', 'faculty_id'];

    /**
     * @param string $name
     * @return Department|null
     */
    public static function findByName(string $name): null|Department
    {
        return static::where('name', $name)->first();
    }

    /**
     * @param string $code
     * @return Department|null
     */
    public static function findByCode(string $code): null|Department
    {
        return static::where('code', $code)->first();
    }

    /**
     * Get the faculty that owns the Department
     *
     * @return BelongsTo
     */
    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
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
            fn($query) => $query->where($this->table.'.code', 'like', "%{$term}%")
                ->orwhere($this->table.'.name', 'like', "%{$term}%")
        );
    }

}
