@extends('layouts.dashboardMedecin.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <!-- Profile Information -->
            <div class="card mb-4">
                <div class="card-header">Profile Information</div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    @if (session('status'))
                        <div class="alert alert-success mt-3">
                            Saved.
                        </div>
                    @endif
                </div>
            </div>

            <!-- Update Password -->
            <div class="card mb-4">
                <div class="card-header">Update Password</div>
                <div class="card-body">
                    <form action="{{ route('password.store') }}" method="POST">
                        @csrf
                        @method('POST')
            
                        <div class="form-group">
                            {{-- <label for="email">Email</label> --}}
                            <input type="hidden" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                        </div>
            
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" id="current_password" name="password" class="form-control">
                        </div>
            
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" id="new_password" name="password" class="form-control">
                        </div>
            
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" name="password_confirmation" class="form-control">
                        </div>
            
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>

            <!-- Delete Account -->
            <div class="card">
                <div class="card-header">Delete Account</div>
                <div class="card">
                    <div class="card-header">Delete Account</div>
                    <div class="card-body">
                        <form action="{{ route('profile.destroy') }}" method="POST">
                            @csrf
                            @method('DELETE')
    
                            <div class="form-group">
                                <label for="delete_password">Enter Your Password to Confirm Deletion</label>
                                <input type="password" id="delete_password" name="password" class="form-control" required>
                            </div>
    
                            <div class="alert alert-warning" role="alert">
                                Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
                            </div>
    
                            <button type="submit" class="btn btn-danger">Delete Account</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
