<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('dist/img/systemAIRCoDeLogo.png') }}">
    <title>RPIMTS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <style>
    /* Your custom styles here */
    body {
       /* background: url('dist/img/bgg.jpg') center/cover no-repeat; */
               /* background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('dist/img/bg.jpg'); */
                /* backdrop-filter:blur(5px); */
        /* height: 50%; */
        /* background-position: center; */
        /* background-repeat: no-repeat; */
        /* background-size: cover; */
        /* position: relative; */
        background-color: #022A44 !important;
    }
            header{
                position: fixed;
                top:0;
                left:0;
                width: 100%;
                padding: 20px 100px;
                display:flex;
                justify-content: space-between;
                align-items: center;
                z-index:99;
            }
            .navigation a{
                position: relative;
                font-size:1.1em;
                color: #ffffff;
                text-decoration: none;
                font-weight: 500;
                margin-left: 40px;
            }
            .navigation a::after{
                content: '';
                position: absolute;
                left: 0;
                bottom: -6px;
                width: 100%;
                height: 3px;
                background: #fff;
                border-radius: 5px;
                transform: scaleX(0);
                transition: transform .5s;
            }
            .navigation a:hover::after{
                transform: scaleX(1);
            }

            .navigation .btnLogin-popup{
                width:130px;
                height:50px;
                background: transparent;
                border: 2px solid #ffffff;
                outline: none;
                border-radius:6px;
                cursor: pointer;
                font-size: 1.1em;
                color: #ffffff;
                font-weight: 500;
                margin-left: 40px;
                transition: .5s;
            }
            .navigation .btnLogin-popup:hover{
                background: #fff;
            }
            .wrapper{
                position: relative;
                width: 400px;
                height: 450px;
                /* background: #ffffff; */
                border: 2px solid ;
                border-radius: 20px;
                backdrop-filter:blur(5px);
                box-shadow: 0 0 30px rgba(0,0,0, .5);
                display: flex;
                justify-content: center;
                align-items:center;
            }
            .wrapper .form-box{
                width: 100%;
                padding: 30px;
            }
            .form-box h2{
                font-size: 2em;
                color: #162938;
                text-align: center;
            }
            .input-box{
                position: relative;
                width: 100%;
                height: 50px;
                border-bottom: 2px solid #162938;
                margin: 30px 0;
            }
            .input-box label{
                position: absolute;
                top: 50%;
                left:5px;
                transform: translateY(-50%);
                font-size: 1em;
                color: #162938;
                font-weight: 500;
                pointer-events: none;
                transition: .5s;
            }
            .input-box input:focus~label,
            .input-box input:valid~label{
                top: -5px;
            }
            .input-box input{
                width: 100%;
                height: 100%;
                background: transparent;
                border: none;
                outline: none;
                font-size: 1em;
                color: #162938;
                font-weight: 600;
                padding: 0 35px 0 5px;

            }
            .input-box .icon{
                position: absolute;
                right: 8px;
                font-size: 1.2em;
                color: #162938;
                line-height: 57px;
            }
            .remember-forgot{
                font-size: .9em;
                color: #162938;
                font-weight: 500;
                margin: 5px 0 15 px;
                display: flex;
                justify-content: space-between;
            }
            .remember-forgot label input{
                accent-color: #162938;
                margin-right: 1px;
            }
            .remember-forgot a{
                color: #162938;
                text-decoration: none;
            }
            .remember-forgot a:hover{
                text-decoration: underline;
            }
            .btn {
            width: 100%;
            height: 60px; /* Increased button height for aesthetic appeal */
            background: #162938 ;
            border: none;
            outline: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.2em;
            color: #fff !important;
            font-weight: 600;
            transition: background-color 0.3s;
            }

            .btn:hover {
            background-color: #162938;
            }

            /* Center content */
            .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            }
    /* ... */
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top justify-content-center">
    <!-- Navbar content... -->
    <div class="container">
        <div class="navigation">
            <a href="#"></a>
            <a href="#"></a>
            <a href="#"></a>
            <a href="#"></a>
            <a href="#"></a>
            <a href="#"></a>
            <a href="#"></a>
            <a href="#"></a>
            <a href="{{ route('welcome') }}">Home</a>
            <!-- <a href="#">About</a> -->
            <!-- <a href="#">Services</a> -->
            <a href="{{ route('contact') }}">Contact</a>
                @if (Route::has('login'))
                    @auth
                        <!-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Home</a></li> -->
                    @else
            <a href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif
        </div>
    </div>
</nav>
<section class="background-radial-gradient overflow-hidden">
    <style>
        /* Your CSS styles for the background gradient here */
        /* ... (Your existing background gradient styles) ... */
    /* Your CSS styles for the background gradient here */


    
    <style>
        /* Your custom styles here */
        .background-container {
            position: relative;
            background-color: hsl(218, 41%, 15%);
        }

        #radius-shape-1, #radius-shape-2 {
            position: absolute;
            overflow: hidden;
            background: radial-gradient(#44006b, #ad1fff);
        }

        #radius-shape-1 {
            height: 220px;
            width: 220px;
            top: -60px;
            left: -130px;
        }

        #radius-shape-2 {
            bottom: -30px;
            right: -110px;
            width: 300px;
            height: 300px;
            border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
           
        }
    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
    </style>

    <!-- Add the radial gradient shapes here -->
    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
</section>

<div class="container">
    <header>
    <!-- <h2 class="logo">Logo</h2> -->
    <!-- <a href="{{ route('reviewer.home') }}">
        <img src="{{ asset('dist/img/logo.png') }}" alt="AIRCoDe Logo">
    </a> -->
    </header>
    <div class="center-content">
      <div class="wrapper bg-glass"  style="width: 500px; height: 550px;">
        <div class="form-box login">
          <!-- Form content remains the same -->
            <h2><b>Sign in to your Account</b></h2>
            <!-- <form action="#"> -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email" required id="email">
                    <label for="email">Email</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <label>Password</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="remember-forgot">

                <!-- <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label> -->
                    <label><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember me</label>
                    <br><br>
                    <!-- <a href="#">Forgot Password?</a> -->
                    @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <br><br>
                </div>
                <button type="submit" class="btn">
                    {{ __('Login') }}
                </button>
            </form>
            <hr>
            <h6 class="text-center m-t-1">Log in using your account on:</h6>
            <div class="potentialidplist row p-0">
                <div class="potentialidp col-sm-12 col-md">
                    <a href="{{ url('login/google') }}" title="Google Mail" class="btn btn-secondary m-t-1 w-100 d-flex align-items-center">
                        <div class="mx-auto">
                            <img src="https://accounts.google.com/favicon.ico" alt="" width="25" class="mr-2">
                            <span>Google Mail</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>