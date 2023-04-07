<?php

namespace Lumis\Organization\Providers;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;

class ScheduleServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->callAfterResolving(Schedule::class, function (Schedule $schedule) {
            $schedule->command('financialyear:recurring')
                ->monthlyOn(31, '23:59')
                ->when(function () {
                    return (new Carbon)->isLastOfMonth();
                }); // run at midnight on the last day of the month
        });
    }
}
