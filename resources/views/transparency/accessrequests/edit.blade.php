@extends('layouts.template')
@section('title', 'Edit Request')
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
                <h3 class="card-title">accessrequests</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            
            <form action="{{ route('transparency.accessrequests.edit', $accessrequests->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="inputText">Role</label>
                    <input type="text" class="form-control" id="role" name="role" value={{$accessrequests->role}}>
                    <br>
                    <label for="inputText">Date and Time of Access</label>
                    <input type="date" class="form-control"  id="dateandtimeofaccess" name="dateandtimeofaccess" value={{$accessrequests->dateandtimeofaccess}}>
                    <br>
                    <label for="date">Purpose of Access</label>
                    <input type="date" class="form-control" id="purposeofaccess" name="purposeofaccess" value={{$accessrequests->purposeofaccess}}>
                    <br>
                    <label for="date">Date Approved</label>
                    <input type="date" class="form-control" id="dateapproved" name="dateapproved" value={{$accessrequests->dateapproved}}>
                    <br>
                <button type="submit" class="btn btn-warning">Update</button>
                <br>
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
































