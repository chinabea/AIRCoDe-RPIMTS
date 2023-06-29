@extends('layouts.template')
@section('title', 'Update Request')
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
                <h3 class="card-title">Requests</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

            <form action="/editaccessrequestss/{{$accessrequests->id}}" method="post">
                @method('PUT')
                    @csrf
                <br>
                <div class="form-group">
                <label for="title">role</label>
                <textarea class="form-control" rows="2" id="role" name="role" class="form-control" value={{$accessrequests->role}}></textarea>
                </div>
                <br>
                <br>
                <div class="form-group">
                <label for="content">dateandtimeofaccess</label>
                <textarea class="form-control" rows="2" id="dateandtimeofaccess" name="dateandtimeofaccess" class="form-control" value={{$accessrequests->dateandtimeofaccess}} ></textarea>
                </div>
                <br>
                <br>
                <div class="form-group">
                <label for="content">purposeofaccess</label>
                <textarea class="form-control" rows="2" id="purposeofaccess" name="purposeofaccess" class="form-control" value={{$accessrequests->purposeofaccess}} ></textarea>
                </div>
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
































