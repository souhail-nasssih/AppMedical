@extends('layouts.dashboardPatient.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row mb-4">
            <div class="col-md-8">
                <h4 class="page-title">Profile</h4>
            </div>
            <div class="col-md-4 text-right">
                <a href="{{ Route('profile.patient',$patient->id) }}" class="btn btn-primary btn-rounded"><i class="fa fa-edit"></i> Modifier Profile</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('dashboardMedecin/assets/img/user.jpg') }}" alt="User Image" class="img-fluid rounded-circle" width="150">
                    </div>
                    <div class="col-md-8">
                        <h3 class="user-name">{{ $patient->user->name }}</h3>
                        <p class="text-muted">Patient ID : {{ $patient->id }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="info-widget">
                            <h4 class="heading">Information Contact</h4>
                            <ul class="list-unstyled">
                                <li><span>Téléphone:</span> <a href="tel:{{ $patient->tel }}">{{ $patient->tel }}</a></li>
                                <li><span>Email:</span> <a href="mailto:{{ $patient->user->email }}">{{ $patient->user->email }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="info-widget">
                            <h4 class="heading">Information Personel</h4>
                            <ul class="list-unstyled">
                                <li><span>Date de Naissance:</span> {{ $patient->date_naissance }}</li>
                                <li><span>Address:</span> {{ $patient->adress }}</li>
                                <li><span>Groupes Sanguins:</span> {{ $patient->groupes_sanguins }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
        
                
            </div>
        </div>
    </div>
</div>
@endsection
