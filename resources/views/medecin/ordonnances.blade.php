@extends('layouts.dashboardMedecin.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div>
                        <a href="{{ route('patients.show', $id) }}" class="btn btn-outline-primary take-btn float-left mb-5">
                            <i class="fa fa-arrow-left mr-2"></i> Retour
                        </a>
                    </div>
                    <div class="col-sm-12 d-flex justify-content-between align-items-center mb-3">
                        <h4 class="page-title">Ordonnances</h4>
                        <form action="{{ route('ordMedicament.store') }}" method="POST">
                            @csrf
                            <!-- Récupérer l'ID du patient à partir de l'URL -->
                            @php
                                $patientId = request()->segment(2);
                            @endphp
                            <input type="hidden" name="patient_id" value="{{ $patientId }}">
                            <input type="hidden" name="medecin_id" value="{{ Auth::user()->medecin->id }}">
                            <input type="hidden" name="date" value="{{ now()->toDateString() }}">
                            <button type="submit" class="btn btn-primary btn-rounded">
                                <i class="fa fa-plus"></i> Ajouter une Ordonnance
                            </button>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Medecin</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordonnances as $ordonnance)
                                    <tr>
                                        <td>{{ $ordonnance->medecin->user->name }}</td>
                                        <td>{{ $ordonnance->date }}</td>
                                        <td>
                                            <a href="{{ route('ordonnances.consult', $ordonnance->id) }}" class="btn btn-primary float-right">
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
