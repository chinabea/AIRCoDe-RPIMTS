@extends('layouts.template')

@section('content')


  <!-- Navbar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="example1" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th>Research Group</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                  </tr>
                  </thead>
@if(count($projects) > 0)
                  <tbody>
            @foreach($projects as $project)
                  <tr>
                    <td>{{ $project->projname }}</td>
                    <td>{{ $project->researchgroup }}</td>
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->end_date }}</td>
                  </tr>
            @endforeach
                  </tbody>    
    @else
        <p>No projects currently under evaluation.</p>
    @endif
                  <tfoot>
                  <tr>
                    <th>Title</th>
                    <th>RESEARCH GROUP</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                  </tr>
                  </tfoot>
                </table>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>


  @endsection

