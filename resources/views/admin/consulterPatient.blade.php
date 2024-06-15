@extends('layouts.dashboardAdmin.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h4 class="page-title">Patient</h4>
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

        @endsection
