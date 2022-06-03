<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="#">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            color: #fff;
            /background: #d47677;/ background-image: url(images/poto.png);
            background-size: 100% 100%;
            background-repeat: no-repeat;
            width: 100%;
            height: auto;
            background-size: 100% 100%;
        }

        .form-control {
            min-height: 41px;
            background: #fff;
            box-shadow: none !important;
            border-color: #e3e3e3;
        }

        .form-control:focus {
            border-color: #70c5c0;
        }

        .form-control,
        .btn {
            border-radius: 2px;
        }

        .login-form {
            width: 350px;
            margin: 0 auto;
            padding: 70px 0 30px;
        }

        .login-form form {
            color: #7a7a7a;
            border-radius: 2px;
            margin-bottom: 15px;
            font-size: 13px;
            /background: #ececec;/ background: rgba(0, 0, 0, 0.0) !important;
            border-radius: 10px;
            /box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);/ padding: 30px;
            position: relative;
        }

        .login-form h2 {
            font-size: 22px;
            margin: 35px 0 25px;
        }

        .login-form input[type="checkbox"] {
            position: relative;
            top: 1px;
        }

        .login-form .btn,
        .login-form .btn:active {
            font-size: 16px;
            font-weight: bold;
            background: orange !important;
            border: none;
            margin-bottom: 20px;
        }

        .login-form .btn:hover,
        .login-form .btn:focus {
            background: #50b8b3 !important;
        }

        .login-form a {
            color: #fff;
            text-decoration: underline;
        }

        .login-form a:hover {
            text-decoration: none;
        }

        .login-form form a {
            color: #7a7a7a;
            text-decoration: none;
        }

        .login-form form a:hover {
            text-decoration: underline;
        }

        .login-form .bottom-action {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="login-form">
        <br>
        <div class="login-logo">
            <h1 style="font-family: forte !important;color:black;text-align: center;"><b><img src="https://i.ibb.co/jTCvPSN/B2-Borangelogo.png" alt="Logo-B2-B-copia" border="0" routerlink="main" class="responsive" tabindex="0" ng-reflect-router-link="main" style="width:100%;height: 20%" /></b></h1>
        </div>

        {!! Form::open(['url'=>route('login'),'method'=>'POST', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off']) !!}

        <div class="input-group mb-3 has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-envelope"></span>
            </div>
            {!! Form::email('email', null, ['class'=>'form-control','required', 'placeholder'=>'@mail.com', 'style'=>'border-radius:0px;background-color: rgba(0,0,0,0.0);']) !!}
        </div>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}


        <div class="input-group mb-3 has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-lock fa_custom" style="width: 43px"></span>
            </div>
            {!! Form::password('password', ['class'=>'form-control','required', 'placeholder'=>'Password','style'=>'border-radius:0px;background-color: rgba(0,0,0,0.0);']) !!}
        </div>
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}

        <div class="checkbox icheck">
            <label>
                {!! Form::checkbox('remember')!!} Remember Me
            </label>
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            <label style="margin-right: ">
                <a href="#" value="" title="">
                    <span style="color:orange"><b>Forgot Password?</b></span>
                </a>
            </label>
        </div>
        <button type="submit" class="btn btn-block" style="border-radius: 10px;color: white;">
            <i class="fa fa-btn fa-sign-in"></i> Login
        </button>
        {!! Form::close() !!}
        <a href="{{ url('/register') }}" value="" title="" type="button" class="btn btn-block" style="border-radius: 10px;color: white;background: red !important;">
            <span class="fa fa-btn fa-sign-in"><b>Register</b></span>
        </a>
        <!-- <button href="" type="button" class="btn btn-block" style="border-radius: 10px;color: white;background: red !important;">
            <i class="fa fa-btn fa-sign-in"></i> Register
        </button> -->
        <p class="text-center small" style="color:orange">

        </p>
    </div>



</body>

</html>