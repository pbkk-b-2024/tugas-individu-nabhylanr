@extends('layouts.app')

@section('title', 'Form Discount')

@section('contents')
  <form action="{{ isset($discount) ? route('discount.tambah.update', $discount->id) : route('discount.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #1F3933;">{{ isset($discount) ? 'Form Edit Discount' : 'Form Tambah Discount' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="kode_diskon">Kode Discount</label>
              <input type="text" class="form-control" id="kode_diskon" name="kode_diskon" value="{{ isset($discount) ? $discount->kode_diskon : '' }}" required>
            </div>

            <div class="form-group">
              <label for="nilai_diskon">Nilai Discount (%)</label>
              <input type="number" class="form-control" id="nilai_diskon" name="nilai_diskon" value="{{ isset($discount) ? $discount->nilai_diskon : '' }}" required min="1" max="100">
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