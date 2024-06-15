@extends('layouts.dashboardMedecin.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex flex-column">
                        <div class="col-sm-12 d-flex justify-content-between align-items-center mb-3">
                            <h4 class="page-title">Detail Ordonnances</h4>
                        </div>
                        <div>

                            <button onclick="window.history.back();" class="btn btn-primary">Retour</button>
                        </div>

                    </div>
                    <!-- Afficher le message de succès -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @php
                    // Extraire l'ID de l'URL
                    $id = request()->segment(count(request()->segments()));
                @endphp
                    <form action="{{ route('detailOrdMed.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="ordMedicament_id" value="{{ $id }}">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Informations sur le médicament</h4>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Nom Médicament:</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="nom_medicament">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Utilisation:</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="utilisation">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Période:</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="periode">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Remarque:</label>
                                        <div class="col-lg-9">
                                            <textarea rows="5" cols="5" class="form-control" placeholder="Enter message" name="remarque"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                
                                
                                
                                
                                </div>
                                </div>
                                </form>
                                @php
                                    // Extraire l'ID de l'URL
                                    $id = request()->segment(count(request()->segments()));
                                @endphp
                                <form action="{{ route('detailOrd.destroy', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn">Annuler</button>
                                </form>
                                
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nom Médicament</th>
                                    <th>Utilisation</th>
                                    <th>Période</th>
                                    <th>Remarque</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $detail)
                                    <tr>
                                        <td>{{ $detail->nom_medicament }}</td>
                                        <td>{{ $detail->utilisation }}</td>
                                        <td>{{ $detail->periode }}</td>
                                        <td>{{ $detail->remarque }}</td>
                                        <td>
                                            <form action="{{ route('detailOrdMed.destroy', $detail->id) }}" method="POST"
                                                style="display:inline;">
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
