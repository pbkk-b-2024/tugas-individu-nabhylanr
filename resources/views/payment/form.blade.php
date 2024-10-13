@extends('layouts.app')

@section('title', 'Form Payment')

@section('contents')
  <form action="{{ isset($payment) ? route('payment.tambah.update', $payment->id) : route('payment.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #1F3933;">{{ isset($payment) ? 'Form Edit Payment' : 'Form Tambah Payment' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="method">Nama Payment</label>
              <input type="text" class="form-control" id="method" name="method" value="{{ isset($payment) ? $payment->method : '' }}">
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