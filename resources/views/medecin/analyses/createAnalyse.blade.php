@extends('layouts.dashboardMedecin.master')

@section('content')
    <div class="page-wrapper">
        <div class="content" id="printableArea">
            <div class="row">
                <div class="col-sm-5 col-4">
                    <h4 class="page-title">Détails de l'Analyse</h4>
                </div>
                <div class="col-sm-7 col-8 text-right m-b-30">
                    <button onclick="printDiv('printableArea')" class="btn btn-primary">
                        <i class="fa fa-print"></i> Imprimer
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="payslip-title">Dr: {{ $details->medecin->user->name }}</h4>
                        <div class="row">
                            <div class="col-sm-6 m-b-20">
                                <img src="{{ asset('dashboardMedecin/assets/img/logo-dark.png') }}" class="inv-logo" alt="">
                                <ul class="list-unstyled mb-0">
                                    <li>{{ $details->medecin->adress }}</li>
                                    <li>{{ $details->medecin->tel }}</li>
                                </ul>
                            </div>
                            <div class="col-sm-6 m-b-20">
                                <div class="invoice-details">
                                    <h3 class="text-uppercase">ID #{{ $details->id }}</h3>
                                    <ul class="list-unstyled">
                                        <li>Date: <span>{{ $details->date }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 m-b-20">
                                <ul class="list-unstyled">
                                    <li>
                                        <h5 class="mb-0"><strong>{{ $details->patient->user->name }}</strong></h5>
                                    </li>
                                    <li><span>Patient</span></li>
                                    <li>Employee ID: {{ $details->patient->id }}</li>
                                    <li>Joining Date: {{ $details->patient->adress }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div>
                                    <h4 class="m-b-10"><strong>Analyses</strong></h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Nom</th>
                                                <th>Détail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($analyses as $detail)
                                                <tr>
                                                    <td>{{ $detail->type }}</td>
                                                    <td>{{ $detail->nom }}</td>
                                                    <td>{{ $detail->detail }}</td>
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
    </div>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
