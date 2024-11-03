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
                <a class="link" href="{{route('trang_chu')}}">
                    <span class="brand" href="{{route('trang_chu')}}" >Thư viện
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
                

                <x-admin-menu-component/>
                    
            </div>
        </nav>
        <!-- END SIDEBAR-->
        <div class="content-wrapper rows d-flex ">
            <div class="col-8">
                @yield('page_content')
            </div>
            <div class="col-4">
                <!-- START PAGE CONTENT-->
                <div class="page-heading" style="margin-top: 34px;">
                    <h1 class="page-title">Phiếu mượn</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="la la-home font-20"></i></a>
                        </li>
                        <li class="breadcrumb-item">Thông tin phiếu </li>
                    </ol>
                </div>
                <div class="page-content fade-in-up">
                    <div class="ibox invoice">
                        <div class="invoice-header">
                            <div class="row">
                                <div class="col-6">

                                    <div>
                                        <div class="m-b-5 font-bold">Thông tin sinh viên </div>
                                        <ul class="list-unstyled m-t-10">
                                            <li class="m-b-5">
                                                <span class="font-strong">Tên:</span> {{Auth::user()->Full_name }}
                                            </li>
                                            <li class="m-b-5">
                                                <span class="font-strong">Email:</span>{{Auth::user()->Email }}
                                            </li>
                                            <li>
                                                <span class="font-strong">Số điện thoại:</span> {{Auth::user()->Phone }}
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                            </div>
                        </div>

                     
                        <table class="table table-striped no-margin table-invoice">
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Tên sách</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="show_detail">
                                @php $counter = 1; @endphp
                                @if (session('borrow'))
                                @foreach (session('borrow') as $id => $items)
                                <tr id="detail-{{ $id }}">
                                    <td><img src="{{ $items['image'] }}" alt="" style="width: 80px; height: 80px"></td>
                                    <td>{{ $items['name'] }}</td>

                                    <td>
                                        <a class="btn btn-default btn-xs m-r-5" data-id="{{ $id}}" title="Xem chi tiết">
                                            <i class="fa fa-eye font-14"></i></a>
                                        <a class="btn btn-danger btn-sm btn-trash" data-id="{{ $id}}" title="Xóa ">
                                            <i class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <div class="alert alert-warning">Chưa có sách mượn.</div>
                                @endif
                            </tbody>
                        </table>
                        
                        <table class="table no-border">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th width="15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-right">
                                    <td class="font-bold font-18">Ngày mượn:</td>
                                    <td class="font-bold font-18">{{ \Carbon\Carbon::now()->format('d/m/Y') }}</td> <!-- Hiển thị ngày hiện tại -->
                                </tr>
                                <tr class="text-right">
                                    <td class="font-bold font-18">Ngày trả:</td>
                                    <td class="font-bold font-18">{{ \Carbon\Carbon::now()->addMonth()->format('d/m/Y') }}</td> <!-- Thay thế bằng biến chứa ngày trả -->
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-right ">
                            <button class="btn btn-primary btn-add-borrow" type="button"><i ></i>Tạo phiếu mượn </button>
                        </div>
                     
                    </div>


                    <style>
                        .invoice {
                            padding: 20px
                        }

                        .invoice-header {
                            margin-bottom: 50px
                        }

                        .invoice-logo {
                            margin-bottom: 50px;
                        }

                        .table-invoice tr td:last-child {
                            text-align: right;
                        }
                    </style>

                </div>
            </div>
          
           
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
   
    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function() {

        $('body').on('click', '.btn-trash', function(e) {
            e.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                title: "Xác nhận xóa khỏi phiếu mượn",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xóa",
                cancelButtonText: "Hủy"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/remove_book/" + id,
                        type: "POST",
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            toastr.success(response.message);
                            $('#detail-' + id).remove();
                        },
                        error: function(xhr) {
                            toastr.error('Có lỗi khi xóa thiết bị');
                        }
                    });
                }
            });
        })


        $('body').on('click', '.btn-add-borrow', function(e) {
            let mainDescription = $('#main-description').val();
            $.ajax({
                url: '/create_borrow',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    description: mainDescription
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success('Tạo phiếu mượn thành công!');
                        // $('#modal-default2').modal('hide');
                        // $('#main-description').val('');
                        // $('#example-table tbody').empty();
                        document.getElementById('show_detail').innerHTML = "";
                    } else if (response.error) {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);  // In ra console để kiểm tra chi tiết lỗi
                    alert('Có lỗi xảy ra: ' + xhr.responseText);  // Hiển thị lỗi trong alert
                }
            });
        });

        setTimeout(function() {
            $("#myAlert").fadeOut(500);
        }, 3500);
    })
</script>

</html>