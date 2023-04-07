<?php

namespace Lumis\Organization\Facades;

use Illuminate\Support\Facades\Facade;

class Organization extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'organization';
    }

}

