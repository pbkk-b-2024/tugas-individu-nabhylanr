@extends('layouts.app')

@section('title', 'Order Page')

@section('contents')
    @foreach($categories as $category)
    <div class="card shadow mb-4">
        <div class="card-header py-3" style="background-color: #1F3933; color: #FFFFFF;">
            <h6 class="m-0 font-weight-bold">{{ $category->nama }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Aksi</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($category->menu as $menu)
                        <tr>
                            <td>{{ $menu->nama_menu }}</td>
                            <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.tambah', $menu->id) }}" method="POST" class="d-flex align-items-center">
                                    @csrf
                                    <input type="number" name="quantity" value="0" min="0" class="form-control mx-2" style="width: 60px; text-align: center;">
                                    <button type="submit" class="btn btn-primary btn-sm ml-2">Add to Cart</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada menu untuk kategori ini.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endforeach
@endsection