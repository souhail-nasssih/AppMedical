@extends('layouts.dashboardAdmin.master')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h4 class="page-title">Doctors</h4>
            </div>
            <div class="col-sm-6 text-right">
                <a href="add-doctor.html" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Doctor</a>
            </div>
        </div>
        <div class="row">
            @foreach ($medecins as $medecin)
            <div class="col-md-4 col-sm-6 col-lg-3">
                <div class="card profile-widget">
                    <div class="card-body">
                        <div class="doctor-img">
                            <a class="avatar" href="profile.html"><img alt="" src="{{ asset('dashboardMedecin/assets/img/1medecin.avif') }}" class="img-fluid rounded-circle"></a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>
                        <h4 class="doctor-name text-ellipsis mt-3"><a href="profile.html">{{ $medecin->user->name }}</a></h4>
                        <div class="doc-prof">{{ $medecin->specialite }}</div>
                        <div class="user-country mt-2">
                            <i class="fa fa-map-marker"></i> {{ $medecin->adress }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
