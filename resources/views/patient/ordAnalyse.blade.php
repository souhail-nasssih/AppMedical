@extends('layouts.dashboardPatient.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row mb-3">
                <div class="col-sm-12">
                    <h4 class="page-title">Analyse / Radio</h4>
                </div>
            </div>
        <div class="col-lg-12">
            <div class="card-box">
                <div class="card-block">
                    <h5 class="text-bold card-title">Information d'Ordonnance</h5>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Nom Medecin</th>
                                    <th>Specialite</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordonnances as $ordonnance)
                                <tr>
                                    <td>{{ $ordonnance->medecin->user->name }}</td> <!-- Assurez-vous que cette relation est définie -->
                                    <td>{{ $ordonnance->medecin->specialite }}</td>
                                    <td>{{ $ordonnance->created_at->format('d/m/Y') }}</td> <!-- Afficher la date de création de l'ordonnance -->
                                    <td>
                                        <a href="{{ route('ordonnance.detailsAR', ['id' => $ordonnance->id]) }}">Voir détails</a> <!-- Ajustez la route -->
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
@endsection
