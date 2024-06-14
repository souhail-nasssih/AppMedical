@extends('layouts.dashboardMedecin.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="page-title">Liste de Patients</h4>
                    </div>
                    @if (session('message'))
                        <div class="alert alert-info">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="row filter-row w-100 justify-content-center">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus">
                                <label class="focus-label">Patient</label>
                                <input type="text" name="cin" id="cinSearch" class="form-control floating" onkeyup="filterTable()">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <button type="button" class="btn btn-success btn-block" onclick="filterTable()">Rechercher</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-border table-striped custom-table datatable mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Date de Naissance</th>
                                            <th>Adresse</th>
                                            <th>cin</th>
                                            <th>Téléphone</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="patientTable">
                                        @foreach ($patients as $patient)
                                            <tr>
                                                <td>{{ $patient->user->name }}</td>
                                                <td>{{ $patient->date_naissance }}</td>
                                                <td>{{ $patient->adress }}</td>
                                                <td>{{ $patient->CIN }}</td>
                                                <td>{{ $patient->tel }}</td>
                                                <td class="text-right">
                                                    <!-- Ajoutez ici les liens pour les actions spécifiques à chaque patient -->
                                                    <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-primary btn-sm">Consulter</a>
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
    </div>

    <script>
        function filterTable() {
            const input = document.getElementById("cinSearch");
            const filter = input.value.toUpperCase();
            const table = document.getElementById("patientTable");
            const tr = table.getElementsByTagName("tr");

            for (let i = 0; i < tr.length; i++) {
                const td = tr[i].getElementsByTagName("td")[3]; // La colonne CIN est la 4ème (index 3)
                if (td) {
                    const txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection
