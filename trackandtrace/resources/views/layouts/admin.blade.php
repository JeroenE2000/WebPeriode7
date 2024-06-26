<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminPanel</title>
  <!-- Google Font: Source Sans Pro -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- Datatables bootstrap -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.5.2/css/OverlayScrollbars.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('lang.switch', 'en') }}">EN</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"href="{{ route('lang.switch', 'nl') }}">NL</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{asset('assets/images/packr.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Packr</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">
            <a href="" class="d-block">
                <i class="ion ion-person" style="font-size: 16px"></i> {{__('admin.welcome')}} {{ Auth::user()->name }}</i>
            </a>
            <p></p>

            <a href="{{ route('logout') }}"   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="d-block">
                <i class="ion-log-out" style="font-size: 16px"></i> {{__('admin.logout')}}</i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
          <li class="nav-item">
            <a href="{{url('labels')}}" class="nav-link">
              <i class="nav-icon far fa fa-tag"></i>
              <p>{{__('admin.label')}}</p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{url('package')}}" class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>{{__('admin.package')}}</p>
            </a>
          </li>

          @if(auth()->user()->role_id == 1)
          <li class="nav-item">
            <a href="{{url('shops')}}" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>{{__('admin.shops')}}</p>
            </a>
          </li>
          @endif
          @if(auth()->user()->role_id == 1)
          <li class="nav-item">
            <a href="{{url('users')}}" class="nav-link">
              <i class="nav-icon ion ion-person"></i>
              <p>{{__('admin.users')}}</p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{url('reviews')}}" class="nav-link">
              <i class="nav-icon ion-ios-star"></i>
              <p>{{__('admin.review')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/')}}" class="nav-link">
                <i class="nav-icon ion-ios-search"></i>
              <p>{{__('admin.searchpackage')}}</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            @yield('content')
        </div>
    </section>
</div>
<!-- ./wrapper -->
<!-- scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.5.2/js/jquery.overlayScrollbars.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
