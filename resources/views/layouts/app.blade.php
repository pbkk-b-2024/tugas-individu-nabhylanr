<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Starbucks Coffee Company</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
  <style>
    .category-item {
    margin-bottom: 20px;
}

.category-card {
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 15px;
    cursor: pointer;
}

.category-img {
    max-width: 100%;
    border-radius: 8px;
    transition: transform 0.3s ease-in-out;
}

.category-card:hover .category-img {
    transform: scale(1.1); 
}

.category-card:hover {
    transform: translateY(-10px); 
}

p {
    margin-top: 10px;
    font-weight: bold;
    font-size: 16px;
}

.product-item {
        margin-bottom: 30px;
    }
    
    .product-card {
        transition: transform 0.3s ease;
    }

    .product-card:hover {
        transform: scale(1.1);
    }

    .product-img {
        width: 100%;
        border-radius: 10px;
    }

    .popular-products .product-item {
        margin-top: 20px;
    }

    .owner-img {
        width: 100%;
        max-width: 250px;
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .owner-img:hover {
        transform: scale(1.1); 
    }

    .owner-description {
        padding: 20px;
        background-color: #f8f9fc;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .owner-description:hover {
        transform: translateY(-10px); 
    }

    .owner-description h4 {
        font-weight: bold;
    }

    .owner-description p {
        font-size: 16px;
        margin-top: 10px;
    }

.card-container {
    background-color: #f8f9fa; 
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
}

.review-item {
    border-bottom: 1px solid #e0e0e0;
    padding-bottom: 15px;
}

.user-img img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    transition: transform 0.3s ease-in-out;
}

.user-img img:hover {
    transform: scale(1.1); 
}

.stars .fa-star {
    color: #ccc;
    font-size: 18px;
}

.stars .fa-star.checked {
    color: #f39c12; 
}

.hover-zoom {
    cursor: pointer;
}


  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('layouts.navbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
          </div>

          @yield('contents')

          <!-- Content Row -->


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      @include('layouts.footer')
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

</body>

</html>