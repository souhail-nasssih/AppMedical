@extends('layouts.dashboardPatient.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Historique Medecin</h4>
                </div>
                
                <div class="row filter-row w-100 justify-content-center">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group form-focus">
                            <label class="focus-label">Rechercher par Nom de Médecin ou Spécialité</label>
                            <input type="text" id="searchInput" class="form-control floating" onkeyup="filterTable()" placeholder="Entrez le nom ou la spécialité">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <button type="button" class="btn btn-success btn-block" onclick="filterTable()">Rechercher</button>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="medecinTable" class="table table-bordered table-striped custom-table datatable mb-0">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>
                                    <th>Email</th>
                                    <th>Spécialité</th>
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

    <script>
        function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("medecinTable");
            tr = table.getElementsByTagName("tr");

            // Boucle à travers toutes les lignes du tableau
            for (i = 0; i < tr.length; i++) {
                // Exclure le <thead> du filtrage
                if (tr[i].getElementsByTagName("th").length === 0) {
                    td = tr[i].getElementsByTagName("td");
                    let found = false;
                    // Boucle à travers toutes les cellules de la ligne
                    for (let j = 0; j < td.length; j++) {
                        txtValue = td[j].textContent || td[j].innerText;
                        // Vérifier si le texte filtré est trouvé dans une cellule
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                            break;
                        }
                    }
                    // Afficher ou masquer la ligne en fonction du résultat de la recherche
                    if (found) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection
