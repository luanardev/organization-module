<?php

namespace Lumis\Organization\Http\Livewire\FinancialYear;

use Luanardev\LivewireUI\LivewireUI;
use Lumis\Organization\Entities\FinancialYear;
use FinancialConfig;

class SetupFinancialYear extends LivewireUI
{
    public array $settings;

    public function __construct()
    {
        parent::__construct();
        $this->settings = FinancialConfig::getSettings();
    }

    public function save()
    {
        FinancialConfig::saveAll($this->settings);
        $currentYear = FinancialYear::getCurrent();
        $draft = FinancialYear::getDraft();
        if(empty($currentYear) && empty($draft)){
            FinancialConfig::createFinancialYear();
        }
        $this->emitRefresh()->toastr('Settings Saved');
        return $this->redirectRoute('financialyear.index');
    }

    public function render()
    {
        $this->viewData();
        return view('organization::livewire.financialyear.setup-financial-year');
    }

    protected function viewData()
    {
        $this->with('months', $this->months() );
        $this->with('dates', $this->dates() );
        $this->with('years', $this->placeholders() );

    }

    protected function months()
    {
        return [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December'
        ];
    }

    protected function dates()
    {
        $dates = array();
        for($index=1; $index <= 31; $index++){
            $dates[] = $index;
        }
        return $dates;
    }

    protected function placeholders()
    {
        return [
            'current_year' => 'Current Year',
            'next_year' => 'Next Year'
        ];
    }
}
