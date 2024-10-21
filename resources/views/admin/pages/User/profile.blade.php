<style>
    #success-message, #error-message {
        position: fixed;
        right: 20px; 
        top: 20px; 
        z-index: 9999;
        display: none; 
    }

    .alert {
        margin: 0;
        padding: 10px;
        border-radius: 5px; 
    }
    
</style>
@extends('admin.master_layout')
@section('page_content')
<!-- END SIDEBAR-->

            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Profile</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Profile</li>
                </ol>
            </div>
            @if(session('success'))
                <div class="alert alert-success" id="success-message">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger" id="error-message">
                    {{ session('error') }}
                </div>
            @endif
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="ibox">
                            <div class="ibox-body text-center">
                                <div class="m-t-20">
                                    <img class="img-circle" src="{{asset("assets/img/users/u3.jpg")}}" />
                                </div>
                                <h5 class="font-strong m-b-10 m-t-10">{{"$user->Full_name"}}</h5>
                                <!-- <div class="m-b-20 text-muted">Web Developer</div> -->
                                <div class="profile-social m-b-20">
                                    <a href="javascript:;"><i class="fa fa-twitter"></i></a>
                                    <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                                    <a href="javascript:;"><i class="fa fa-pinterest"></i></a>
                                    <a href="javascript:;"><i class="fa fa-dribbble"></i></a>
                                </div>
                                <div>
                                    <button class="btn btn-info btn-rounded m-b-5"><i class="fa fa-plus"></i> Follow</button>
                                    <button class="btn btn-default btn-rounded m-b-5">Message</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="ibox">
                            <div class="ibox-body">
                                <ul class="nav nav-tabs tabs-line">
                                    <li class="nav-item">
                                        <a class="nav-link " href="#tab-1" data-toggle="tab"><i class="ti-bar-chart"></i> Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tab-3" data-toggle="tab"><i class="ti-announcement"></i> Thông báo</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="#tab-2" data-toggle="tab"><i class="ti-settings"></i> Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="#tab-4" data-toggle="tab"><i class="ti-key"></i> Đổi mật khẩu</a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade " id="tab-1">
                                        <div class="row">
                                            <div class="col-md-6" style="border-right: 1px solid #eee;">
                                                <h5 class="text-info m-b-20 m-t-10"><i class="fa fa-bar-chart"></i> Month Statistics</h5>
                                                <div class="h2 m-0">$12,400<sup>.60</sup></div>
                                                <div><small>Month income</small></div>
                                                <div class="m-t-20 m-b-20">
                                                    <div class="h4 m-0">120</div>
                                                    <div class="d-flex justify-content-between"><small>Month income</small>
                                                        <span class="text-success font-12"><i class="fa fa-level-up"></i> +24%</span>
                                                    </div>
                                                    <div class="progress m-t-5">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" style="width:50%; height:5px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="m-b-20">
                                                    <div class="h4 m-0">86</div>
                                                    <div class="d-flex justify-content-between"><small>Month income</small>
                                                        <span class="text-warning font-12"><i class="fa fa-level-down"></i> -12%</span>
                                                    </div>
                                                    <div class="progress m-t-5">
                                                        <div class="progress-bar progress-bar-warning" role="progressbar" style="width:50%; height:5px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <ul class="list-group list-group-full list-group-divider">
                                                    <li class="list-group-item">Projects
                                                        <span class="pull-right color-orange">15</span>
                                                    </li>
                                                    <li class="list-group-item">Tasks
                                                        <span class="pull-right color-orange">148</span>
                                                    </li>
                                                    <li class="list-group-item">Articles
                                                        <span class="pull-right color-orange">72</span>
                                                    </li>
                                                    <li class="list-group-item">Friends
                                                        <span class="pull-right color-orange">44</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="text-info m-b-20 m-t-10"><i class="fa fa-user-plus"></i> Latest Followers</h5>
                                                <ul class="media-list media-list-divider m-0">
                                                    <li class="media">
                                                        <a class="media-img" href="javascript:;">
                                                            <img class="img-circle" src="{{asset("assets/img/users/u1.jpg")}}" width="40" />
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="media-heading">Jeanne Gonzalez <small class="float-right text-muted">12:05</small></div>
                                                            <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <a class="media-img" href="javascript:;">
                                                            <img class="img-circle" src="{{asset("assets/img/users/u2.jpg")}}" width="40" />
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="media-heading">Becky Brooks <small class="float-right text-muted">1 hrs ago</small></div>
                                                            <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <a class="media-img" href="javascript:;">
                                                            <img class="img-circle" src="{{asset("assets/img/users/u3.jpg")}}" width="40" />
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="media-heading">Frank Cruz <small class="float-right text-muted">3 hrs ago</small></div>
                                                            <div class="font-13">Lorem Ipsum is simply dummy.</div>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <a class="media-img" href="javascript:;">
                                                            <img class="img-circle" src="{{asset("assets/img/users/u6.jpg")}}" width="40" />
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="media-heading">Connor Perez <small class="float-right text-muted">Today</small></div>
                                                            <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <a class="media-img" href="javascript:;">
                                                            <img class="img-circle" src="{{asset("assets/img/users/u5.jpg")}}" width="40" />
                                                        </a>
                                                        <div class="media-body">
                                                            <div class="media-heading">Bob Gonzalez <small class="float-right text-muted">Today</small></div>
                                                            <div class="font-13">Lorem Ipsum is simply dummy.</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4 class="text-info m-b-20 m-t-20"><i class="fa fa-shopping-basket"></i> Latest Orders</h4>
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Customer</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th width="91px">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>11</td>
                                                    <td>@Jack</td>
                                                    <td>$564.00</td>
                                                    <td>
                                                        <span class="badge badge-success">Shipped</span>
                                                    </td>
                                                    <td>10/07/2017</td>
                                                </tr>
                                                <tr>
                                                    <td>12</td>
                                                    <td>@Amalia</td>
                                                    <td>$220.60</td>
                                                    <td>
                                                        <span class="badge badge-success">Shipped</span>
                                                    </td>
                                                    <td>10/07/2017</td>
                                                </tr>
                                                <tr>
                                                    <td>13</td>
                                                    <td>@Emma</td>
                                                    <td>$760.00</td>
                                                    <td>
                                                        <span class="badge badge-default">Pending</span>
                                                    </td>
                                                    <td>10/07/2017</td>
                                                </tr>
                                                <tr>
                                                    <td>14</td>
                                                    <td>@James</td>
                                                    <td>$87.60</td>
                                                    <td>
                                                        <span class="badge badge-warning">Expired</span>
                                                    </td>
                                                    <td>10/07/2017</td>
                                                </tr>
                                                <tr>
                                                    <td>15</td>
                                                    <td>@Ava</td>
                                                    <td>$430.50</td>
                                                    <td>
                                                        <span class="badge badge-default">Pending</span>
                                                    </td>
                                                    <td>10/07/2017</td>
                                                </tr>
                                                <tr>
                                                    <td>16</td>
                                                    <td>@Noah</td>
                                                    <td>$64.00</td>
                                                    <td>
                                                        <span class="badge badge-success">Shipped</span>
                                                    </td>
                                                    <td>10/07/2017</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane fade " id="tab-2">
                                        <form method="POST" action="{{ route('update_profile', ['Id' => $user->Id]) }}" >
                                        @csrf
                                        @method('PUT')
                                            <div class="form-group">
                                                <label>Họ và tên</label>
                                                <input  class="form-control" type="text" value="{{$user->Full_name }}" readonly >
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="email" class="form-control" type="email" value="{{$user->Email }}" >
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Số điện thoại</label>
                                                <input name="phone" class="form-control" type="text" value="{{$user->Phone }}" >
                                            </div>
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input name="address" class="form-control" type="text" value="{{$user->Address }}" >
                                            </div>
                                            
                                            <div class="form-group">
                                                <button class="btn btn-default" type="submit">Lưu</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="tab-3">
                                        <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-bullhorn"></i> Latest Feeds</h5>
                                        <ul class="media-list media-list-divider m-0">
                                            <li class="media">
                                                <div class="media-img"><i class="ti-user font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading">New customer <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-info-alt font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading text-warning">Server Warning <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-announcement font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading">7 new feedback <small class="float-right text-muted">Today</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-check font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading text-success">Issue fixed <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-shopping-cart font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading">7 New orders <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-img"><i class="ti-reload font-18 text-muted"></i></div>
                                                <div class="media-body">
                                                    <div class="media-heading text-danger">Server warning <small class="float-right text-muted">12:05</small></div>
                                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="tab-4">
                                       
                                    <form method="POST" action="{{route('update_pw',['Id' => $user->Id])}}" >
                                        @csrf
                                        @method('PUT')
                                            <div class="form-group">
                                                <label>Mật khẩu hiện tại</label>
                                                <input  class="form-control" type="password" name="pw"   >
                                                @error('pw')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Mật khẩu mới</label>
                                                <input  class="form-control" type="password" name="password"   >
                                                @error('password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Nhập lại mật khẩu mới</label>
                                                <input  class="form-control" type="password" name="password_confirmation"   >
                                                @error('password_confirmation')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-default" type="submit">Lưu</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .profile-social a {
                        font-size: 16px;
                        margin: 0 10px;
                        color: #999;
                    }

                    .profile-social a:hover {
                        color: #485b6f;
                    }

                    .profile-stat-count {
                        font-size: 22px
                    }
                </style>
                
            </div>
            <!-- END PAGE CONTENT-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Hiện thông báo thành công
        if ($('#success-message').length) {
            $('#success-message').fadeIn().delay(5000).fadeOut();
        }
        
        // Hiện thông báo lỗi
        if ($('#error-message').length) {
            $('#error-message').fadeIn().delay(5000).fadeOut();
        }
    });
    
    
    </script>         
        
@endsection