@extends('layouts.template')
@section('title', 'Create Project')
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

    <section class="content">
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
                  <form method="post" action="{{ route('proponents.projects.approved-projects.store') }}" enctype="multipart/form-data">
                  {{ method_field('POST') }}
                  @csrf    
                        <div class="form-group col-md-6">
                            <label for="member_name">Name:</label>
                            <input type="text" id="member_name" name="member_name" required><br>
                        </div>

                        <label for="role">Role</label>
                        <select class="form-control" name="role" id="role">
                            <option disable>Select Role</option>
                            <option>Project Leader</option>
                            <option>Database Designer</option>
                            <option>Network Designer</option>
                            <option>UI Designer</option>
                            <option>Quality Assurance</option>
                            <option>Document Writer</option>
                        </select>
                      <a href="#" class="btn btn-secondary">Cancel</a>
                      <input type="submit" value="Create" class="btn btn-success float-right">
                  </div>
            </form>
            </div>
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
