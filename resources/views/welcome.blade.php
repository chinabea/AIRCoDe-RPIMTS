<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>RPIMTS</title>
    <link rel="icon" type="image/png" href="{{ asset('dist/img/systemAIRCoDeLogo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        header {
            background-size: cover;
            background-repeat: no-repeat;
            /* background: linear-gradient(213.87deg,#4f61ff -2.17%,#c74fff 103.27%); */
            background-color: #022A44 !important;

        }
        .nav {
            background-color: #022A44 !important;
        }
        @media (max-width: 768px) {
            header {
                background-size: contain; 
            }
        } 
        body {
            /* background: linear-gradient(45deg, #ff6b6b, #6078ea); */
            /* background-image: linear-gradient(335deg,#4f61ff,#9c4fff); botton*/ 
            height: 100%;
            /* background: linear-gradient(213.87deg,#4f61ff -2.17%,#c74fff 103.27%); */
            background-position: top!important;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Customize your styles here */
        .jumbotron {
            background-color: transparent;
        }

        .track-project-section {
            padding: 50px;
        }

        .login-section {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
        }
        .btn {
            background-image: linear-gradient(335deg,#4f61ff,#9c4fff); 
        }
    </style>
</head>
    <body>

        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container px-5">
                <!-- <a class="navbar-brand" href="#!">RPIMTS</a> -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        
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

        <!-- Header-->
        <header class="py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">Research Project Information Management and Tracking System</h1>
                            <p class="lead text-white-50 mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit!</p>
                            <!-- <div class="d-grid gap-3 d-sm-flex justify-content-sm-center"> -->
                                <div class="row"><div class="container mt-5">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="login-section text-white">
                                                <p><b>Type your Research ID Below</b></p>
                                                <form action="{{ route('welcome') }}" method="get">
                                                    <div class="form-group">
                                                        <input type="text" id="proj_id" name="proj_id" class="form-control" required>
                                                        <br>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary"> <b>Track Project</b> </button>
                                                </form>
                                                @if(isset($project))
                                                <div class="card-footer">
                                                    @if($project)
                                                    <br>
                                                    <h6 class="text-success">Project Found:</h6>
                                                    <p><strong>Research:</strong> {{ $project->projname }}</p>
                                                    <p><strong>Status:</strong> {{ $project->status }}</p>
                                                    @else
                                                    <br>
                                                    <p class="text-danger">No project found with the entered ID.</p>
                                                    @endif
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Contact section-->
        <section class="bg-light py-5">
            <div class="container px-5 my-5 px-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                    <h2 class="fw-bolder">Get in touch</h2>
                    <p class="lead mb-0">We'd love to hear from you</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
