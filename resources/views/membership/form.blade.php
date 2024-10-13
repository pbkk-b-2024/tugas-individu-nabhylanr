@extends('layouts.app')

@section('title', 'Join Membership')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color: #1F3933;">Add Membership</h6>
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
@endsection
