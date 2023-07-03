

@extends('layouts.template')
@section('title', 'Researcher')

<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('layouts.topnav')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li> --}}
            </ol>
          </div>
        </div>
      </div>
    </section> 
    
<section class="content">

<!-- Default box -->
<div class="card">
  <!-- <div class="card-header"> -->
    <!-- <h3 class="card-title">Title</h3> -->
    <!-- <h1>Research Project Form</h1>
        <p>Please fill in the following information:</p> -->
  <!-- </div> -->
  <div class="card-body">
    <h1>Research Project Form</h1>
        <p>Please fill in the following information:</p>
  <form action="{{ route('proponents.store') }}" method="POST">
        @csrf
            <!-- Participant Information -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter title">
                @error('title')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content:</label>
                <textarea type="number" class="form-control" name="content" id="content" placeholder="Enter participant's age">{{ old('content') }}</textarea>
                <!-- <textarea name="content" id="content">{{ old('content') }}</textarea> -->
                @error('content')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Research Questions -->
            <div class="mb-3">
                <label for="researchQuestion" class="form-label">Research Question</label>
                <textarea class="form-control" id="researchQuestion" rows="3" placeholder="Enter your research question"></textarea>
            </div>

            <!-- Research Methodology -->
            <!-- <div class="mb-3">
                <label for="researchMethodology" class="form-label">Research Methodology</label>
                <select class="form-select" id="researchMethodology">
                    <option selected>Select research methodology</option>
                    <option value="qualitative">Qualitative</option>
                    <option value="quantitative">Quantitative</option>
                    <option value="mixed-methods">Mixed Methods</option>
                </select>
            </div> -->

            <!-- Research Consent -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="researchConsent">
                <label class="form-check-label" for="researchConsent">
                    I agree to participate in this research project.
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
  </div>
  <div class="card-footer">
  </div>
</div>

</section>
</div>
  @include('layouts.footer')
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
</body>
</html>
