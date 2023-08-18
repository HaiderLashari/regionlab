<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('/public/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{url('/public/assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/public/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{url('/public/assets/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{url('/public/assets/vendor/vector-map/jqvmap.css')}}">
    <link href="{{url('/public/assets/vendor/jvectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/public/assets/assets/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{url('/public/assets/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{url('/public/assets/vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('/public/assets/vendor/daterangepicker/daterangepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <title>Region Lab</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="">Regionlab</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                    {{--     <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li> --}}
                        

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link border nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown b" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">{{auth()->user()->name}}</h5>
                                </div>
                                @if(auth()->check())
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item" style="cursor: pointer;">Logout</button>
                                </form>
                                @endif

                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        {{-- @if(Auth::check() && Auth::user()->roll == 'admin') --}}
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                User
                            </li>
                            @if(Auth::check() && Auth::user()->role == 'admin')

                            <li class="nav-item ">
                                <a class="nav-link active" href="{{ url('/user-data')}}"  aria-expanded="false"  aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>User <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                  
                                    
                                </div>
                            </li> <br>
                            @endif
                            <li class="nav-item ">
                                <a class="nav-link active" href="{{url('/chatbox')}}"  aria-expanded="false"  aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Chat Box <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                  
                                    
                                </div>
                            </li> <br>
                            <li class="nav-item ">
                                <a class="nav-link active" href="{{url('/client-display')}}"  aria-expanded="false"  aria-controls="submenu-2"><i class="fa fa-fw fa-user-circle"></i>Clients<span class="badge badge-success">6</span></a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                  
                                    
                                </div>
                            </li> <br>


                            
                        </ul>
                        
                    </div>

                </nav>
            </div>
        </div>
        
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
         <div class="dashboard-finance">
             <div class="container-fluid dashboard-content px-0">
                 @yield('content')
             </div>
         </div>
     </div>
     <!-- ============================================================== -->
     <!-- footer -->
     <!-- ============================================================== -->


     <!-- end main wrapper  -->
     <!-- ============================================================== -->
     <!-- jquery 3.3.1  -->
     <script src="{{url('/public/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
     <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
     <script>
         let table = new DataTable('#clientTable');
     </script>
     <!-- bootstap bundle js -->
     <script src="{{url('/public/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
     <!-- slimscroll js -->
     <script src="{{url('/public/assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
     <!-- chart chartist js -->
     <script src="{{url('/public/assets/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
     <script src="{{url('/public/assets/vendor/charts/chartist-bundle/Chartistjs.js')}}"></script>
     <script src="{{url('/public/assets/vendor/charts/chartist-bundle/chartist-plugin-threshold.js')}}"></script>
     <!-- chart C3 js -->
     <script src="{{url('/public/assets/vendor/charts/c3charts/c3.min.js')}}"></script>
     <script src="{{url('/public/assets/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
     <!-- chartjs js -->
     <script src="{{url('/public/assets/vendor/charts/charts-bundle/Chart.bundle.js')}}"></script>
     <script src="{{url('/public/assets/vendor/charts/charts-bundle/chartjs.js')}}"></script>
     <!-- sparkline js -->
     <script src="{{url('/public/assets/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
     <!-- dashboard finance js -->
     <script src="{{url('/public/assets/libs/js/dashboard-finance.js')}}"></script>
     <!-- main js -->
     <script src="{{url('/public/assets/libs/js/main-js.js')}}"></script>
     <!-- gauge js -->
     <script src="{{url('/public/assets/vendor/gauge/gauge.min.js')}}"></script>
     <!-- morris js -->
     <script src="{{url('/public/assets/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
     <script src="{{url('/public/assets/vendor/charts/morris-bundle/morris.js')}}"></script>
     <script src="{{url('/public/assets/vendor/charts/morris-bundle/morrisjs.html')}}"></script>
     <!-- daterangepicker js -->
     <script src="../../../../{{url('/public/cdn.jsdelivr.net/momentjs/latest/moment.min.js')}}"></script>
     <script src="../../../../{{url('/public/cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js')}}"></script>
     <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end wrapper  -->

<!-- ============================================================== -->
</div>
<!-- ============================================================== -->


</body>
</html>
