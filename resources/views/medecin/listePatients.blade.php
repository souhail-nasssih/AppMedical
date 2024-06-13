@extends('layouts.dashboardMedecin.master')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="page-title">Liste de Patients</h4>
                </div>
                @if (session('message'))
                    <div class="alert alert-info">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-border table-striped custom-table datatable mb-0">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Date de Naissance</th>
                                        <th>Adresse</th>
                                        <th>Téléphone</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td>{{ $patient->user->name }}</td>
                                            <td>{{ $patient->date_naissance }}</td>
                                            <td>{{ $patient->adress }}</td>
                                            <td>{{ $patient->tel }}</td>
                                            <td class="text-right">
                                                <!-- Ajoutez ici les liens pour les actions spécifiques à chaque patient -->
                                                <a href="{{ route('patients.show', $patient->id) }}"
                                                    class="btn btn-primary btn-sm">Consulter</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
