@extends('layouts.dashboardMedecin.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row mb-3">
                <a href="{{ route('search') }}" class="btn btn-outline-primary take-btn">
                    <i class="fa fa-arrow-left mr-2"></i> Retour
                </a>
                <div class="col-sm-12">
                    <br>
                    <h4 class="page-title">Consulter Patient</h4>
                </div>
            </div>  <div class="row">
                <div class="col-sm-12">
                    <div class="card card-box">
                        <div class="card-header">
                            <h6 class="card-title font-weight-bold">Informations du Patient</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nom"><strong>Nom :</strong></label>
                                        <p>{{ $patient->user->name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><strong>Email :</strong></label>
                                        <p>{{ $patient->user->email }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone"><strong>Téléphone :</strong></label>
                                        <p>{{ $patient->tel }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="adresse"><strong>Adresse :</strong></label>
                                        <p>{{ $patient->adress }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_naissance"><strong>Date de Naissance :</strong></label>
                                        <p>{{ $patient->date_naissance }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="groupe_sanguin"><strong>Groupe Sanguin :</strong></label>
                                        <p>{{ $patient->groupes_sanguins }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="cin"><strong>CIN :</strong></label>
                                        <p>{{ $patient->CIN }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
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
                                <i class="fa fa-file-medical mr-2"></i> Ordonnances
                            </div>
                            <div class="card-body text-center">
                                <p>Les Ordonnances</p>
                                <a href="{{ route('patients.ord', ['id' => $patient->id]) }}" class="btn btn-primary">Consulter</a>
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
                                <i class="fa fa-x-ray mr-2"></i> Ordonnances Analyses/Radios
                            </div>
                            <div class="card-body text-center">
                                <i class="fa fa-microscope fa-3x mb-3" style="color: #007bff;"></i>
                                <p>Ordonnances des Analyses / des Radios</p>
                                <a href="{{ route('patients.analyse', ['id' => $patient->id]) }}" class="btn btn-primary">Consulter</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <!-- Allergies -->
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-shield-slash mr-2" viewBox="0 0 16 16">
                                    <path
                                        d="M12.073.073A.5.5 0 0 0 11.8 0H4.2a.5.5 0 0 0-.273.073l-1 1A.5.5 0 0 0 2 1.5v2.566C1.356 4.977 1 5.824 1 6.5c0 1.174.442 2.282 1.235 3.115l-1.04 1.04a.5.5 0 0 0 .708.707l12-12a.5.5 0 0 0 0-.707l-1-1a.5.5 0 0 0-.707 0zM2.772 6.656A.5.5 0 0 0 2.5 6.5c0-.676.356-1.523.7-2.434L9 11.764V14H7.667l-1.604-1.604A3.486 3.486 0 0 1 6.5 12c0-.423.097-.824.267-1.178l-2.995-2.995A3.486 3.486 0 0 1 3 6.5a.5.5 0 0 0-.228.156z" />
                                    <path
                                        d="M11.672 1.14l-2.95 2.95a3.486 3.486 0 0 1 .573.908l2.008-2.008a.5.5 0 0 0-.631-.63zM14 6.5c0 .938-.273 1.784-.742 2.483l-1.882-1.882A3.486 3.486 0 0 1 12.5 5c0 .66-.19 1.29-.517 1.819l-1.797-1.797a.5.5 0 0 0-.707.707l1.14 1.14L10.5 8.335V6.5c0-1.176.442-2.282 1.235-3.115l.908.908A3.47 3.47 0 0 1 12.5 5c.38 0 .743.06 1.083.169l.694.694A3.48 3.48 0 0 1 14 6.5z" />
                                </svg>
                                <i class="fa fa-allergies mr-2"></i> Allergies / Maladies Chroniques
                            </div>
                            <div class="card-body text-center">
                                <i class="fa fa-allergies fa-3x mb-3" style="color: #007bff;"></i>
                                <p>Les Allergies / Maladies Chroniques</p>
                                <a href="{{ route('patients.allergies', ['id' => $patient->id]) }}" class="btn btn-primary">Consulter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
        </div>
    </div>
@endsection
