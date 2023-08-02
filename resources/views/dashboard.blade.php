@extends('layouts.template')
@section('title')
    @if(auth()->user()->role === 1)
        DIRECTOR
    @elseif(auth()->user()->role === 2)
        STAFF
    @elseif(auth()->user()->role === 3)
        RESEARCHER
    @elseif(auth()->user()->role === 4)
        REVIEWER
    @else

    @endif
@endsection


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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li> 
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
    @php
  $role = auth()->user()->role;
@endphp

    @section('content')
        @if($role === 1)
            <!-- FOR DIRECTOR -->
            <p>This is for the director</p>
        @elseif($role === 2)
            <!-- FOR STAFF -->
            <p>This is for the staff</p>
        @elseif($role === 3)
            <!-- FOR RESEARCHER -->
            
        @elseif($role === 4)
            <!-- FOR REVIEWER -->
            <p>This is for the reviewer</p>
        @else
            @include('sidebar-guest')
        @endif
    @endsection
    </section>
  </div>
    @include('layouts.footer')
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

