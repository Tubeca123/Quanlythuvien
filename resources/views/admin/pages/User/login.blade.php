<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admincast bootstrap 4 &amp; angular 5 admin template, Шаблон админки | Login</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset("assets/vendors/bootstrap/dist/css/bootstrap.min.css")}}" rel="stylesheet" />
    <link href="{{asset("assets/vendors/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" />
    <link href="{{asset("assets/vendors/themify-icons/css/themify-icons.css")}}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{asset("assets/css/main.css")}}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="{{asset("assets/css/pages/auth-light.css")}}" rel="stylesheet" />
</head>
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
<body class="bg-silver-300">
    <div class="content">
            
        <div class="brand">
            <a class="link" href="index.html">Quản lý thư viện</a>
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
        <form id="login-form" action="{{route("handlogin")}}" method="post">
        @csrf 
            <h2 class="login-title">Log in</h2>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input class="form-control" type="text" name="SV_id" placeholder="Mã sinh viên" autocomplete="off">
                    @error('SV_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group d-flex justify-content-between">
                <!-- <label class="ui-checkbox ui-checkbox-info">
                    <input type="checkbox">
                    <span class="input-span"></span>Remember me</label>-->
                <a href="forgot_password.html">Quên mật khẩu?</a> 
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Đăng nhập</button>
            </div>
            <div class="social-auth-hr">
                <!-- <span>Or login with</span> -->
            </div>
            <!-- <div class="text-center social-auth m-b-20">
                <a class="btn btn-social-icon btn-twitter m-r-5" href="javascript:;"><i class="fa fa-twitter"></i></a>
                <a class="btn btn-social-icon btn-facebook m-r-5" href="javascript:;"><i class="fa fa-facebook"></i></a>
                <a class="btn btn-social-icon btn-google m-r-5" href="javascript:;"><i class="fa fa-google-plus"></i></a>
                <a class="btn btn-social-icon btn-linkedin m-r-5" href="javascript:;"><i class="fa fa-linkedin"></i></a>
                <a class="btn btn-social-icon btn-vk" href="javascript:;"><i class="fa fa-vk"></i></a>
            </div> -->
            <div class="text-center">Bạn chưa có tài khoản?
                <a class="color-blue" href="{{route("register")}}">Tạo tài khoản</a>
            </div>
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="{{asset("assets/vendors/jquery/dist/jquery.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/vendors/popper.js/dist/umd/popper.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/vendors/bootstrap/dist/js/bootstrap.min.js")}}" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="{{asset("assets/vendors/jquery-validation/dist/jquery.validate.min.js")}}" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src={{asset("assets/js/app.js")}}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
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
</body>

</html>