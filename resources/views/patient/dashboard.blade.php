@extends('layouts.dashboardPatient.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row mb-3">
                <div class="col-sm-12">
                    <h4 class="page-title">Profile</h4>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-5 text-right m-b-30">
                </div>
            </div>
            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <img class="avatar" src="{{ asset('dashboardMedecin/assets/img/user.jpg') }}"
                                        alt="Profile Image">
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            @php
                                                $patient = \App\Models\Patient::where(
                                                    'user_id',
                                                    Auth::user()->id,
                                                )->first();
                                            @endphp
                                            <h3 class="user-name m-t-0 mb-0">{{ $patient->user->name }}</h3>
                                            <small class="text-muted">Patient</small>
                                            <div class="staff-id">Employee ID : {{ $patient->id }}</div>
                                            {{-- <div class="staff-msg"><a href="{{ route('chat') }}" class="btn btn-primary">Send Message</a></div> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Téléphone:</span>
                                                <span class="text"><a
                                                        href="tel:770-889-6484">{{ $patient->tel }}</a></span>
                                            </li>
                                            <li>
                                                <span class="title">Email:</span>
                                                <span class="text"><a
                                                        href="mailto:example@example.com">{{ $patient->user->email }}</a></span>
                                            </li>
                                            <li>
                                                <span class="title">Date de Naissance:</span>
                                                <span class="text">{{ $patient->date_naissance }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Address:</span>
                                                <span class="text">{{ $patient->adress }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Groupes Sanguins:</span>
                                                <span class="text">{{ $patient->groupes_sanguins }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="profile-tabs">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">Ordonnances</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#profile-cont" data-toggle="tab">Radio/Analyses</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane show active" id="about-cont">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h3 class="card-title">Ordonnances</h3>

                                    @php
                                        $id = $patient->id;
                                        $ordonnances = App\Models\OrdMedicament::where('patient_id', $id)
                                            ->latest()
                                            ->limit(5)
                                            ->get();
                                    @endphp
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Nom Medecin</th>
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
                                                            <a
                                                                href="{{ route('ordonnance.details', ['id' => $ordonnance->id]) }}">Voir
                                                                détails</a> <!-- Ajustez la route -->
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
                    <div class="tab-pane" id="profile-cont">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h3 class="card-title">Radio</h3>
                                    @php
                                        $id = $patient->id;
                                        $ordonnances_A = App\Models\OrdAnalyseRadio::where('patient_id', $id)
                                            ->latest()
                                            ->limit(5)
                                            ->get();
                                    @endphp

                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Nom Medecin</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ordonnances_A as $ordonnance)
                                                    <tr>
                                                        <td>{{ $ordonnance->medecin->user->name }}</td>
                                                        <td>{{ $ordonnance->date }}</td>
                                                        <td>
                                                            <a
                                                                href="{{ route('ordonnance.detailsAR', ['id' => $ordonnance->id]) }}">Voir
                                                                détails</a> <!-- Ajustez la route -->
                                                        </td> <!-- Ajustez la route -->
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="tab-pane" id="messages-cont">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h3 class="card-title">Analyses</h3>
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Firstname</th>
                                                    <th>Lastname</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>John</td>
                                                    <td>Doe</td>
                                                    <td><a href="http://cdn-cgi/l/email-protection" class="__cf_email__"
                                                            data-cfemail="98f2f7f0f6d8fde0f9f5e8f4fdb6fbf7f5">[email&#160;protected]</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Mary</td>
                                                    <td>Moe</td>
                                                    <td><a href="http://cdn-cgi/l/email-protection" class="__cf_email__"
                                                            data-cfemail="cba6aab9b28baeb3aaa6bba7aee5a8a4a6">[email&#160;protected]</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>July</td>
                                                    <td>Dooley</td>
                                                    <td><a href="http://cdn-cgi/l/email-protection" class="__cf_email__"
                                                            data-cfemail="deb4abb2a79ebba6bfb3aeb2bbf0bdb1b3">[email&#160;protected]</a>
                                                    </td>
                                                </tr>
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
    </div>
@endsection
