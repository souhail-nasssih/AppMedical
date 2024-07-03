@extends('layouts.dashboardMedecin.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="page-title">Allergies/Maladies Chroniques de {{ $patient->user->name }} </h4>
                    </div>

                    <!-- Lien de retour vers la page du patient -->
                    <div>
                        <a href="{{ route('patients.show', ['id' => $patient->id]) }}" class="btn btn-outline-primary take-btn btn">
                            <i class="fa fa-arrow-left mr-2"></i> Retour
                        </a>
                    </div>

                    <form action="{{ route('allergies.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Informations sur le médicament</h4>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Type :</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" name="type" required>
                                                <option value="">Sélectionnez un type</option>
                                                <option value="chronique">Maladie Chronique</option>
                                                <option value="allergie">Allergie</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Nom :</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="nom" value="{{ old('nom') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Description :</label>
                                        <div class="col-lg-9">
                                            <textarea rows="5" cols="5" class="form-control" placeholder="Entrez la description" name="details">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <h4>Allergies</h4>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allergies as $allergie)
                                            @if ($allergie->type === 'allergie')
                                                <tr>
                                                    <td>{{ $allergie->nom }}</td>
                                                    <td>{{ $allergie->details }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <h4>Maladies Chroniques</h4>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allergies as $allergie)
                                            @if ($allergie->type === 'chronique')
                                                <tr>
                                                    <td>{{ $allergie->nom }}</td>
                                                    <td>{{ $allergie->details }}</td>
                                                </tr>
                                            @endif
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
