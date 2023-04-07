<?php

namespace Lumis\Organization\Providers;

use Illuminate\Support\ServiceProvider;
use Lumis\Organization\Console\CreateFinancialYear;
use Lumis\Organization\Console\RecurringFinancialYear;

class CommandServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateFinancialYear::class,
                RecurringFinancialYear::class,
            ]);
        }

    }
}
