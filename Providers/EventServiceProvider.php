<?php

namespace Lumis\Organization\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Lumis\Organization\Entities\FinancialYear;
use Lumis\Organization\Observers\FinancialYearObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        FinancialYear::observe(
            FinancialYearObserver::class
        );
    }

}
