@extends('layouts.guest-template')
@section('content')

<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Sign in to your Account</h3>
                    <p>Fill in the data below.</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="col-md-12">
                            <input class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email" required id="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" id="password" type="password" class="@error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="remember-forgot">
                            @if (Route::has('password.request'))
                                <a class="" href="{{ route('password.request') }}">
                                     <!-- {{ __('Forgot Your Password?') }}  -->
                                    <p class="text-center text-primary my-2">Forgot Your Password?</p>
                                </a>
                            @endif
                        </div>

                        @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                      <div class="potentialidplist row p-0">
                          <div class="potentialidp col-sm-12 col-md">
                            <div class="mx-auto">
                              <button id="submit" type="submit" class="btn btn-info w-100 my-2 text-center">
                                <i class="fas fa-arrow-right"></i>Login</button>
                            </div>
                          </div>
                      </div>
                    </form>
                    <hr class="white">

                    <h6 class="text-center text-white m-t-1">Log in using your account on:</h6>
                    <div class="potentialidplist row p-0">
                        <div class="potentialidp col-sm-12 col-md">
                            <a href="{{ url('login/google') }}" title="Google Mail" class="btn btn-danger m-t-1 w-100 d-flex align-items-center">
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
    </div>
  </section>
  
@endsection
