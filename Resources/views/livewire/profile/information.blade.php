<div class="row">

    <div class="col-lg-12 col-md-6 col-sm-12">

        <div class="card card-outline">
            <x-adminlte-validation/>
            <form wire:submit.prevent="save">

                <div class="card-header">
                    <h3 class="card-title text-bold">Organization Details</h3>
                    <button type="submit" class="float-right btn btn-sm btn-primary">
                        <i class="fas fa-check-circle"></i> Save
                    </button>
                </div>

                <div class="card-body">

                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Organization Name
                        </label>
                        <div class="col-sm-6">
                            <input type="text" wire:model.lazy="organization.name" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Organization Acronym
                        </label>
                        <div class="col-sm-6">
                            <input type="text" wire:model.lazy="organization.acronym" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Email Address
                        </label>
                        <div class="col-sm-6">
                            <input type="text" wire:model.lazy="organization.contact_email" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Contact Number
                        </label>
                        <div class="col-sm-6">
                            <input type="text" wire:model.lazy="organization.contact_number" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Contact Address
                        </label>
                        <div class="col-sm-6">
                            <input type="text" wire:model.lazy="organization.contact_address" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Website
                        </label>
                        <div class="col-sm-6">
                            <input type="text" wire:model.lazy="organization.website" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            City
                        </label>
                        <div class="col-sm-6">
                            <input type="text" wire:model.lazy="organization.city" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Country
                        </label>

                        <div class="col-sm-6">
                            <select wire:model.lazy="organization.country" class="form-control">
                                @foreach ($viewBag->get('country') as $country)
                                    <option value="{{$country}}">{{$country}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
