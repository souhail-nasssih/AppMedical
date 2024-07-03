@extends('layouts.dashboardMedecin.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex flex-column">
                        <div class="col-sm-12 d-flex justify-content-between align-items-center mb-3">
                            <h4 class="page-title">Analyses</h4>
                        </div>
                        <div>
                            <a href="{{ route('patients.analyse', $idPatient) }}" class="btn btn-outline-primary take-btn float-left">
                                <i class="fa fa-arrow-left mr-2"></i> Retour
                            </a>
                        </div>
                    </div>
                    <!-- Afficher le message de succès -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ Route('detailanalyses.post') }}" method="POST">
                        @csrf
                        <!-- Récupérer l'ID de l'ordonnance associée à l'analyse -->
                        <input type="hidden" name="ordAnalyseRadio_id" value="{{ request()->query('id') ?? $id }}">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Informations sur l'analyse</h4>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Nom:</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="nom">
                                        </div>
                                    </div>      
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Type:</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" name="type">
                                                <option value="Radio">Radio</option>
                                                <option value="Analyse">Analyse</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Détails:</label>
                                        <div class="col-lg-9">
                                            <textarea rows="5" class="form-control" placeholder="Détails de l'analyse" name="detail"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('detailOrdalayse.destroy', $id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn">Annuler</button>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Type</th>
                                    <th>Détails</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($analyses as $analyse)
                                    <tr>
                                        <td>{{ $analyse->nom }}</td>
                                        <td>{{ $analyse->type }}</td>
                                        <td>{{ $analyse->detail }}</td>
                                        <td>
                                            <form action="{{ route('detailanalyses.destroy', $analyse->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                            </form>

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
