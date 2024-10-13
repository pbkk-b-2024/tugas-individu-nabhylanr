@extends('layouts.app')

@section('title', 'Form Outlet')

@section('contents')
  <form action="{{ isset($outlet) ? route('outlets.tambah.update', $outlet->id) : route('outlets.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #1F3933;">{{ isset($outlet) ? 'Form Edit Outlet' : 'Form Tambah Outlet' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama Outlet</label>
              <input type="text" class="form-control" id="nama" name="nama" value="{{ isset($outlet) ? $outlet->nama : '' }}">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat Outlet</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="{{ isset($outlet) ? $outlet->alamat : '' }}">
            </div>
            <div class="form-group">
              <label for="telepon">No. Telepon Outlet</label>
              <input type="text" class="form-control" id="telepon" name="telepon" value="{{ isset($outlet) ? $outlet->telepon : '' }}">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" style="background-color: #1F3933; color: #FFFFFF;">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection