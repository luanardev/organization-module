<div class="card card-outline card-info">
    <div class="card-header">
        <div class="card-title">Financial Year Setup</div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form wire:submit.prevent="save">
                    @csrf
                    <div class="row">
                        <div class="font-weight-bold display-6 mb-3">Financial Year Opening </div><br/>
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-lg-4 control-label text-muted">Date</label>
                                <select wire:model.lazy="settings.start_date" class="col-lg-8 form-control form-control-sm" >
                                    @foreach($viewBag->get('dates') as $date)
                                        <option value="{{$date}}">{{$date}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-lg-4 control-label text-muted">Month</label>
                                <select wire:model.lazy="settings.start_month" class="col-lg-8 form-control form-control-sm" >
                                    @foreach($viewBag->get('months') as $key => $month)
                                        <option value="{{$key}}">{{$month}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-lg-4 control-label text-muted">Year</label>
                                <select wire:model.lazy="settings.start_year" class="col-lg-8 form-control form-control-sm" >
                                    @foreach($viewBag->get('years') as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex-column"></div>
                    <div class="row">
                        <div class="font-weight-bold display-6 mb-3">Financial Year Closing </div><br/>
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-lg-4 control-label text-muted">Date</label>
                                <select wire:model.lazy="settings.end_date" class="col-lg-8 form-control form-control-sm" >
                                    @foreach($viewBag->get('dates') as $date)
                                        <option value="{{$date}}">{{$date}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-lg-4 control-label text-muted">Month</label>
                                <select wire:model.lazy="settings.end_month" class="col-lg-8 form-control form-control-sm" >
                                    @foreach($viewBag->get('months') as $key => $month)
                                        <option value="{{$key}}">{{$month}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-lg-4 control-label text-muted">Year</label>
                                <select wire:model.lazy="settings.end_year" class="col-lg-8 form-control form-control-sm" >
                                    @foreach($viewBag->get('years') as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-check-circle"></i> Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
