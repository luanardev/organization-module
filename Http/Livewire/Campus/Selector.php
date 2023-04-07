<?php

namespace Lumis\Organization\Http\Livewire\Campus;

use Luanardev\LivewireUI\LivewireUI;
use Lumis\Organization\Concerns\CampusPicker;

class Selector extends LivewireUI
{
    use CampusPicker;

    public mixed $campus;
    public mixed $campusList;

    public function __construct()
    {
        parent::__construct();
        $this->campus = null;
        $this->campusList = self::getCampusList();
        $this->trackCampus();
    }

    private function trackCampus()
    {
        if (self::hasUserCampus()) {
            $this->campus = self::getUserCampus()->id;
            session()->put('user_campus', $this->campus);
        } elseif (session()->exists('user_campus')) {
            $this->campus = session()->get('user_campus');
        }
    }

    public function updatedCampus($value)
    {
        if ($value) {
            session()->put('user_campus', $value);
        } else {
            if (session()->exists('user_campus')) {
                session()->forget('user_campus');
            }
        }
        $this->emitRefresh();
    }

    public function render()
    {
        return view('organization::livewire.campus.selector');
    }


}
