@extends('layouts.dashboardMedecin.master')

@section('content')
                            @php
                                $patientId = request()->segment(2); // Récupérer le segment 2 de l'URL
                            @endphp
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div>
                    <a href="{{ route('patients.show', $patientId) }}" class="btn btn-outline-primary take-btn float-left mb-5">
                        <i class="fa fa-arrow-left mr-2"></i>Retour
                    </a>
                </div>
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="page-title">Analyses</h4>
                        <form action="{{ route('ordAnalyseRadio.store') }}" method="POST">
                            @csrf
                            <!-- Récupérer l'ID du patient à partir de l'URL -->
                            <input type="hidden" name="patient_id" value="{{ $patientId }}">
                            <input type="hidden" name="medecin_id" value="{{ Auth::user()->medecin->id }}">
                            <input type="hidden" name="date" value="{{ now()->toDateString() }}">
                            <button type="submit" class="btn btn-primary btn-rounded">
                                <i class="fa fa-plus"></i> Ajouter Analyses
                            </button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Medecin</th>
                                    <th>Specialité</th>
                                    <th>Date</th>
                                    <!-- Ajoutez d'autres colonnes pour plus d'informations si nécessaire -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($analyses as $analyse)
                                    <tr>
                                        <td>{{ $analyse->medecin->user->name }}</td>
                                        <td>{{ $analyse->medecin->specialite }}</td>
                                        <td>{{ $analyse->date }}</td>
                                        <!-- Ajoutez d'autres cellules pour plus d'informations si nécessaire -->
                                        <td>
                                            <!-- Actions like edit/delete can be added here -->
                                            <a href="{{ route('analyses.consult', $analyse->id) }}" class="btn btn-primary float-right">
                                                Consulter
                                            </a>
                                            
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
@endsection
