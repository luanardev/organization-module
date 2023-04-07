<?php

namespace Lumis\Organization\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class FinancialYearNotFoundException extends HttpException
{

    public function __construct()
    {
        $message = 'Financial Year is not set';
        parent::__construct(403, $message, null, []);
    }
}
