<?php

namespace Lumis\Organization\Console;

use Illuminate\Console\Command;
use FinancialConfig;

class CreateFinancialYear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'financialyear:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Financial Year.';

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
        $result = FinancialConfig::createFinancialYear();
        if($result){
            $this->info('Financial Year created successfully');
        }else{
            $this->error('Failed to create Financial Year');
        }

    }

}
