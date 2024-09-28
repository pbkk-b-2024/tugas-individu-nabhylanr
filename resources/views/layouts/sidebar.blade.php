<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #1F3933; color: #000000;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <img src="{{ asset('img/logo.svg.png') }}" alt="Brand Image" class="img-fluid rounded-circle" style="width: 50px; height: 50px;">
      </div>
      <div class="sidebar-brand-text mx-3">Starbucks</div>
    </a>
  
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
  
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-home"></i>
        <span>Dashboard </span></a>
    </li>
    
    @if (auth()->user()->level == 'Admin')
    <li class="nav-item">
      <a class="nav-link" href="{{ route('menu') }}">
        <i class="fas fa-utensils"></i>
        <span>Menus</span></a>
    </li>
    @endif

  
    @if (auth()->user()->level == 'Admin')
    <li class="nav-item">
      <a class="nav-link" href="{{ route('kategori') }}">
        <i class="fas fa-list-alt"></i>
        <span>Categories</span></a>
    </li>
    @endif

    <li class="nav-item">
      <a class="nav-link" href="{{ route('order') }}">
        <i class="fas fa-receipt"></i>
        <span>Order</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('membership') }}">
        <i class="fas fa-id-card"></i>
        <span>Membership</span></a>
    </li>
  
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
  
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
  </ul>