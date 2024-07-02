@extends('layouts.dashboardAdmin.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <!-- Statistiques -->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ number_format(\App\Http\Controllers\AdminController::countVerifiedMedecins()) }}</h3>
                            <span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ \App\Http\Controllers\AdminController::countPatients() }}</h3>
                            <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                <h3>{{ \App\Http\Controllers\AdminController::countUnverifiedMedecins() }}</h3>
                            </h3>
                            <span class="widget-title3">Attend <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ajouter ds chart pour les patient ajouter et les doctor ajouter  --}}
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title">
                                <h4>Patient</h4>
                                <span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than
                                    Last Month</span>
                            </div>
                            <canvas id="patientChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title">
                                <h4 class="card-title">Répartition des spécialités des médecins</h4>
                            </div>
                            <canvas id="specialiteChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Derniers Patients Ajoutés -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Derniers Patients Ajoutés</h4>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="">
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Date de Création</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $patients = \App\Http\Controllers\AdminController::latestPatients();
                                    @endphp
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $patient->user->name }}</td>
                                            <td>{{ $patient->user->email }}</td>
                                            <td>{{ $patient->created_at->format('d/m/Y H:i:s') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Médecins non vérifiés -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Médecins Non Vérifiés</h4>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Date de Création</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (\App\Http\Controllers\AdminController::unverifiedMedecins() as $medecin)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $medecin->user->name }}</td>
                                            <td>{{ $medecin->user->email }}</td>
                                            <td>{{ $medecin->created_at->format('d/m/Y H:i:s') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Fin des médecins non vérifiés -->
            </div>
        </div>
    @endsection
    @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('{{ route('admin.patients.chart') }}')
                .then(response => response.json())
                .then(data => {
                    const labels = data.map(patient => patient.date_naissance);
                    const dataset = data.map(patient => patient.id); // Vous pouvez ajuster selon les données à afficher
    
                    const ctx = document.getElementById('patientChart').getContext('2d');
    
                    // Définir un dégradé de couleurs pour le fond
                    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
                    gradient.addColorStop(0, 'rgba(54, 162, 235, 0.2)');
                    gradient.addColorStop(1, 'rgba(255, 99, 132, 0.2)');
    
                    const patientChart = new Chart(ctx, {
                        type: 'bar', // ou 'line', 'pie', etc.
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Patients',
                                data: dataset,
                                backgroundColor: gradient, // Utilisation du dégradé de couleurs
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
        });
    </script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('/medecins/data')
            .then(response => response.json())
            .then(data => {
                const uniqueSpecialites = new Set(data.map(medecin => medecin.specialite));
                const labels = Array.from(uniqueSpecialites);

                // Couleurs simples et froides basées sur 'rgba(0, 158, 251, 0.5)'
                const backgroundColors = [
                    'rgba(0, 158, 251, 0.5)',   // Bleu clair
                    'rgba(64, 138, 175, 0.5)',  // Bleu-gris clair
                    'rgba(97, 159, 185, 0.5)',  // Bleu-vert clair
                    'rgba(138, 177, 201, 0.5)', // Bleu-gris clair
                    'rgba(174, 196, 210, 0.5)', // Bleu-gris clair
                    'rgba(201, 215, 224, 0.5)', // Bleu-gris clair
                    'rgba(228, 233, 237, 0.5)'  // Bleu-gris clair
                    // Vous pouvez ajuster ou ajouter plus de couleurs selon le besoin
                ];

                const ctx = document.getElementById('specialiteChart').getContext('2d');
                const specialiteChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Répartition des spécialités des médecins',
                            data: labels.map(specialite => {
                                return data.filter(medecin => medecin.specialite === specialite).length;
                            }),
                            backgroundColor: backgroundColors.slice(0, labels.length),
                            borderColor: backgroundColors.map(color => color.replace('0.5', '1')),
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        const dataset = specialiteChart.config.data.datasets[tooltipItem.datasetIndex];
                                        const total = dataset.data.reduce((acc, value) => acc + value, 0);
                                        const currentValue = dataset.data[tooltipItem.index];
                                        const percentage = Math.round((currentValue / total) * 100);
                                        return `${tooltipItem.label}: ${currentValue} (${percentage}%)`;
                                    }
                                }
                            }
                        }
                    }
                });
            });
    });
</script>



  

    @endsection