@extends('layouts.app')

@section('title', 'Join Membership')

@section('contents')
<div class="container mt-5">
    <div class="card shadow mb-4" style="border-radius: 15px;">
        <div class="card-header py-3" style="background-color: #1F3933; color: #FFFFFF; border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h5 class="m-0 font-weight-bold">Join Membership</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('membership.tambah') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tglbuat">Tanggal Pembuatan</label>
                    <input type="date" name="tglbuat" class="form-control" id="tglbuat" required>
                </div>
                <div class="form-group">
                    <label for="tglkadaluwarsa">Tanggal Kadaluwarsa</label>
                    <input type="date" name="tglkadaluwarsa" class="form-control" id="tglkadaluwarsa" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('membership') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
