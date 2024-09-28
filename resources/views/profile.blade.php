@extends('layouts.app')

@section('title', 'Profile')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color: #1F3933;">Profile Settings</h6>
    </div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" id="profile_setup_frm" action="{{ route('profile.update') }}">
            @csrf <!-- Direktif CSRF -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" name="name" disabled class="form-control" placeholder="nama" value="{{ auth()->user()->nama }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input type="text" name="email" disabled class="form-control" value="{{ auth()->user()->email }}" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Phone</label>
                            <input type="text" name="mobile" class="form-control" placeholder="Mobile" value="{{ auth()->user()->mobile }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ auth()->user()->address }}" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="custom-select">
                            <option value="" selected disabled hidden>-- Pilih Role --</option>
                            <option value="Admin" {{ auth()->user()->level == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="User" {{ auth()->user()->level == 'User' ? 'selected' : '' }}>User</option>
                        </select>
                    </div>

                    <div class="mt-5 text-center">
                        <button id="btn" class="btn btn-primary profile-button" type="submit" style="background-color: #1F3933; color: #FFFFFF;">Save Profile</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
