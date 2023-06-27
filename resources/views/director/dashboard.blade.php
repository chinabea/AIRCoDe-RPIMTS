
@extends('layouts.template')
@section('title', 'Director')

<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('layouts.topnav')
{{-- @include('director.sidebar') --}}
@include('layouts.funcsidebar')
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

    <!-- Main content -->
    <section class="content">
        <!-- _____________________________________  -->








        <!-- _____________________________________  -->
    </section>
  </div>
  @include('layouts.footer')
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

