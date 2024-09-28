@extends('layouts.app')

@section('title', 'Form Menu')

@section('contents')
<form action="{{ isset($menu) ? route('menu.tambah.update', $menu->id) : route('menu.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold" style="color: #1F3933;">{{ isset($menu) ? 'Form Edit Menu' : 'Form Tambah Menu' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="kode_menu">Kode Menu</label>
                        <input type="text" class="form-control" id="kode_menu" name="kode_menu" value="{{ isset($menu) ? $menu->kode_menu : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_menu">Nama Menu</label>
                        <input type="text" class="form-control" id="nama_menu" name="nama_menu" value="{{ isset($menu) ? $menu->nama_menu : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="id_kategori">Kategori Menu</label>
                        <select name="id_kategori" id="id_kategori" class="custom-select">
                            <option value="" selected disabled hidden>-- Pilih Kategori --</option>
                            @foreach ($kategori as $row)
                            <option value="{{ $row->id }}" {{ isset($menu) ? ($menu->id_kategori == $row->id ? 'selected' : '') : '' }}>{{ $row->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Menu</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="{{ isset($menu) ? $menu->harga : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Menu</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ isset($menu) ? $menu->jumlah : '' }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn" style="background-color: #1F3933; color: #FFFFFF;">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
