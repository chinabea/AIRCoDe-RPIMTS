<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>RPIMTS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
        <link rel="icon" type="image/png" href="{{ asset('dist/img/systemAIRCoDeLogo.png') }}">
    {{-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/public.css">
</head>
<body>
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="{{ asset('dist/img/systemAIRCoDeLogo.png') }}" alt="AIRCoDe Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span style="color: white">RPIMTS</span>
        </a>
        <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
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
        <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
  </header>
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up" style="color: white">Research Project Information Management and Tracking System</h1>
                <h2 data-aos="fade-up" data-aos-delay="400" style="color: white">"Streamlining Research Excellence: Your Data, Your Discoveries, Your Future"</h2>
            <div data-aos="fade-up" data-aos-delay="600">
                <div class="text-center text-lg-start">
                    <br>
                        <span>Type your Tracking ID Below</span><br>
                        <form action="{{ route('welcome') }}" method="get">
                            <div class="form-group">
                                <input type="text" id="proj_id" name="proj_id" class="form-control" required>
                                <br>
                            </div>
                            <button type="submit" class="btn btn-primary">Track Project</button>
                        </form>
                        @if(isset($project))
                        <div class="card-footer">
                            @if($project)
                            <br>
                            <h6 class="text-success">PROJECT FOUND</h6>
                            <p>TITLE: {{ $project->projname }}</p>
                            <p>STATUS: {{ $project->status }}</p>
                            @else
                            <br>
                            <p class="text-danger">No project found with the entered ID.</p>
                            @endif

                            @if (!is_null($approvalDate))
                            <p>>DATE: {{\Carbon\Carbon::parse($approvalDate)->format('F j, Y') }}</p>
                            @endif
                        </div>
                        @endif
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/hero-img.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>
  </section>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>

</body>
</html>
