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
          <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
                PROJECT TEAM
            </div>
            <div class="card-body pad table-responsive">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="member_name">Name</label>
                  <input type="text" class="form-control" id="member_name" name="member_name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="role">Role</label>
                  <select class="form-control" id="role" name="role">
                    <option disable>Select Role</option>
                    <option>Project Leader</option>
                    <option>Database Designer</option>
                    <option>Network Designer</option>
                    <option>UI Designer</option>
                    <option>Quality Assurance</option>
                    <option>Document Writer</option>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Add Member</button>
            </div>
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
