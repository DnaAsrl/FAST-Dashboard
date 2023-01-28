<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FAST Scraper Dashboard</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
</head>
<body>

    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{ asset('frontend/images/BPAM.png') }}" alt=""></figure>
                        <a href="{{ route('register-user') }}" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" action="{{ route('login.custom') }}" class="register-form" id="login-form">
                        @csrf
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                {{-- <input type="email" name="email" id="email" placeholder="Email" required="" /> --}}
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                    autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                {{-- <input type="password" name="password" id="password" placeholder="Password" required=""/> --}}
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        @if($errors->any())
                        <p style="color: red;">{{$errors->first()}}</p>
                        @endif                
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ asset('frontend') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>