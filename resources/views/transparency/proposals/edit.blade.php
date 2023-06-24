@extends('layouts.template')

@section('title', 'About Us')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!-- navbar  -->
@include('layouts.topnav')
<!-- / navbar  -->

<!-- Main Sidebar Container -->
@include('layouts.sidebar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->

<!-- Content Header (Page header) -->
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
    </div><!-- /.container-fluid -->
    </section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Proposals</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

            <form action="{{ route('transparency.proposals.edit', $proposals->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="inputText">Call for Proposals</label>
                    <input type="text" class="form-control" id="proposaltitle" name="proposaltitle" placeholder="Enter Call for Proposals" value={{$proposals->proposaltitle}}>
                    <br>
                    <label for="inputText">Description</label>
                    <input type="text" class="form-control"  id="proposaldescription" name="proposaldescription"  placeholder="Description" value={{$proposals->proposaldescription}}>
                    <br>
                    <label for="date">Start Date</label>
                    <input type="date" class="form-control" id="startdate" name="startdate" value={{$proposals->startdate}}>
                    <br>
                    <label for="date">End Date</label>
                    <input type="date" class="form-control" id="enddate" name="enddate" value={{$proposals->enddate}}>
                    <br>
                    <label for="inputText">Status</label>
                    <input type="text" class="form-control"  id="status" name="status"  placeholder="Status" value={{$proposals->status}}>
                    <br>
                    <label for="inputText">Remarks</label>
                    <input type="text" class="form-control"  id="remarks" name="remarks"  placeholder="Remarks" value={{$proposals->remarks}}>
                    <br>
                <button type="submit" class="btn btn-warning">Update</button>
                <br>
            </form>

            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>


</div>
<!-- /.content-wrapper -->
@include('layouts.footer')

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
</html>
































