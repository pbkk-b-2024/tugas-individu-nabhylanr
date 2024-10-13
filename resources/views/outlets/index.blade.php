@extends('layouts.app')

@section('title', 'Outlet')

@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold" style="color: #1F3933;">Data Outlet</h6>
    </div>
    <div class="card-body">
      <div class="row mb-3">

      <a href="{{ route('outlets.tambah') }}" class="btn btn-primary mb-3" style="background-color: #1F3933; color: #FFFFFF;">Tambah Outlet</a>

      <form action="{{ route('outlets.search') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" value="{{ request('search') }}">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" style="background-color: #1F3933; color: #FFFFFF;">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>

      <div class="col-md-4 text-right">
        <a href="{{ route('outlets') }}" class="btn btn-secondary">Data Outlet</a>
      </div>

    </div>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Outlet</th>
              <th>Alamat Outlet</th>
              <th>No. Telepon Outlet</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($outlets as $row)
              <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->alamat }}</td>
                <td>{{ $row->telepon }}</td>
                <td>
                  <a href="{{ route('outlets.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                  <a href="{{ route('outlets.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $outlets->links() }}
      </div>
    </div>
  </div>
@endsection