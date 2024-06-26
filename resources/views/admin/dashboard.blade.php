@extends('layouts.dashboardAdmin.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <!-- Statistiques -->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ \App\Http\Controllers\AdminController::countVerifiedMedecins() }}</h3>
                            <span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ \App\Http\Controllers\AdminController::countPatients() }}</h3>
                            <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                <h3>{{ \App\Http\Controllers\AdminController::countUnverifiedMedecins() }}</h3>
                            </h3>
                            <span class="widget-title3">Attend <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Derniers Patients Ajoutés</h4>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="">
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Date de Création</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $patients = \App\Http\Controllers\AdminController::latestPatients();
                                    @endphp
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $patient->user->name }}</td>
                                            <td>{{ $patient->user->email }}</td>
                                            <td>{{ $patient->created_at->format('d/m/Y H:i:s') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Médecins non vérifiés -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Médecins Non Vérifiés</h4>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Date de Création</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (\App\Http\Controllers\AdminController::unverifiedMedecins() as $medecin)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $medecin->user->name }}</td>
                                            <td>{{ $medecin->user->email }}</td>
                                            <td>{{ $medecin->created_at->format('d/m/Y H:i:s') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Fin des médecins non vérifiés -->
            </div>
        </div>
    @endsection
