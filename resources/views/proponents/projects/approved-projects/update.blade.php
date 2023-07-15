@extends('layouts.template')
@section('title', 'Update Project')
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
                <h3 class="card-title">Project</h3>
            </div>
            <div class="card-body">
            <!-- <form action="/editprojects/{{$projects->id}}" method="post">
                @method('PUT')
                    @csrf -->
                    <form action="{{ route('proponents.projects.approved-projects.update') }}" method="POST">
                                @method('PUT')
                                    @csrf
                        <label for="member_name">Name:</label>
                        <input type="text" id="member_name" name="member_name" value="{{ $project_teams->member_name }}" required><br>

                        <label for="role">Role:</label>
                        <textarea id="role" name="role" required>{{ $project_teams->role }}</textarea><br>

                        <input type="submit" value="Update">
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































