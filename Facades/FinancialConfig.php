<?php

namespace Lumis\Organization\Facades;

use Illuminate\Support\Facades\Facade;

class FinancialConfig extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'financial-config';
    }

}

