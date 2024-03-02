@extends('layouts.guest-template')
@section('content')

  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">

            <div class="form-body">
                <div class="row">
                    <div class="form-holder">
                        <div class="form-content">
                            <div class="form-items">
                                <h3>Create an Account</h3>
                                <p>Fill in the data below.</p>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="college_department" type="text" class="form-control @error('college_department') is-invalid @enderror" placeholder="College/Department" name="college_department" value="{{ old('college_department') }}" required autocomplete="college_department">
                                        @error('college_department')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                                            <option value="">Role</option>
                                            <!-- <option value="1">Director</option> -->
                                            <option value="2">Staff</option>
                                            <option value="3">Researcher</option>
                                            <option value="4">Reviewer</option>
                                        </select>
                                        @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="research_group" type="text" class="form-control @error('research_group') is-invalid @enderror" placeholder="Research Group" name="research_group" value="{{ old('research_group') }}" required autocomplete="research_group">
                                        @error('research_group')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                    </div>

                                    <div class="form-button mt-3">
                                        <button id="submit" type="submit" class="btn btn-info "><i class="fas fa-user"></i>
                                            Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection