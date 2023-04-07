<?php

namespace Lumis\Organization\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Lumis\Organization\Concerns\CampusPicker;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * @property mixed id
 * @property string code
 * @property string name
 * @property mixed branch_id
 * @property Branch branch
 */
class Campus extends Model
{
    use HasFactory, HasUuids, CampusPicker;

    /**
     * The table name
     *
     * @var string
     */
    protected $table = 'app_organization_campuses';

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
    protected $fillable = ['code', 'name', 'branch_id'];

    /**
     * Get Campus Model By Name
     * @param string $name
     * @return Campus|null
     */
    public static function findByName(string $name): null|Campus
    {
        return static::where('name', $name)->first();
    }

    /**
     * Get Campus Model By Code
     * @param string $code
     * @return Campus|null
     */
    public static function findByCode(string $code): null|Campus
    {
        return static::where('code', $code)->first();
    }

    /**
     * Get Campus By Authenticated User
     * @return Collection
     */
    public static function getByUser(): Collection
    {
        $campusList = collect();

        try {
            $campus = static::getUserCampus();
            if (empty($campus)) {
                $campusList = static::get();
            } else {
                $campusList->add($campus);
            }
            return $campusList;
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
        }


    }

    /**
     * Get the branch that owns the Campus
     *
     * @return BelongsTo
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'branch_id');
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
