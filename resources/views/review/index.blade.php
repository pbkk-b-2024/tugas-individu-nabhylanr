@extends('layouts.app')

@section('title', 'All Reviews')

@section('contents')
<div class="container mt-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="mb-3">
                <a href="{{ route('review.tambah') }}" class="btn btn-primary" style="background-color: #1F3933; color: #FFFFFF;">Tambah Review</a>
            </div>        
        </div>
        <div class="card-body">
            

        @if($reviews && $reviews->count() > 0)
                @foreach($reviews as $review)
                <div class="col-lg-8 mb-4 review-item d-flex align-items-center card-container">
                    <div class="user-img">
                        <img src="{{ auth()->user()->profile_photo ? asset('images/profile/' . auth()->user()->profile_photo) : asset('img/default-profile.png') }}" class="img-fluid rounded-circle hover-zoom" alt="{{ auth()->user()->name }}'s Profile Photo" width="50" height="50">
                    </div>

                    <div class="user-review ml-3">
                        <h5 class="mb-1">{{ auth()->user()->nama }}</h5>
                        <div class="stars mb-1">
                            @for($i = 1; $i <= $review->rating; $i++)
                                <span class="fa fa-star checked"></span>
                            @endfor
                            @for($i = $review->rating + 1; $i <= 5; $i++)
                                <span class="fa fa-star"></span>
                            @endfor
                        </div>
                        <p class="text-muted">"{{ $review->review }}"</p>

                        <a href="{{ route('review.hapus', $review->id) }}" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
                @endforeach
            @else
                <p>No reviews found.</p>
                <a href="{{ route('review.tambah') }}" class="btn" style="background-color: #1F3933; color: #FFFFFF;">Add Review</a>
            @endif
        </div>
    </div>
</div>
@endsection