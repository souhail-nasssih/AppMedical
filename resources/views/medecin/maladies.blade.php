@extends('layouts.dashboardMedecin.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Radios</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Résultat</th>
                                    <th>Date</th>
                                    <!-- Ajoutez d'autres colonnes pour plus d'informations si nécessaire -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($radios as $radio)
                                    <tr>
                                        <td>{{ $radio->type }}</td>
                                        <td>{{ $radio->resultat }}</td>
                                        <td>{{ $radio->date }}</td>
                                        <!-- Ajoutez d'autres cellules pour plus d'informations si nécessaire -->
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
