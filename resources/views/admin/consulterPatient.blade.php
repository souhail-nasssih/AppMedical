@extends('layouts.dashboardAdmin.master')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h4 class="page-title">Détails du Patient</h4>
            </div>
        </div>
        <div class="row">
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

    </div>
</div>
@endsection
