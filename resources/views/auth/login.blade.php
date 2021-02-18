<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('backend') }}/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{ asset('backend') }}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{ asset('backend') }}/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{ asset('backend') }}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('backend') }}/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('backend') }}/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="{{ asset('backend') }}/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="{{ asset('backend') }}/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="{{ asset('backend') }}/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="{{ asset('backend') }}/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="{{ asset('backend') }}/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{ asset('backend') }}/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('backend') }}/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img style="height: 150px" src="{{ asset('backend') }}/images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter Your Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
                                    </label>
                                   
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                            </form>
                            <div class="social-login-content">
                                <div class="social-button">
                                    <a href="{{ route('login.facebook') }}" class="au-btn au-btn--block au-btn--blue m-b-20" style="text-align: center;">sign in with facebook</a>
                                </div>
                                <div class="social-button">
                                    <a href="{{ route('login.google') }}" class="au-btn au-btn--block au-btn--blue2" style="text-align: center; background-color: #DB4437;">sign in with google</a>
                                </div>
                            </div>
                            <div class="register-link">
                                <label>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">Forgotten Password?</a>
                                    @endif
                                </label>
                                <p>
                                    Don't you have account?
                                    <a href="{{ route('register') }}">Sign Up Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('backend') }}/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('backend') }}/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('backend') }}/vendor/slick/slick.min.js">
    </script>
    <script src="{{ asset('backend') }}/vendor/wow/wow.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/animsition/animsition.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="{{ asset('backend') }}/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="{{ asset('backend') }}/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('backend') }}/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('backend') }}/js/main.js"></script>

</body>

</html>
<!-- end document-->