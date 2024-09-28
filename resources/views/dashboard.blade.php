@extends('layouts.app')

@section('contents')

<div id="carouselExampleCaptions" class="carousel slide mb-5">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('img/banner1.jpg') }}" class="d-block w-100" alt="First slide">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/banner2.jpg') }}" class="d-block w-100" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/banner3.jpg') }}" class="d-block w-100" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/banner3.jpg') }}" class="d-block w-100" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<img src="{{ asset('img/2.jpg') }}" style="width: 100%; max-width: 1200px; margin: 20px 0;">

<div class="container mb-5" style="color: #000000;">
    <h2 class="text-center my-5">Top Category Drink Picks</h2>
    <div class="row justify-content-center">
        <div class="col-lg-2 col-md-4 col-sm-6 category-item" style="margin: 20px;">
            <div class="product-card">
                <img src="{{ asset('img/drinks2.jpg') }}" class="img-fluid category-img rounded-circle" alt="Cold Coffees">
                <p class="text-center">Cold Coffees</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 category-item" style="margin: 20px;">
            <div class="product-card">
                <img src="{{ asset('img/drinks3.jpg') }}" class="img-fluid category-img rounded-circle" alt="Hot Teas">
                <p class="text-center">Hot Teas</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 category-item" style="margin: 20px;">
            <div class="product-card">
                <img src="{{ asset('img/drinks4.jpg') }}" class="img-fluid category-img rounded-circle" alt="Frappuccino Blended">
                <p class="text-center">Frappuccino</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 category-item" style="margin: 20px;">
            <div class="product-card">
                <img src="{{ asset('img/drinks5.jpg') }}" class="img-fluid category-img rounded-circle" alt="Hot Coffees">
                <p class="text-center">Hot Coffees</p>
            </div>
        </div>
    </div>

    <h2 class="text-center my-5">Another Category Picks</h2>
    <div class="row justify-content-center popular-products">
        <div class="col-lg-3 col-md-4 col-sm-6 product-item">
            <div class="category-card">
                <img src="{{ asset('img/another1.jpg') }}" class="img-fluid product-img" alt="Product 1">
                <p class="text-center">Hot Breakfast</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 product-item">
            <div class="category-card">
                <img src="{{ asset('img/another2.jpg') }}" class="img-fluid product-img" alt="Product 2">
                <p class="text-center">Bakery</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 product-item">
            <div class="category-card">
                <img src="{{ asset('img/another3.jpg') }}" class="img-fluid product-img" alt="Product 3">
                <p class="text-center">Tumblers</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 product-item">
            <div class="category-card">
                <img src="{{ asset('img/another4.jpg') }}" class="img-fluid product-img" alt="Product 4">
                <p class="text-center">Whole Bean</p>
            </div>
        </div>
    </div>
  

    <h2 class="text-center my-5">User Feedback and Reviews</h2>
    <div class="row justify-content-center">
        <div class="col-lg-8 mb-4 review-item d-flex align-items-center card-container">
            <div class="user-img">
                <img src="{{ asset('img/profile.PNG') }}" class="img-fluid rounded-circle hover-zoom" alt="User 1">
            </div>
            <div class="user-review ml-3">
                <h5 class="mb-1">Ardhika Krishna</h5>
                <div class="stars mb-1">
                    @for($i = 1; $i <= 4; $i++)
                        <span class="fa fa-star checked"></span>
                    @endfor
                    <span class="fa fa-star"></span> 
                </div>
                <p class="text-muted">"Smooth and creamy taste, perfect for enjoying in the morning!"</p>
            </div>
        </div>

        <div class="col-lg-8 mb-4 review-item d-flex align-items-center card-container">
            <div class="user-img">
                <img src="{{ asset('img/icon.png') }}" class="img-fluid rounded-circle hover-zoom" alt="User 2">
            </div>
            <div class="user-review ml-3">
                <h5 class="mb-1">Blacky</h5>
                <div class="stars mb-1">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="fa fa-star checked"></span>
                    @endfor
                </div>
                <p class="text-muted">"A unique scent coffee!"</p>
            </div>
        </div>

        <div class="col-lg-8 mb-4 review-item d-flex align-items-center card-container">
            <div class="user-img">
                <img src="{{ asset('img/icon.png') }}" class="img-fluid rounded-circle hover-zoom" alt="User 3">
            </div>
            <div class="user-review ml-3">
                <h5 class="mb-1">Furstin Aprilavia</h5>
                <div class="stars mb-1">
                    @for($i = 1; $i <= 3; $i++)
                        <span class="fa fa-star checked"></span>
                    @endfor
                    @for($i = 4; $i <= 5; $i++)
                        <span class="fa fa-star"></span>
                    @endfor
                </div>
                <p class="text-muted">"Good, but coffee too strong."</p>
            </div>
        </div>

        <div class="col-lg-8 mb-4 review-item d-flex align-items-center card-container">
            <div class="user-img">
                <img src="{{ asset('img/icon.png') }}" class="img-fluid rounded-circle hover-zoom" alt="User 4">
            </div>
            <div class="user-review ml-3">
                <h5 class="mb-1">Yasmin Putri</h5>
                <div class="stars mb-1">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="fa fa-star checked"></span>
                    @endfor
                </div>
                <p class="text-muted">"The aroma is fragrant, and the flavor profile is rich. Perfect!"</p>
            </div>
        </div>
    </div>
</div>

<h2 class="text-center my-5" style="color: #000000;">Country Map Starbucks</h2>
<div style="display: flex; justify-content: center; align-items: center;">
    <img src="{{ asset('img/map.jpg') }}" class="img-fluid product-img" alt="Product 4" style="width: 900px; height: auto;">
</div>

  <!-- Content Row -->
{{-- 
  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Promo Of The Month 💥</h6>
          
        </div>
        <!-- Card Body -->
        <div class="card-body">
          
          <div class="mt-4 text-center">
            <img src="{{ asset('img/shop.png') }}" class="img-fluid" alt="Login Image">
          </div>
        </div>
      </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Company Owner 🚀</h6>
          
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="mt-4 text-center">
            <img src="{{ asset('img/profile.png') }}" class="img-fluid" alt="Login Image">
          </div>
          
        </div>
      </div>
    </div>
  </div> --}}

  
    
@endsection