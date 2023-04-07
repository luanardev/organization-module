@extends('organization::layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="content-header">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Financial Year</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('organization.module') }}">Home</a></li>
                        <li class="breadcrumb-item active">Financial Year</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="content">

            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-12">

                    <livewire:organization::financial-year.current-financial-year />

                    <div class="card card-outline card-danger">
                        <div class="card-header">
                            <div class="card-title">Financial Year History</div>
                        </div>
                        <div class="card-body">
                            <livewire:organization::financial-year.previous-financial-years  />
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">

                    <livewire:organization::financial-year.setup-financial-year />
                </div>
            </div>
        </div>

    </div>

@endsection
