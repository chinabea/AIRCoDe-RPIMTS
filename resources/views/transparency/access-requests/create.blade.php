@extends('layouts.template')
@section('title', 'Make Request')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('layouts.topnav')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              {{-- <h1>Data Tables</h1> --}}
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
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Access Requests</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body"> 
                <form action="{{ route('transparency.accessrequests.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <br>
                    <label for="inputText">Role</label>
                    <input type="text" class="form-control"  id="role" name="role"  placeholder="Role">
                    <br>
                    <label for="inputText">Date and Time of access</label>
                    <input type="date" class="form-control"  id="dateandtimeofaccess" name="dateandtimeofaccess"  placeholder="Date and Time of access">
                    <br>
                    <label for="">Purpose of Access</label>
                    <input type="TEXT" class="form-control" id="purposeofaccess" name="purposeofaccess">
                    <br>
                    <label for="date">Date Approved</label>
                    <input type="date" class="form-control" id="dateapproved" name="dateapproved">
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
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






























