<?php

namespace Lumis\Organization\Entities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property mixed $id
 * @property string $name
 * @property mixed $opening_date
 * @property mixed $closing_date
 * @property mixed $starting_year
 * @property mixed $ending_year
 * @property string $status
 */
class FinancialYear extends Model
{
    use HasFactory, HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'app_organization_financial_year';

    /**
     * The primary key associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['name', 'opening_date', 'closing_date', 'starting_year', 'ending_year', 'status'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'opening_date' => 'date:Y-m-d',
        'closing_date' => 'date:Y-m-d'
    ];

    /**
     * @return static
     */
    public static function getInstance(): static
    {
        return new static();
    }

    /**
     * @return mixed
     */
    public static function getCurrent(): mixed
    {
        return static::where('status', 'Active')->first();
    }

    /**
     * @return mixed
     */
    public static function getNext():mixed
    {
        $current = static::getCurrent();
        $currentStartYear = $current->getStartYear();
        $currentEndYear = $current->getEndYear();

        $nextStartYear = $currentStartYear + 1;
        $nextEndYear = $currentEndYear + 1;

        return static::where('starting_year', $nextStartYear)
            ->where('ending_year', $nextEndYear)
            ->first();
    }

    /**
     * @return mixed
     */
    public static function getPrevious(): mixed
    {
        $current = static::getCurrent();
        $currentStartYear = $current->getStartYear();
        $currentEndYear = $current->getEndYear();

        $previousStartYear = $currentStartYear - 1;
        $previousEndYear = $currentEndYear - 1;

        return static::where('starting_year', $previousStartYear)
            ->where('ending_year', $previousEndYear)
            ->first();

    }

    /**
     * @param string $name
     * @return mixed
     */
    public static function getByName(string $name): mixed
    {
        return static::where('name', $name)->first();
    }

    /**
     * @return FinancialYear|null
     */
    public static function getDraft(): ?static
    {
        return static::where('status', 'Draft')->first();
    }

    /**
     * @return Collection
     */
    public static function getHistory(): Collection
    {
        return static::where('status', 'Inactive')->latest()->get();
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->status === "Active";
    }

    /**
     * @return bool
     */
    public function isInActive(): bool
    {
        return $this->status === "Inactive";
    }

    /**
     * @return bool
     */
    public function isDraft(): bool
    {
        return $this->status === "Draft";
    }

    /**
     * @return static
     */
    public function activate(): static
    {
        $this->setAttribute('status', 'Active');
        return $this;
    }

    /**
     * @return static
     */
    public function deactivate(): static
    {
        $this->setAttribute('status', 'Inactive');
        return $this;
    }

    /**
     * @return static
     */
    public function revertToDraft(): static
    {
        $this->setAttribute('status', 'Draft');
        return $this;
    }

    /**
     * @return void
     */
    public function setStartYear(): void
    {
        if (!empty($this->opening_date)) {
            $startingYear = Carbon::createFromDate($this->opening_date)->format('Y');
            $this->setAttribute('starting_year', $startingYear);
        }
    }

    /**
     * @return static
     */
    public function setEndYear(): static
    {
        if (!empty($this->closing_date)) {
            $endingYear = Carbon::createFromDate($this->closing_date)->format('Y');
            $this->setAttribute('ending_year', $endingYear);
        }
        return $this;
    }

    /**
     * @return static
     */
    public function setName(): static
    {
        if (!empty($this->opening_date) && !empty($this->closing_date)) {

            $openMonth = Carbon::createFromDate($this->opening_date)->format('M');
            $openYear = Carbon::createFromDate( $this->opening_date)->format('Y');

            $closeMonth = Carbon::createFromDate($this->closing_date)->format('M');
            $closeYear = Carbon::createFromDate($this->closing_date)->format('Y');

            $name = "{$openMonth}{$openYear}-{$closeMonth}{$closeYear}";
            $this->setAttribute('name', $name);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartYear(): mixed
    {
        return $this->getAttribute('starting_year');
    }

    /**
     * @return mixed
     */
    public function getEndYear(): mixed
    {
        return $this->getAttribute('ending_year');
    }

    /**
     * @return mixed
     */
    public function getStartDate(): mixed
    {
        return $this->getAttribute('opening_date');
    }

    /**
     * @return mixed
     */
    public function getCloseDate(): mixed
    {
        return $this->getAttribute('closing_date');
    }

    /**
     * @return mixed
     */
    public function getName(): mixed
    {
        return $this->getAttribute('name');
    }

    /**
     * Status
     *
     * @return string
     */
    public function statusBadge(): string
    {
        if ($this->isActive()) {
            return "<span class='badge badge-success py-1 text-white'>{$this->status}</span>";
        }elseif($this->isDraft()) {
            return "<span class='badge badge-info py-1 text-white'>{$this->status}</span>";
        }else{
            return "<span class='badge badge-danger py-1 text-white'>{$this->status}</span>";
        }

    }

    /**
     * @return string
     */
    public function formatStartDate(): string
    {
        return Carbon::createFromDate($this->opening_date)->format('d-M-Y');
    }

    /**
     * @return string
     */
    public function formatCloseDate(): string
    {
        return Carbon::createFromDate($this->closing_date)->format('d-M-Y');
    }


}
