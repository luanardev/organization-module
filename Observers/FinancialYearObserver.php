<?php

namespace Lumis\Organization\Observers;
use Lumis\Organization\Entities\FinancialYear;

class FinancialYearObserver
{
    /**
     * Handle the FinancialYear "created" event.
     */
    public function created(FinancialYear $financialYear): void
    {
        $current = FinancialYear::getCurrent();
        $current?->deactivate()->save();

        $financialYear->activate()->save();
    }

    /**
     * Handle the FinancialYear "updated" event.
     */
    public function updated(FinancialYear $financialYear): void
    {
        //
    }

    /**
     * Handle the FinancialYear "deleted" event.
     */
    public function deleted(FinancialYear $financialYear): void
    {
        //
    }

    /**
     * Handle the FinancialYear "restored" event.
     */
    public function restored(FinancialYear $financialYear): void
    {
        //
    }

    /**
     * Handle the FinancialYear "force deleted" event.
     */
    public function forceDeleted(FinancialYear $financialYear): void
    {
        //
    }
}
