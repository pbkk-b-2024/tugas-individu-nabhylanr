@extends('layouts.app')

@section('title', 'Membership')

@section('contents')

@php
use Carbon\Carbon;
@endphp

<div class="container mt-5">
    @if(!$membership)
    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Kamu belum join membership</h4>
        <p>Silakan daftar untuk mendapatkan akses membership eksklusif kami.</p>
        <a href="{{ route('membership.tambah') }}" class="btn" style="background-color: #1F3933; color: #FFFFFF;">Join Membership</a>
    </div>
    
    @else
    <div class="card shadow mb-4" style="border-radius: 15px;">
        <div class="card-header py-3 d-flex justify-content-between align-items-center" style="background-color: #1F3933; color: #FFFFFF; border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h5 class="m-0 font-weight-bold">Membership Card</h5>
            <a href="{{ route('membership.hapus', $membership->id) }}" class="btn btn-danger btn-sm">Batalkan Membership</a>
        </div>
        <div class="card-body text-center">
            <div style="position: relative; display: inline-block;">
                <img src="{{ asset('img/membership.png') }}" alt="Membership Card" class="img-fluid" style="border-radius: 15px; max-width: 100%; height: auto; width: 600px;"> <!-- Adjust the width as necessary -->
                
                <div style="position: absolute; bottom: 20px; right: 20px; width: 250px; padding: 10px; background: rgba(255, 255, 255, 0.9); border-radius: 10px; text-align: left;">
                    <h5 class="font-weight-bold" style="color: #000; margin: 0;">{{ auth()->user()->nama }}</h5>
                    <p style="color: #000; margin: 0;">ID: {{ $membership->id }}</p>
                    <p style="color: #000; margin: 0;">Created: {{ Carbon::parse($membership->tglbuat)->format('d-m-Y') }}</p>
                    <p style="color: #000; margin: 0;">Exp: {{ Carbon::parse($membership->tglkadaluwarsa)->format('d-m-Y') }}</p>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection
