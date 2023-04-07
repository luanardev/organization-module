<?php

namespace Lumis\Organization\Settings;

use Illuminate\Support\Carbon;
use Luanardev\Settings\Settings;
use Lumis\Organization\Entities\FinancialYear;

class FinancialConfig extends Settings
{
    public ?string $start_date;
    public ?string $start_month;
    public ?string $start_year;
    public ?string $end_date;
    public ?string $end_month;
    public ?string $end_year;

    public static function group(): string
    {
        return "financialyear";
    }

    public function createFinancialYear(): bool
    {
        $startYear = Carbon::now()->year;
        $endYear  = Carbon::now()->addYear()->year;
        if($this->end_year == 'current_year'){
            $endYear = Carbon::now()->year;
        }

        $openingDate = Carbon::create($startYear, $this->start_month, $this->start_date);
        $closingDate = Carbon::create($endYear, $this->end_month, $this->end_date);

        $financialYear = new FinancialYear();
        $financialYear->opening_date = $openingDate->toDateString();
        $financialYear->closing_date = $closingDate->toDateString();
        $financialYear->setName();
        $financialYear->setStartYear();
        $financialYear->setEndYear();
        return $financialYear->save();
    }

}
