<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="stylesheet" href="{{asset('assets/index.css')}}">

    <title>@yield('title',env('APP_NAME'))</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">


    <!-- Custom styles for this template-->
    <link href="{{asset('admin_assets/assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

<style>
    *{
        font-size: 20px;
        font-family: "Times New Roman", Times, serif;
        font-weight: bold;
    }
    .sidebar{
        background-color:#834703;
          background-image: none !important;

    }
    html, body {
    height: 100%;
    margin: 0;
}

.wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.content {
    flex: 1;
}
.pacifico-regular {
  font-family: "Pacifico", cursive;
  font-weight: 400;
  font-style: normal;
}

.nav-item .collapse-item.active {
    background-color: #834703 !important; /* لون رمادي */
    color: #fff !important;
}



</style>
@yield('css')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center "  href="{{route('front.index')}}">

 <div class="logo">
  <img src="{{asset('assets/images/logo2.png')}}" alt="Velveta Logo" class="logo-img">
  <h1 class="logo-text pacifico-regular">Velveta</h1>
</div>     </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
              <li class="nav-item {{request()->routeIs('dashboard')  ?'active' :''}}">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->


        <li class="nav-item {{request()->routeIs('dashboard.sets.index') || request()->routeIs('dashboard.sets.create') ?'active' :''}}">
                <a class="nav-link {{request()->routeIs('dashboard.sets.index') || request()->routeIs('dashboard.sets.create') ?'' :'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseSets"
                    aria-expanded="true" aria-controls="collapseSets">
                    <i class="fas fa-gem"></i>
                    <span>Accessories sets</span>
                </a>
                <div id="collapseSets"  class="collapse {{request()->routeIs('dashboard.sets.index') || request()->routeIs('dashboard.sets.create') ?'show' :''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{request()->routeIs('dashboard.sets.index')?'active' :''}}" href="{{route('dashboard.sets.index')}}" href="#">Show All</a>
                        <a class="collapse-item {{request()->routeIs('dashboard.sets.create')?'active' :''}}" href="{{route('dashboard.sets.create')}}" href="#">Add New</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
              <li class="nav-item {{request()->routeIs('dashboard.rings.index') || request()->routeIs('dashboard.rings.create') ?'active' :''}}">
                <a class="nav-link {{request()->routeIs('dashboard.rings.index') || request()->routeIs('dashboard.rings.create') ?'' :'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseRings"
                    aria-expanded="true" aria-controls="collapseRings">
                    <i class="fas fa-gem"></i>
                    <span>Rings</span>
                </a>
                <div id="collapseRings"  class="collapse {{request()->routeIs('dashboard.rings.index') || request()->routeIs('dashboard.rings.create') ?'show' :''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{request()->routeIs('dashboard.rings.index')?'active' :''}}" href="{{route('dashboard.rings.index')}}" href="#">Show All</a>
                        <a class="collapse-item {{request()->routeIs('dashboard.rings.create')?'active' :''}}" href="{{route('dashboard.rings.create')}}" href="#">Add New</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
               <li class="nav-item {{request()->routeIs('dashboard.necklaces.index') || request()->routeIs('dashboard.necklaces.create') ?'active' :''}}">
                <a class="nav-link {{request()->routeIs('dashboard.necklaces.index') || request()->routeIs('dashboard.sets.create') ?'' :'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseNecklaces"
                    aria-expanded="true" aria-controls="collapseNecklaces">
                    <i class="fas fa-gem"></i>
                    <span>Necklaces</span>
                </a>
                <div id="collapseNecklaces"  class="collapse {{request()->routeIs('dashboard.necklaces.index') || request()->routeIs('dashboard.necklaces.create') ?'show' :''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{request()->routeIs('dashboard.necklaces.index')?'active' :''}}" href="{{route('dashboard.necklaces.index')}}" href="#">Show All</a>
                        <a class="collapse-item {{request()->routeIs('dashboard.necklaces.create')?'active' :''}}" href="{{route('dashboard.necklaces.create')}}" href="#">Add New</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
              <li class="nav-item {{request()->routeIs('dashboard.bracelets.index') || request()->routeIs('dashboard.bracelets.create') ?'active' :''}}">
                <a class="nav-link {{request()->routeIs('dashboard.bracelets.index') || request()->routeIs('dashboard.bracelets.create') ?'' :'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseBracelets"
                    aria-expanded="true" aria-controls="collapseBracelets">
                    <i class="fas fa-gem"></i>
                    <span>Bracelets</span>
                </a>
                <div id="collapseBracelets"  class="collapse {{request()->routeIs('dashboard.bracelets.index') || request()->routeIs('dashboard.bracelets.create') ?'show' :''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{request()->routeIs('dashboard.bracelets.index')?'active' :''}}" href="{{route('dashboard.bracelets.index')}}" href="#">Show All</a>
                        <a class="collapse-item {{request()->routeIs('dashboard.bracelets.create')?'active' :''}}" href="{{route('dashboard.bracelets.create')}}" href="#">Add New</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
               <li class="nav-item {{request()->routeIs('dashboard.earrings.index') || request()->routeIs('dashboard.earrings.create') ?'active' :''}}">
                <a class="nav-link {{request()->routeIs('dashboard.earrings.index') || request()->routeIs('dashboard.earrings.create') ?'' :'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseEarrings"
                    aria-expanded="true" aria-controls="collapseEarrings">
                    <i class="fas fa-gem"></i>
                    <span>Earrings</span>
                </a>
                <div id="collapseEarrings"  class="collapse {{request()->routeIs('dashboard.earrings.index') || request()->routeIs('dashboard.earrings.create') ?'show' :''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{request()->routeIs('dashboard.earrings.index')?'active' :''}}" href="{{route('dashboard.earrings.index')}}" href="#">Show All</a>
                        <a class="collapse-item {{request()->routeIs('dashboard.earrings.create')?'active' :''}}" href="{{route('dashboard.earrings.create')}}" href="#">Add New</a>
                    </div>
                </div>
            </li>




            <hr class="sidebar-divider">

     <li class="nav-item {{request()->routeIs('dashboard.customers.index') || request()->routeIs('dashboard.admins.index') ?'active' :''}}" >
                <a class="nav-link {{request()->routeIs('dashboard.customers.index') || request()->routeIs('dashboard.admins.index') ?'' :'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseUser"
                    aria-expanded="true" aria-controls="collapseUser">
                    <i class="fas fa-fw fa-tag  "></i>
                    <span >Users</span>
                </a>
                <div id="collapseUser" class="collapse {{request()->routeIs('dashboard.customers.index')|| request()->routeIs('dashboard.admins.index') ?'show' :''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item {{request()->routeIs('dashboard.customers.index')?'active' :''}}" href="{{route('dashboard.customers.index')}}">Customers</a>
                        <a class="collapse-item {{request()->routeIs('dashboard.admins.index')?'active' :''}}" href="{{route('dashboard.admins.index')}}">Admins</a>
                    </div>
                </div>
            </li>




        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('profile.edit')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                 <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <button  class="dropdown-item">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                      Logout
                                </a></button>
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

   @yield('content')


            <!-- Footer -->
           <div class="wrapper">
    <div class="content">
        <!-- ضع هنا كل محتوى الصفحة (navbar, main content, ...إلخ) -->
    </div>

    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div>
    </footer>
</div>

            <!-- End of Footer -->


        <!-- End of Content Wrapper -->

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>
@yield('js')
</body>

</html>
