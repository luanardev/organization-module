<?php

namespace Lumis\Organization\Console;

use Illuminate\Console\Command;
use FinancialConfig;
use Illuminate\Support\Carbon;
use Lumis\Organization\Entities\FinancialYear;

class RecurringFinancialYear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'financialyear:recurring';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Financial Year Recurring.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $current = FinancialYear::getCurrent();
        if(isset($current)){
            $closingDate = Carbon::createFromDate($current->closing_date);
            if($closingDate->isToday()){
                $result = FinancialConfig::createFinancialYear();
                if($result){
                    $this->info('Financial Year created successfully');
                }else{
                    $this->error('Failed to create Financial Year');
                }
            }
        }

    }

}
