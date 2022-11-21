<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('default/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('default/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('default/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('default/dist/css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('default/plugins/iCheck/square/blue.css')}}">
    <link rel="stylesheet" href="{{ asset('default/dist/css/spx.css')}}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <!--[if IE]>
    <style>
        .login-box-body{
            border: 1px solid #ddd;
        }
    </style>
    <![endif]-->
    <style>
        .login-page{
            background: #fff;
        }
        .logo-login{
            text-align: center;
        }
        .login-box-msg{
            text-align: center;
            margin-top:10px;
            font-weight: bold;
        }
        .login-box-body{
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
            box-shadow: 0 1px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;
        }
        .login-logo{
            /*margin-top: 50px;*/
            background: #f9b638;
            margin-bottom: 0;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            box-shadow: 0 1px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;
        }
        .login-box{
            padding-top:50px;
        }
        .btn-login{
            background: #f9b638;
            color: #fff;
        }
        .btn-login:hover{
            background: #f1ba54;
            color:#fff;
        }
    </style>
</head>
<body class="hold-transition login-page">
@if(Auth::user())
    <script>window.location.href='/';</script>
@endif
<div class="login-box">
    <div class="login-logo">
        <a href="/" style="text-transform: uppercase;font-size: 30px;color:#fff;"><b>Đăng Nhập</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <form action="{{ url('/login') }}" method="post">
            <div class="form-group has-feedback">
                <input style="padding-left: 10px;" type="text" name="email" class="form-control" placeholder="Username or Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input style="padding-left: 10px;" type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
            {{--<div class="col-xs-8">--}}
            {{--<div class="checkbox icheck">--}}
            {{--<label>--}}
            {{--<input type="checkbox" name="chk_remmember"> <span>Remember Me</span>--}}
            {{--</label>--}}
            {{--</div>--}}
            {{--</div>--}}
            <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-block btn-flat text-center btn-login">Sign In</button>
                </div>
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <!-- /.col -->
            </div>
        </form>
        <p class="text-danger login-box-msg">Vui lòng Đăng Nhập để tiếp tục!
        <?php //Hiển thị thông báo thành công?>
        @if ( Session::has('success') )
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif
        <?php //Hiển thị thông báo lỗi?>
        @if ( Session::has('error') )
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>{{ Session::get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('default/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('default/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ asset('default/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{ asset('default/dist/js/spx.js')}}?v=1"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
