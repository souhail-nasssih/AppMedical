@extends('layouts.dashboardMedecin.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Patients</h4>
                </div>
            </div>
            <!-- Affichage des messages de succès et d'erreur -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-block">
                            <div></div>
                            <h6 class="card-title font-weight-bold">Recherche de Patient par CIN</h6>
                                <form action="" method="GET">
                                    <div class="row filter-row">
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">CIN Patient</label>
                                                <input type="text" name="cin" class="form-control floating">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <button type="submit" class="btn btn-success btn-block">Rechercher</button>
                                        </div>
                                    </div>
                                </form>

                            <div class="table-responsive">
                                <table class="table table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Adresse</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th>Date de Naissance</th>
                                            <th>Groupe Sanguin</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            @foreach ($user->patients as $patient)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $patient->adress }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $patient->tel }}</td>
                                                    <td>{{ $patient->date_naissance }}</td>
                                                    <td>{{ $patient->groupes_sanguins }}</td>
                                                    <td>
                                                        <a href="{{ route('patients.show', $patient->id) }}"
                                                            class="btn btn-primary ">Consulter</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('medecin.patient.store') }}" method="POST">
                                                            @csrf
                                                            @method('POST')
                                                            <input type="hidden" name="patient_id"
                                                                value="{{ $patient->id }}">
                                                            <input type="hidden" name="medecin_id"
                                                                value="{{ Auth::user()->medecin->id }}">
                                                            <button type="submit" class="btn btn-primary">Ajouter</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
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
