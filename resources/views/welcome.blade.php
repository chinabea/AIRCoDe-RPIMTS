<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

    {{-- <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/font.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('css/js.js') }}"></script>

    <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}"> --}}
    <title>AIRCODE</title>
    <style>
    .bg-items{
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),  url('../img/circle.jpg');
    height: 650px;
     width:100%;
     background-size: 100% 100%;
     background-repeat: no-repeat;
     overflow-x: hidden;
    }
    #mid-items{
        height: 600px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .circle-img{
        border: 2px solid blue;

    }
    .title {
        text-transform: uppercase;
        font-family: 'Poppins', sans-serif;
        font-weight: 600; /* You can adjust the font weight as needed */
        font-size: 36px; /* Adjust font size as needed */
        color: #ffffff; /* Set your desired text color */
        /* Add other styling properties as needed */
    }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container">
            <div class="navbar-brand" href="#"><img src="{{ asset('img/321.png') }}" height="100px"></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Track Transparency
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Option 1</a></li>
                            <li><a class="dropdown-item" href="#">Option 2</a></li>
                            <li><a class="dropdown-item" href="#">Option 3</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" >Log in</a>
                            </li>

                            @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}" >Register</a>
                            @endif
                        @endauth
                @endif

                </ul>
            </div>
        </div>
    </nav>
    <div class="bg-items">
    <div class="container">
        <div class="row" id="mid-items">
            <div class="col-6">
                <div class="title">
                    Welcome to Research Project Information Managment
                </div>
                <button class="btn btn-primary w-50 ">Get Started</button>
                </div>
                <div class="col-6">
                    <!-- <div class="d-flex justify-content-center">
                <img class="rounded-circle shadow-1-strong" id="circle-img" alt="avatar1" height="400px" width="400px" src="{{ asset('img/circle.jpg') }}" />
                </div> -->
                </div>

        </div>
    </div>
    </div>
</body>
</html>
