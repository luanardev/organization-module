<div class="col-lg-12 col-md-6 col-sm-12">
    <div class="card card-outline">
        <div class="card-header">
            <h3 class="card-title text-bold">Organization Favicon</h3>
        </div>
        <div class="card-body">
            @if($browseMode)
                <div class="text-center">
                    <p>
                        @php $favicon = Organization::get('favicon') @endphp
                        @if(!empty($favicon))
                            <img src="{{ asset("storage/{$favicon}") }}" class="img-fluid"/>
                        @else
                            <img src="{{ asset('img/default.png') }}" class="img-fluid" style="max-height: 100px;"/>
                        @endif
                    </p>
                    <p>
                        <button class="btn btn-sm btn-primary" wire:click="create()">
                            <i class="fas fa-upload"></i> Upload
                        </button>
                    </p>
                </div>

            @endif

            @if($createMode)
                <x-adminlte-validation/>
                <form wire:submit.prevent="save">

                    <div class="form-control">
                        <input type="file" wire:model="favicon" class="form-control-file">
                    </div>
                    <br/>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fas fa-check-circle"></i> Save
                        </button>
                        <button class="btn btn-sm btn-secondary" wire:click="show()">
                            <i class="fas fa-times-circle"></i> Cancel
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>

