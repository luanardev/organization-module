<div class="card card-outline card-success">

    <div class="card-header">
        <div class="card-title">Current Financial Year</div>

        @isset($financialYear)
            <div class="float-right">
                <div class="mb-3 mb-md-0">
                    <div class="dropdown d-block d-md-inline">
                        <button class="btn dropdown-toggle d-block w-100 d-md-inline" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-right w-200" aria-labelledby="actions">
                            <a href="#" wire:click.prevent="deactivate()" class="dropdown-item">
                                Deactivate

                            </a>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="card-body">
        @isset($financialYear)
        <div class="row">

            <div class="col-sm-3 border-right">
                <div class="description-block">
                    <h5 class="description-header">Session Name</h5>
                    <span class="description-text">{{$financialYear->getName()}}</span>
                </div>
            </div>

            <div class="col-sm-3 border-right">
                <div class="description-block">
                    <h5 class="description-header">Opens On</h5>
                    <span class="description-text">{{$financialYear->formatStartDate()}}</span>
                </div>
            </div>

            <div class="col-sm-3 border-right">
                <div class="description-block">
                    <h5 class="description-header">Closes On</h5>
                    <span class="description-text">{{$financialYear->formatCloseDate()}}</span>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="description-block">
                    <h5 class="description-header">Status</h5>
                    <span class="description-text">{!! $financialYear->statusBadge() !!}  </span>
                </div>
            </div>

        </div>
        @else
        <div class="row">
            <div class="col-lg-12">
                <div class="callout callout-info py-2 mb-4">
                    <p>Financial Year Not Found</p>
                </div>
            </div>

        </div>
        @endif
    </div>
</div>
