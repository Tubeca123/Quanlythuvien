<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admincast bootstrap 4 &amp; angular 5 admin template, Шаблон админки | Register</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset("assets/vendors/bootstrap/dist/css/bootstrap.min.css")}}" rel="stylesheet" />
    <link href="{{asset("assets/vendors/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" />
    <link href="{{asset("assets/vendors/themify-icons/css/themify-icons.css")}}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{asset("assets/css/main.css")}}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="{{asset("assets/css/pages/auth-light.css")}}" rel="stylesheet" />
</head>
<body class="bg-silver-300">
    <div class="content">
        <div class="brand">
            <a class="link" href="index.html">Quản Lý Thư Viện</a>
        </div>
        <form  action="{{route("handregister")}}" method="post">
            @csrf 

            <input type="hidden" name="role" id="" value=1 >
            <h2 class="login-title">Đăng ký</h2>

            <div class="form-group">
            <input class="form-control" type="text" name="sv_id" placeholder="Mã sinh viên" value="{{ old('sv_id') }}">
            @error('sv_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group">
            <input class="form-control" type="text" name="name" placeholder="Tên đăng nhập" value="{{ old('name') }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email" autocomplete="off" value="{{ old('email') }}">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            
            <div class="form-group">
                <input class="form-control" id="password" type="password" name="password" placeholder="Mật khẩu">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            
            <div class="form-group">
                <input class="form-control" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu">
            @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Đăng ký</button>
            </div>

            <div class="social-auth-hr">
                <span></span>
            </div>
            
            <div class="text-center">Bạn đã kích hoạt tài khoản?
                <a class="color-blue" href="{{route("login")}}">Đăng nhập tại đây</a>
            </div>
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="{{asset("assets/vendors/jquery/dist/jquery.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/vendors/popper.js/dist/umd/popper.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/vendors/bootstrap/dist/js/bootstrap.min.js")}}" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="{{asset("assets/vendors/jquery-validation/dist/jquery.validate.min.js")}}" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{asset("assets/js/app.js")}}" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#register-form').validate({
                errorClass: "help-block",
                rules: {
                    first_name: {
                        required: true,
                        minlength: 2
                    },
                    last_name: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        confirmed: true
                    },
                    password_confirmation: {
                        equalTo: password
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
</body>

</html>