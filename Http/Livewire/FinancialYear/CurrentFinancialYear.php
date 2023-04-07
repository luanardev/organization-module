<?php

namespace Lumis\Organization\Http\Livewire\FinancialYear;

use  Luanardev\LivewireUI\LivewireUI;
use Lumis\Organization\Entities\FinancialYear;

class CurrentFinancialYear extends LivewireUI
{
    public mixed $financialYear;

    public function __construct()
    {
        parent::__construct();
        $this->financialYear = FinancialYear::getCurrent();
    }

    public function deactivate()
    {
        $this->financialYear->deactivate()->save();

        $draft = FinancialYear::getDraft();
        $draft?->activate()->save();

        $this->toastr('Financial Year deactivated');
        return $this->redirectRoute('financialyear.index');
    }

    public function render()
    {
        return view('organization::livewire.financialyear.current-financial-year');
    }
}
