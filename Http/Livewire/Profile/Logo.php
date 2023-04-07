<?php

namespace Lumis\Organization\Http\Livewire\Profile;

use Livewire\WithFileUploads;
use Luanardev\LivewireUI\LivewireUI;
use Organization;
use Storage;

class Logo extends LivewireUI
{
    use WithFileUploads;

    public $logo;

    public function render()
    {
        return view("organization::livewire.profile.logo");
    }

    public function show()
    {
        $this->browseMode();
    }

    public function create()
    {
        $this->createMode();
    }

    public function save()
    {
        if (empty($this->logo)) {
            return;
        }
        $this->validate([
            'logo' => 'required|image|max:10240',
        ]);

        $currentLogo = Organization::get('logo');

        $path = $this->logo->storePublicly('organization/logo', 'public');

        Organization::put('logo', $path);

        if (Storage::exists("public/" . $currentLogo)) {
            Storage::delete("public/" . $currentLogo);
        }
        $this->browseMode()->emitRefresh()->toastr('Logo saved');
    }


}
