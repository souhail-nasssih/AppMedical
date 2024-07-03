@extends('layouts.dashboardMedecin.master')


@section('content')
    <div class="page-wrapper ">
        <div class="content">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <!-- Partie pour l'image -->
                            <div class="profile-img text-center mb-3">
                                <img class="avatar rounded-circle"
                                    src="{{ asset('dashboardMedecin/assets/img/1medecin.avif') }}" alt="Profile Image">
                            </div>
                        </div>
                        <div class="col-5">
                            <!-- Partie pour le nom et l'ID -->
                            <h3 class="user-name">{{ Auth::user()->name }}</h3>
                            <div class="staff-id mb-3">Doctor ID : {{ Auth::user()->medecin->N_professionel }}</div>
                        </div>
                        <div class="col-4">
                            <!-- Partie pour les autres infos -->
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <span class="font-weight-bold">Phone: </span>
                                    <span class="text"><a
                                            href="tel:{{ Auth::user()->medecin->tel }}">{{ Auth::user()->medecin->tel }}</a></span>
                                </li>
                                <li class="mb-2">
                                    <span class="font-weight-bold">Email: </span>
                                    <span class="text"><a
                                            href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></span>
                                </li>
                                <li class="mb-2">
                                    <span class="font-weight-bold">Address: </span>
                                    <span class="text">{{ Auth::user()->medecin->adress }}</span>
                                </li>
                                <li class="mb-2">
                                    <span class="font-weight-bold">Specialité: </span>
                                    <span class="text text-uppercase">{{ Auth::user()->medecin->specialite }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row align-items-stretch">
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header">Patient Chart</div>
                            <div class="card-body">
                                <canvas id="patientChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body d-flex align-items-center">
                                <div class="dash-widget w-100 p-4">
                                    <div class="d-flex flex-column">
                                        <span class="dash-widget-bg2 rounded-circle p-3"><i class="fa fa-user-o"></i></span>
                                        <div class="dash-widget-info flex-grow-1 text-right">
                                            <h4 class="mb-3">Total patients</h4>
                                            <h3 class="mb-0">{{ \App\Http\Controllers\MedecinController::countPatients() }}</h3>
                                            <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-8 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block">New Patients </h4> <a href="{{ Route('listePatient') }}"
                                class="btn btn-primary float-right">Voir Tout</a>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table mb-0 new-patient-table">
                                    <tbody>
                                        @php
                                            $patients = \App\Http\Controllers\MedecinController::latestPatients();
                                        @endphp
                                        @foreach ($patients as $patient)
                                            <tr>
                                                <td>
                                                    {{ $patient->user->name }}
                                                </td>
                                                <td>
                                                    {{ $patient->tel }}
                                                </td>
                                                <td>
                                                    {{ $patient->adress }}
                                                </td>
                                                <td>
                                                    {{ $patient->user->email }}
                                                </td>
                                                <td>
                                                    {{ $patient->CIN }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('patients.show', $patient->id) }}"
                                                        class="btn btn-primary btn-primary-one float-right">Consulter</a>

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


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        < script src = "https://cdn.jsdelivr.net/npm/chart.js" >
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('{{ route('medecin.patient_chart_data') }}')
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Vérifiez les données dans la console

                    if (!data || data.length === 0) {
                        console.error('Aucune donnée trouvée pour le médecin connecté.');
                        return;
                    }

                    // Extraction des dates et des totaux
                    const dates = data.map(item => item.date);
                    const totals = data.map(item => item.total_patients);

                    // Création du graphique Chart.js
                    const ctx = document.getElementById('patientChart').getContext('2d');
                    const patientChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: dates,
                            datasets: [{
                                label: 'Nombre de patients ajoutés',
                                data: totals,
                                backgroundColor: 'rgba(0, 158, 251, 0.5)',
                                borderColor: 'rgba(0, 158, 251, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(tooltipItem) {
                                            return 'Nombre de patients ajoutés: ' + tooltipItem.raw;
                                        }
                                    }
                                }
                            },
                            scales: {
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Date'
                                    }
                                },
                                y: {
                                    beginAtZero: true,
                                    stepSize: 1,
                                    title: {
                                        display: true,
                                        text: 'Nombre de patients'
                                    }
                                }
                            }
                        }
                    });
                })
                .catch(error => console.error('Erreur lors de la récupération des données:', error));
        });
    </script>


    </script>
@endsection
