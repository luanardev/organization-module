<?php

namespace Lumis\Organization\Http\Livewire\Profile;

use Livewire\WithFileUploads;
use Luanardev\LivewireUI\LivewireUI;
use Organization;
use Storage;

class Favicon extends LivewireUI
{
    use WithFileUploads;

    public $favicon;

    public function render()
    {
        return view("organization::livewire.profile.favicon");
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
        if (empty($this->favicon)) {
            return;
        }
        $this->validate([
            'favicon' => 'required|image|max:10240',
        ]);

        $currentFavicon = Organization::get('favicon');

        $path = $this->favicon->storePublicly('organization/favicon', 'public');

        Organization::put('favicon', $path);

        if (Storage::exists("public/" . $currentFavicon)) {
            Storage::delete("public/" . $currentFavicon);
        }
        $this->browseMode()->emitRefresh()->toastr('Favicon saved');
    }


}
