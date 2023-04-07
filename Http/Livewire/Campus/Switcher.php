<?php

namespace Lumis\Organization\Http\Livewire\Campus;

use Luanardev\LivewireUI\LivewireUI;
use Lumis\Organization\Concerns\CampusPicker;
use Lumis\Organization\Entities\Campus;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class Switcher extends LivewireUI
{
    use CampusPicker;

    public mixed $campus;
    public mixed $campusList;

    public function __construct()
    {
        parent::__construct();
        $this->campusList = self::getCampusList();
        $this->trackCampus();
    }

    private function trackCampus()
    {
        try {
            if((self::hasUserCampus() ) || (session()->exists('user_campus')) ){
                $this->campus = self::getUserCampus();
            }else{
                $this->campus = new Campus();
            }
        }catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {}

    }

    public function switch(Campus $campus)
    {
        $this->campus = $campus;
        session()->put('user_campus', $campus->id);
        $this->emitRefresh();
    }

    public function render()
    {
        return view('organization::livewire.campus.switcher');
    }

}
