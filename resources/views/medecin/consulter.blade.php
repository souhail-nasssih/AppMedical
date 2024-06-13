@extends('layouts.dashboardMedecin.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <a href="{{ route('search') }}" class="btn btn-primary btn">
                    <i class="fa fa-arrow-left mr-2"></i> Retour
                </a>
                <div class="col-sm-12">
                    <br>
                    <h4 class="page-title">Consulter Patient</h4>
                </div>
            </div>
            <div>

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-block">
                            <h6 class="card-title text-bold">Détails du Patient</h6>
                            <div class="patient-details">
                                {{-- <p><strong>Nom :</strong> {{ $patient->id }}</p> --}}
                                <p><strong>Nom :</strong> {{ $patient->user->name }}</p>
                                <p><strong>Email :</strong> {{ $patient->user->email }}</p>
                                <p><strong>Téléphone :</strong> {{ $patient->tel }}</p>
                                <p><strong>Adresse :</strong> {{ $patient->adress }}</p>
                                <p><strong>Date de Naissance :</strong> {{ $patient->date_naissance }}</p>
                                <p><strong>Groupe Sanguin :</strong> {{ $patient->groupes_sanguins }}</p>
                                <p><strong>CIN :</strong> {{ $patient->CIN }}</p>
                                <!-- Ajoutez d'autres détails nécessaires -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">Ordonnances</div>
                        <div class="card-body">
                            <!-- Ajoutez ici les détails des ordonnances -->
                            <div class="text-center register-link">
                                <p>Les Ordonnances <a
                                        href="{{ route('patients.ord', ['id' => $patient->id]) }}">Consulter</a></p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">Analyses/Radios</div>
                        <div class="card-body">
                            <div class="text-center register-link">
                                <p>Les Analyses / Les Radios <a
                                        href="{{ route('patients.analyse', ['id' => $patient->id]) }}">Consulter</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">Allergies</div>
                        <div class="card-body">
                            <div class="text-center register-link">
                                <p>Les Analyses / Les Radios <a
                                        href="{{ route('patients.allergies', ['id' => $patient->id]) }}">Consulter</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
