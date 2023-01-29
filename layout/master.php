<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>SB Admin - Dashboard</title>



<!-- Bootstrap core CSS-->
<link href="{{asset('/admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

<!-- Custom fonts for this template-->
<link href="{{asset('/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

<!-- Page level plugin CSS-->
<link href="{{asset('/admin/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{asset('/admin/css/sb-admin.css')}}" rel="stylesheet">

</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="{{asset('/admin/index.html')}}"></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form action="{{url('show7')}}" method="POST" role="search" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        {{csrf_field()}}
        <div class="input-group">
            <input type="text" class="form-control" name="name" value="@if(!empty($info1)) {{$info1->name}} @endif" placeholder="Search for...use name" aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>


    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#"></a>
                <a class="dropdown-item" href="#"></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </li>
    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">

        <li class="nav-item active">
            <a class="nav-link" href="{{url('home1')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Home</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="{{url('about')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>About</span></a>
        </li>



        <li class="nav-item active">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Setting Result</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">

                <a class="dropdown-item" href="{{url('result6')}}">Class Six</a>
                <a class="dropdown-item" href="{{url('result7')}}">Class Seven</a>
                <a class="dropdown-item" href="{{url('result8')}}">Class Eight</a>
                <a class="dropdown-item" href="{{url('result9')}}">Class Nine</a>
                <a class="dropdown-item" href="{{url('result10')}}">Class Ten</a>
                <div class="dropdown-divider"></div>

            </div>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="{{url('adminshowdata')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>User Info</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="{{url('login')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Admin</span></a>
        </li>


        <li class="nav-item active">
            <a class="nav-link" href="{{url('register')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Registration</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="{{url('contact')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Contact Us</span></a>
        </li>




        <li class="nav-item active">
            <a class="nav-link" href="{{url('logout')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Logout</span></a>
        </li>
    </ul>


 <h1> </h1>




@yield('content')




    <!-- Sticky Footer
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Your Website 2018</span>
                </div>
            </div>
        </footer>
-->



    <!-- /.content-wrapper -->


<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <!--       <a class="btn btn-primary" href="/blog/welcome.html">Logout</a>    -->

                <a class="btn btn-primary" href="{{url('/logout')}}">Logout</a>

            </div>
        </div>
    </div>
</div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('/admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Page level plugin JavaScript-->
<script src="{{asset('/admin/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('/admin/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('/admin/vendor/datatables/dataTables.bootstrap4.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('/admin/js/sb-admin.min.js')}}"></script>

<!-- Demo scripts for this page-->
<script src="{{asset('/admin/js/demo/datatables-demo.js')}}"></script>
<script src="{{asset('/admin/js/demo/chart-area-demo.js')}}"></script>

</body>

</html>