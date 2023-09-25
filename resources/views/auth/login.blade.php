


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="{{ asset('dist/img/systemAIRCoDeLogo.png') }}">
  <title>RPIMTS</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Your custom styles here */
    body {
       /* background: url('dist/img/bgg.jpg') center/cover no-repeat; */
               /* background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('dist/img/bg.jpg'); */
                /* backdrop-filter:blur(5px); */
        height: 50%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
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
                color: #4d4d4d;
            }
            .wrapper{
                position: relative;
                width: 400px;
                height: 450px;
                background: #d3b954;
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
            color: #fff;
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

<!-- Responsive navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container px-5">
        <!-- <a class="navbar-brand" href="#!">RPIMTS</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#!">Track</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Transparency</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                @if (Route::has('login'))
                    @auth
                        <!-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Home</a></li> -->
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Log in</a></li>
                        @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>



<div class="container">
    <header>
    <!-- <h2 class="logo">Logo</h2> -->
    <!-- <a href="{{ route('reviewer.home') }}">
        <img src="{{ asset('dist/img/logo.png') }}" alt="AIRCoDe Logo">
    </a> -->
    </header>
    <div class="center-content">
      <div class="wrapper">
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
                <!-- <button type="submit" class="btn">Login</button> -->
                <button type="submit" class="btn">
                    {{ __('Login') }}
                </button>
            </form>
        </div>
      </div>
    </div>
  </div>

  
  <!-- <script src="script.js"></script> -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
