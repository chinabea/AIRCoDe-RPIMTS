@extends('layouts.template')
@section('title', '')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('layouts.topnav')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Create New Project</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li> --}}
              </ol>
            </div>
          </div>
        </div>
      </section>

    <!-- Main content -->
    <!-- <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">General</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <form action="{{ route('proponents.admin-proponents.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" id="title" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="content">Content</label>
                      <input type="text" id="content" name="content" class="form-control">
                    </div>
                      <a href="#" class="btn btn-secondary">Cancel</a>
                      <input type="submit" value="Create new Project" class="btn btn-success float-right">
                  </div>
            </form>
            </div>
          </div>
        </div>
      </section>

  </div> -->
  <!-- resources/views/documents/create.blade.php -->
<form action="{{ route('proponents.admin-proponents.store') }}" method="POST">
    @csrf
    <!-- Add other input fields for document details -->

    <button type="submit">Submit</button>
</form>


    @include('layouts.footer')
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
</body>
</html>






























