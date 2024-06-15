@extends('layouts.dashboardMedecin.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Détails de l'Analyse</h4>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Médecin: {{ $details->medecin->user->name }}</h5>
                            <p>Date: {{ $details->date }}</p>
                            <h5 class="card-title">Patient: {{ $details->patient->user->name }}</h5>

                            <h4 class="mt-4">Analyses</h4>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Nom</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($analyses as $detail)
                                        <tr>
                                            <td>{{ $detail->type }}</td>
                                            <td>{{ $detail->nom }}</td>
                                            <td>{{ $detail->detail }}</td>

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
@endsection
