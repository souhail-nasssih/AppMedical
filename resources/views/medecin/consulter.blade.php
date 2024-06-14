@extends('layouts.dashboardMedecin.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row mb-3">
                <a href="{{ route('search') }}" class="btn btn-primary btn">
                    <i class="fa fa-arrow-left mr-2"></i> Retour
                </a>
                <div class="col-sm-12">
                    <br>
                    <h4 class="page-title">Consulter Patient</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-box">
                        <div class="card-header">
                            <h6 class="card-title text-bold">Détails du Patient</h6>
                        </div>
                        <div class="card-body">
                            <div class="patient-details">
                                <p><strong>Nom :</strong> {{ $patient->user->name }}</p>
                                <p><strong>Email :</strong> {{ $patient->user->email }}</p>
                                <p><strong>Téléphone :</strong> {{ $patient->tel }}</p>
                                <p><strong>Adresse :</strong> {{ $patient->adress }}</p>
                                <p><strong>Date de Naissance :</strong> {{ $patient->date_naissance }}</p>
                                <p><strong>Groupe Sanguin :</strong> {{ $patient->groupes_sanguins }}</p>
                                <p><strong>CIN :</strong> {{ $patient->CIN }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Ordonnances -->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-journal-text" viewBox="0 0 16 16">
                                <path
                                    d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                                <path
                                    d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                                <path
                                    d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                            </svg>
                            <i class="fa fa-file-medical mr-2"></i>Ordonnances
                        </div>
                        <div class="card-body text-center">
                            <p>Les Ordonnances</p>
                            <a href="{{ route('patients.ord', ['id' => $patient->id]) }}"
                                class="btn btn-primary">Consulter</a>
                        </div>
                    </div>
                </div>
                <!-- Analyses/Radios -->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-clipboard-data-fill" viewBox="0 0 16 16">
                                <path
                                    d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                <path
                                    d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1" />
                            </svg>
                            <i class="fa fa-x-ray mr-2"></i>Analyses/Radios
                        </div>
                        <div class="card-body text-center">
                            <i class="fa fa-microscope fa-3x mb-3" style="color: #007bff;"></i>
                            <p>Les Analyses / Les Radios</p>
                            <a href="{{ route('patients.analyse', ['id' => $patient->id]) }}"
                                class="btn btn-primary">Consulter</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <!-- Allergies -->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-allergies mr-2"></i>Allergies
                        </div>
                        <div class="card-body text-center">
                            <i class="fa fa-allergies fa-3x mb-3" style="color: #007bff;"></i>
                            <p>Les Allergies</p>
                            <a href="{{ route('patients.allergies', ['id' => $patient->id]) }}"
                                class="btn btn-primary">Consulter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
