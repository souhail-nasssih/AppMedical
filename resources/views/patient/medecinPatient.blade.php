@extends('layouts.dashboardPatient.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Historique Medecin</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-border table-striped custom-table datatable mb-0">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Address</th>
                                    <th>Tel</th>
                                    <th>Email</th>
                                    <th>Specialite</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medecins as $medecin)
                                    <tr>
                                        <td>{{ $medecin->user->name }}</td>
                                        <td>{{ $medecin->adress }}</td>
                                        <td>{{ $medecin->tel }}</td>
                                        <td>{{ $medecin->user->email }}</td>
                                        <td>{{ $medecin->specialite }}</td>
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
