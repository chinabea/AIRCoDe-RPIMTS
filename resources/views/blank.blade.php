@extends('layouts.template')
@section('title', 'Blank')

<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('layouts.topnav')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Blank Page</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">404</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
    </section>
  </div>
  @include('layouts.footer')
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
