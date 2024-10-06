@extends('layouts.app')

@section('title', 'Data Menu')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color: #1F3933;">Data Menu</h6>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            @if (auth()->user()->level == 'Admin')
            <a href="{{ route('menu.tambah') }}" class="btn" style="background-color: #1F3933; color: #FFFFFF;">Tambah Menu</a>
            @endif

            <form action="{{ route('menu.search') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" value="{{ request('search') }}" style="color: #1F3933;">
                    <div class="input-group-append">
                        <button class="btn" type="submit" style="background-color: #1F3933; color: #FFFFFF;">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <div class="col-md-4 text-right">
                <a href="{{ route('menu') }}" class="btn btn-secondary">Data Menu</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Menu</th>
                        <th>Nama Menu</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        @if (auth()->user()->level == 'Admin')
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($data as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->kode_menu }}</td>
                        <td>{{ $row->nama_menu }}</td>
                        <td>{{ $row->kategori->nama }}</td>
                        <td>{{ $row->harga }}</td>
                        <td>{{ $row->jumlah }}</td>
                        @if (auth()->user()->level == 'Admin')
                        <td>
                            <a href="{{ route('menu.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('menu.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection