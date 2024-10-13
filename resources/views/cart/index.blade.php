@extends('layouts.app')

@section('title', 'Cart')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold" style="color: #1F3933;">Cart</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalPrice = 0; @endphp 
                    @forelse($cartItems as $item)
                    <tr>
                        <td>{{ $item->menu->nama_menu }}</td>
                        <td>Rp {{ number_format($item->menu->harga, 0, ',', '.') }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp {{ number_format($item->menu->harga * $item->quantity, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.hapus', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $totalPrice += $item->menu->harga * $item->quantity; 
                    @endphp
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Keranjang anda kosong.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <label for="discount_code">Kode Diskon</label>
            <form action="{{ route('cart.applyDiscount') }}" method="POST">
                @csrf
                <input type="text" class="form-control" id="discount_code" name="discount_code" placeholder="Masukkan kode diskon">
                <button type="submit" class="btn btn-primary mt-2" style="background-color: #1F3933; color: #FFFFFF;">Apply</button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Total</th>
                        <th>Diskon</th>
                        <th>Total Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Rp {{ number_format($totalPrice, 0, ',', '.') }}</td>
                        <td>{{ isset($discount) ? $discount->nilai_diskon . '' : 'Tidak ada diskon' }}</td>
                        <td>
                            @php
                                $discountAmount = isset($discount) ? ($totalPrice * floatval($discount->nilai_diskon) / 100) : 0;
                                $finalPrice = $totalPrice - $discountAmount;
                            @endphp
                            Rp {{ number_format($finalPrice, 0, ',', '.') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <label for="id_payment">Metode Pembayaran</label>
            <select name="id_payment" id="id_payment" class="custom-select">
                <option value="" selected disabled hidden>-- Pilih Metode --</option>
                @foreach ($payment as $row)
                    <option value="{{ $row->id }}" {{ isset($cart) ? ($cart->id_payment == $row->id ? 'selected' : '') : '' }}>{{ $row->method }}</option>
                @endforeach 
            </select>
        </div>

        @if (isset($discount) || $cartItems->isNotEmpty())
            <div class="d-flex justify-content-end align-items-center mt-2">
            @if (isset($discount))
                <form action="{{ route('cart.cancelDiscount') }}" method="POST">
                @csrf
                    <button type="submit" class="btn btn-secondary mr-2">Batalkan Diskon</button>
                </form>
            @endif

            @if($cartItems->isNotEmpty())
                <form action="{{ route('cart.simpan') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-primary" style="background-color: #1F3933; color: #FFFFFF;">Bayar</button>
                </form>            
            @endif
            </div>
            
        @endif
        @if (session('success'))
            <div class="alert alert-success">
            {{ session('success') }}
            </div>
        @endif
    </div>
</div>
@endsection