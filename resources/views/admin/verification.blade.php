@extends('layouts.dashboardAdmin.master')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Medecin Non Verifie</h4>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-border table-striped custom-table datatable mb-0">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Address</th>
                                    <th>Tel</th>
                                    <th>Email</th>
                                    <th>Specialite</th>
                                    <th>N° Professionel</th>
                                    <th class="text-right">Action</th>
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
                                        <td>{{ $medecin->N_professionel }}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item"
                                                        href="{{ Route('admin.accepter', $medecin->id) }}"><i
                                                            class="fa fa-pencil m-r-5"></i> Accepter</a>
                                                    <form action="{{ Route('admin.medecindestroy', $medecin->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item"><i
                                                                class="fa fa-trash m-r
                                                    5"></i>
                                                            Supprimer</button>
                                                    </form>
                                                </div>
                                            </div>
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
