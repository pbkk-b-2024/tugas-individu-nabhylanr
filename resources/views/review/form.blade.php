@extends('layouts.app')

@section('title', 'Form Review')

@section('contents')
<form action="{{ isset($review) ? route('review.tambah.update', $review->id) : route('review.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold" style="color: #1F3933;">
                        {{ isset($review) ? 'Form Edit Review' : 'Form Tambah Review' }}
                    </h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="rating">Rating (1 - 5)</label>
                        <select name="rating" id="rating" class="custom-select">
                            <option value="" selected disabled hidden>-- Pilih Rating --</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" {{ isset($review) && $review->rating == $i ? 'selected' : '' }}>
                                    {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="review">Review</label>
                        <textarea class="form-control" id="review" name="review" rows="4">{{ isset($review) ? $review->review : '' }}</textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn" style="background-color: #1F3933; color: #FFFFFF;">
                        {{ isset($review) ? 'Update Review' : 'Submit Review' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
