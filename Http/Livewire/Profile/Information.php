<?php

namespace Lumis\Organization\Http\Livewire\Profile;

use Luanardev\Library\Enums\Country;
use Luanardev\LivewireUI\LivewireUI;
use Organization;

class Information extends LivewireUI
{
    public array $organization = array();

    public function __construct()
    {
        parent::__construct();
        $this->organization = Organization::getSettings();
    }

    public function render()
    {
        $this->viewData();
        return view("organization::livewire.profile.information");
    }

    public function viewData()
    {
        $this->with('country', Country::get());
    }

    public function save()
    {
        if (!empty($this->organization['website'])) {
            $domain = parse_url($this->organization['website'], PHP_URL_HOST);
            $this->organization['domain'] = $domain;
        }
        Organization::saveAll($this->organization);
        $this->emitRefresh()->toastr('Organization details saved');
    }


}
