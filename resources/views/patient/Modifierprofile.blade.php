@extends('layouts.dashboardPatient.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4 class="page-title">Modifier Profile</h4>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    <input type="text" class="form-control" id="id" name="id" value="{{ $patient->id }}" required>
                    <div class="form-group">
                        <label for="name">Nom : </label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $patient->user->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="tel">Téléphone : </label>
                        <input type="text" class="form-control" id="tel" name="tel" value="{{ $patient->tel }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email : </label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $patient->user->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="date_naissance">Date de Naissance</label>
                        <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{ $patient->date_naissance }}" required>
                    </div>

                    <div class="form-group">
                        <label for="adress">Address</label>
                        <input type="text" class="form-control" id="adress" name="adress" value="{{ $patient->adress }}" required>
                    </div>

                    <div class="form-group">
                        <label for="groupes_sanguins">Groupes Sanguins</label>
                        <select class="form-control" id="groupes_sanguins" name="groupes_sanguins" required>
                            <option value="">Sélectionner un groupe sanguin</option>
                            <option value="A+" {{ $patient->groupes_sanguins == 'A+' ? 'selected' : '' }}>A+</option>
                            <option value="A-" {{ $patient->groupes_sanguins == 'A-' ? 'selected' : '' }}>A-</option>
                            <option value="B+" {{ $patient->groupes_sanguins == 'B+' ? 'selected' : '' }}>B+</option>
                            <option value="B-" {{ $patient->groupes_sanguins == 'B-' ? 'selected' : '' }}>B-</option>
                            <option value="AB+" {{ $patient->groupes_sanguins == 'AB+' ? 'selected' : '' }}>AB+</option>
                            <option value="AB-" {{ $patient->groupes_sanguins == 'AB-' ? 'selected' : '' }}>AB-</option>
                            <option value="O+" {{ $patient->groupes_sanguins == 'O+' ? 'selected' : '' }}>O+</option>
                            <option value="O-" {{ $patient->groupes_sanguins == 'O-' ? 'selected' : '' }}>O-</option>
                        </select>
                    </div>
                    

                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
