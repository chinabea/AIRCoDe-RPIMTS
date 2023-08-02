@extends('layouts.template')
@section('title', 'Update Proposals')
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
                <h3 class="card-title">Proposals</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

            <form action="/editproposals/{{$proposal->id}}" method="post">
                @method('PUT')
                    @csrf
                <br>
                <div class="form-group">
                <label for="title">Proposal Title</label>
                <textarea class="form-control" rows="2" id="proposaltitle" name="proposaltitle" class="form-control" value={{$proposal->proposaltitle}}></textarea>
                </div>
                <br>
                <br>
                <div class="form-group">
                <label for="content">Proposal  Description</label>
                <textarea class="form-control" rows="2" id="proposaldescription" name="proposaldescription" class="form-control" value={{$proposal->proposaldescription}} ></textarea>
                </div>
                <br>
                <br>
                <div class="form-group">
                <label for="content">Start Date</label>
                <textarea class="form-control" rows="2" id="startdate" name="startdate" class="form-control" value={{$proposal->startdate}} ></textarea>
                </div>
                <br>
                <br>
                <div class="form-group">
                <label for="content">End Date</label>
                <textarea class="form-control" rows="2" id="enddate" name="enddate" class="form-control" value={{$proposal->enddate}} ></textarea>
                </div>
                <br>
                <br>
                <div class="form-group">
                <label for="content">Status</label>
                <textarea class="form-control" rows="2" id="status" name="status" class="form-control" value={{$proposal->status}} ></textarea>
                </div>
                <br>
                <br>
                <div class="form-group">
                <label for="content">Remarks</label>
                <textarea class="form-control" rows="2" id="remarks" name="remarks" class="form-control" value={{$proposal->remarks}} ></textarea>
                </div>
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
































