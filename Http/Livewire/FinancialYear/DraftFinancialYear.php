<?php

namespace Lumis\Organization\Http\Livewire\FinancialYear;

use  Luanardev\LivewireUI\LivewireUI;
use Lumis\Organization\Entities\FinancialYear;

class DraftFinancialYear extends LivewireUI
{
    public mixed $financialYear;

    public function __construct()
    {
        parent::__construct();
        $this->financialYear = FinancialYear::getDraft();
    }

    public function activate()
    {
        $current = FinancialYear::getCurrent();
        $current?->deactivate()->save();

        $this->financialYear->activate()->save();
        $this->toastr('Financial Year published');
        return $this->redirectRoute('financialyear.index');
    }

    public function delete()
    {
        $this->financialYear->delete();
        $this->toastr('Financial Year deleted');
        return $this->redirectRoute('financialyear.index');
    }

    public function render()
    {
        return view('organization::livewire.financialyear.draft-financial-year');
    }
}
