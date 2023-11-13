@extends('layouts.guest-template')
@section('content')

  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Research Project Information Management and Tracking System</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">"Streamlining Research Excellence: Your Data, Your Discoveries, Your Future"</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
                <br>
                <span style="color: white">Type your Tracking Code Below</span><br>
                  <form action="{{ route('welcome') }}" method="get">
                      <div class="form-group">
                          <input type="text" id="tracking_code" name="tracking_code" class="form-control" required>
                          <br>
                      </div>
                      <button type="submit" class="btn btn-info">Track Project</button>
                  </form>
                  @if(isset($project))
                  <div class="card-footer">
                      @if($project)
                      <br>
                      <h6 class="text-success font-weight-bold">PROJECT FOUND!</h6>
                      <p class="text-white font-weight-bold">TITLE: {{ $project->project_name }}</p>
                      <p class="text-white font-weight-bold">STATUS: {{ $project->status }}</p>
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
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section>
@endsection
