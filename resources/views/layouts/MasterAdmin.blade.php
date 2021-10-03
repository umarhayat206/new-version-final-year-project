<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  {{-- <script src="{{ asset('js/app.js') }}"></script>    --}}
  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
  {{-- data tables --}}
   {{-- <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}"> --}}
  
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @yield('css')
 <style>
   #circle {
      width: 10px;
      height: 10px;
      background:rgb(31, 179, 75);
      border-radius: 50%
    }
 </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  @include('sweetalert::alert')
  <div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown user user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="{{url('images/userImages',Auth()->user()->image)}}" class="user-image img-circle elevation-2 alt="User Image">
          <span class="hidden-xs font-weight-bold"> {{Auth()->user()->name}}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="{{url('images/userImages',Auth()->user()->image)}}" class="img-circle elevation-2" alt="User Image">
    
            <p>
              {{Auth()->user()->name}}  
              <small>
                @foreach (Auth()->user()->roles as $role)
                {{$role->name}}
            @endforeach</small>
            </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
            <div class="row">
              <div class="col-4 ">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="col-3 text-center">
                {{-- <a href="#">Sales</a> --}}
              </div>
              <div class="col-5 ">
                <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
               </form>
              </div>
            </div>
            <!-- /.row -->
          </li>
        </ul>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-bold">E-VOTE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('images/userImages',Auth()->user()->image)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth()->user()->name}}</a>
        </div>
        {{-- <div class="info">
          <div id="circle"><a class="d-block">Online</a></div>
        </div> --}}
        
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Candidates
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('candidates.index')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-info"></i>
                  <p>All Candidates</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('candidates.create')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Create Candidate</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Voters
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('voters.index')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-info"></i>
                  <p>All Voters</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('voters.create')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Create Voter</p>
                </a>
              </li>
            </ul>
          </li>

          
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                Parties
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('parties.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Parties</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('parties.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Party</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Positions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('positions.index')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-info"></i>
                  <p>All Postions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('positions.create')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Create Position</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">NOTIFICATIONS</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-bell"></i>
              {{-- <i class="nav-icon fas fa-location"></i> --}}
              <p>
                Notifications
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('notifications.index')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-info"></i>
                  <p>All Notifications</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('notifications.create')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Add New Notification</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">ALL AREAS</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              {{-- <i class="nav-icon fas fa-location"></i> --}}
              <p>
                National Areas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('nationalareas.index')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-info"></i>
                  <p>All National Areas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('nationalareas.create')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Add New Area</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              {{-- <i class="nav-icon fas fa-location"></i> --}}
              <p>
                Provicial Areas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('provinceareas.index')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-info"></i>
                  <p>All Province Areas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('provinceareas.create')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Add New Area</p>
                </a>
              </li>
            </ul>
          </li>
          @if(Auth()->user()->hasRole('super-admin'))
          <li class="nav-header">SYSTEM USERS</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-info"></i>
                  <p>All Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('users.create')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Add New User</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </nav>
     
    </div>
   
  </aside>

  
  <div class="content-wrapper">
  
    <br><br>
    <section class="content">
      <div class="container-fluid">
        
        @yield('content')
      </div>
    </section>
    
  </div>

  <aside class="control-sidebar control-sidebar-dark">
   
  </aside>

</div>

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.js')}}"></script>

<script src="{{asset('dist/js/demo.js')}}"></script>


<script src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>

<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>


<script src="{{asset('dist/js/pages/dashboard2.js')}}"></script>

<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

@stack('js')

</body>
</html>
