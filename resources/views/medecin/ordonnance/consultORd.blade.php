@extends('layouts.dashboardMedecin.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Détails de l'Ordonnance</h4>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Médecin: {{ $ordonnance->medecin->user->name }}</h5>
                            <p>Date: {{ $ordonnance->date }}</p>
                            <h5 class="card-title">Patient: {{ $ordonnance->patient->user->name }}</h5>

                            <h4 class="mt-4">Médicaments</h4>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom Médicament</th>
                                        <th>Utilisation</th>
                                        <th>Période</th>
                                        <th>Remarque</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordonnance->detailOrdMeds as $detail)
                                        <tr>
                                            <td>{{ $detail->nom_medicament }}</td>
                                            <td>{{ $detail->utilisation }}</td>
                                            <td>{{ $detail->periode }}</td>
                                            <td>{{ $detail->remarque }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{-- <a href="{{ route('ordonnances.index') }}" class="btn btn-primary mt-3">Retour</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
