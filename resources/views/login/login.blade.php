<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rana Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" autocomplete="no" method="POST" action="{{ route('login') }}">
                    <span class="login100-form-title ">
                       <img src="{{ asset('vendor/img/RB.png') }}" width="300px" >

                    </span>


                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        
                        <input id="email" type="email" class="input100 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                          @error('email')
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong> 
                                 </span>
                          @enderror
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input id="password" type="password" class="input100 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                          @error('password')
                               <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                                 </span>
                            @enderror
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="#" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            or contact us:
                        </span>
                    </div>

                </method=>

                <div class="login100-more" style="background-image: url('vendor/img/bg.jpg');">
                </div>
            </div>
        </div>
    </div>





    <!--===============================================================================================-->
    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
   
    <script src="{{ asset('vendor/js/main.js') }}"></script>

</body>

</html>
