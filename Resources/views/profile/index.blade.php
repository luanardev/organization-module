@extends('organization::layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="content-header">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Organization Profile</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('organization.module') }}">Home</a></li>
                        <li class="breadcrumb-item active">Organization</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="content">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <div class="card">

                        <div class="card-header">

                            <div class="float-left">
                                <div class="py-1">
                                    <ul class="nav nav-pills" id="custom-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#profile" role="tab"
                                               aria-controls="profile" aria-selected="true">Organization Details</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#logo" role="tab"
                                               aria-controls="logo" aria-selected="false">Organization Logo</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-content">

                                <div class="tab-pane fade active show" id="profile" role="tabpanel"
                                     aria-labelledby="profile">
                                    <livewire:organization::profile.information />

                                </div>

                                <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo">
                                    <livewire:organization::profile.logo />
                                    <livewire:organization::profile.favicon />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
