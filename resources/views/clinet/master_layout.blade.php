<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admincast bootstrap 4 &amp; angular 5 admin template, Шаблон админки | Dashboard</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset("assets/vendors/bootstrap/dist/css/bootstrap.min.css")}}"rel="stylesheet" />
    <link href="{{asset("assets/vendors/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" />
    <link href="{{asset("assets/vendors/themify-icons/css/themify-icons.css")}}" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{asset("assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css")}}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{asset("assets/css/main.min.css")}}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->

    <!-- ajax -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a class="link" href="index.html">
                    <span class="brand" href="{{route('quanlytv')}}" >Thư viện
                    </span>
                    <span class="brand-mini">TV</span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                    <li>
                        <form class="navbar-search" action="javascript:;">
                            <div class="rel">
                                <span class="search-icon"><i class="ti-search"></i></span>
                                <input class="form-control" placeholder="Search here...">
                            </div>
                        </form>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-inbox">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i>
                            <span class="badge badge-primary envelope-badge">9</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                            <li class="dropdown-menu-header">
                                <div>
                                    <span><strong>9 New</strong> Messages</span>
                                    <a class="pull-right" href="mailbox.html">view all</a>
                                </div>
                            </li>
                            <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                                <div>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <img src="{{asset("assets/img/users/u1.jpg")}}" />
                                            </div>
                                            <div class="media-body">
                                                <div class="font-strong"> </div>Jeanne Gonzalez<small class="text-muted float-right">Just now</small>
                                                <div class="font-13">Your proposal interested me.</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <img src="{{asset("assets/img/users/u2.jpg")}}" />
                                            </div>
                                            <div class="media-body">
                                                <div class="font-strong"></div>Becky Brooks<small class="text-muted float-right">18 mins</small>
                                                <div class="font-13">Lorem Ipsum is simply.</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <img src="{{asset("assets/img/users/u3.jpg")}}" />
                                            </div>
                                            <div class="media-body">
                                                <div class="font-strong"></div>Frank Cruz<small class="text-muted float-right">18 mins</small>
                                                <div class="font-13">Lorem Ipsum is simply.</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <img src="{{asset("assets/img/users/u4.jpg")}}" />
                                            </div>
                                            <div class="media-body">
                                                <div class="font-strong"></div>Rose Pearson<small class="text-muted float-right">3 hrs</small>
                                                <div class="font-13">Lorem Ipsum is simply.</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-notification">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o rel"><span class="notify-signal"></span></i></a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                            <li class="dropdown-menu-header">
                                <div>
                                    <span><strong>5 New</strong> Notifications</span>
                                    <a class="pull-right" href="javascript:;">view all</a>
                                </div>
                            </li>
                            <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                                <div>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <span class="badge badge-success badge-big"><i class="fa fa-check"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-13">4 task compiled</div><small class="text-muted">22 mins</small></div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <span class="badge badge-default badge-big"><i class="fa fa-shopping-basket"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-13">You have 12 new orders</div><small class="text-muted">40 mins</small></div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <span class="badge badge-danger badge-big"><i class="fa fa-bolt"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-13">Server #7 rebooted</div><small class="text-muted">2 hrs</small></div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <span class="badge badge-success badge-big"><i class="fa fa-user"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-13">New user registered</div><small class="text-muted">2 hrs</small></div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user">
                        @if(Auth::check())
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="{{asset("assets/img/admin-avatar.png")}}" />
                            <span></span>{{Auth::user()->Full_name ?? "admin"}}<i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="profile.html"><i class="fa fa-user"></i>Trang cá nhân</a>
                            <a class="dropdown-item" href="{{ route('profile', Auth::user()->Id) }}"><i class="fa fa-cog"></i>Cài đặt</a>
                            <a class="dropdown-item" href="{{route("handleLogout")}}"><i class="fa fa-power-off"></i>Đăng xuất</a>
                        </ul>
                        @else
                        <a href="{{route('login')}}" >
                            
                            Đăng nhập</a>
                        @endif
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="{{asset("assets/img/admin-avatar.png")}}" width="45px" />
                    </div>
                    <div class="admin-info">
                        
                        <div class="font-strong">{{Auth::user()->Full_name ?? "admin"}}</div><small>Administrator</small></div>
                </div>
                

                <ul class="side-menu metismenu">
                    <li>
                        <a class="active" href="{{route('trang_chu')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Trang chủ</span>
                        </a>
                    </li>
                    <li class="heading"></li>
                    <li>
                        <a href="">
                            <i class="sidebar-item-icon ti-layout-accordion-list"></i>
                            <span class="nav-label">Phiếu mượn</span><i class="fa fa-angle-left arrow"></i></a>
                        
                    </li>
                    
                    
                </ul>
                    
            </div>
        </nav>
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
           @yield('page_content')
        </div>
    </div>
    <!-- BEGIN THEME CONFIG PANEL-->
    <!-- <div >
        <div class="theme-config-toggle"><i class="fa fa-cog theme-config-show"></i></div>
        
    </div> -->
    <div class="theme-config">
        
    </div>
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
     
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="{{asset("assets/vendors/jquery/dist/jquery.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/vendors/popper.js/dist/umd/popper.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/vendors/bootstrap/dist/js/bootstrap.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/vendors/metisMenu/dist/metisMenu.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js")}}" type="text/javascript"></script>

    
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{asset("assets/vendors/chart.js/dist/Chart.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js")}}" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{asset("assets/js/app.min.js")}}" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="{{asset("assets/js/scripts/dashboard_1_demo.js")}}" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    
</body>

</html>