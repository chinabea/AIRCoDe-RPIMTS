@extends('layouts.template')

@section('title', 'Call for Proposals')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!-- navbar  -->
@include('layouts.topnav')
<!-- / navbar  -->

  <!-- Main Sidebar Container -->
    @include('layouts.researchersidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

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
                <h3 class="card-title">Proposals List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{ route('transparency.proposals.create') }}" class="btn btn-primary">Add Proposals</a>

                <hr />
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Proposal Title</th>
                      <th>Proposal Description</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Status</th>
                      <th>Remarks</th>
                      <th>Action(s)</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($records->count() > 0)
                            @foreach($records as $proposal)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $proposal->proposaltitle }}</td>
                                <td class="align-middle">{{ $proposal->proposaldescription }}</td>
                                <td class="align-middle">{{ $proposal->startdate }}</td>
                                <td class="align-middle">{{ $proposal->enddate }}</td>
                                <td class="align-middle">{{ $proposal->status }}</td>
                                <td class="align-middle">{{ $proposal->remarks }}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('transparency.proposals.show', $proposal->id) }}" type="button" class="btn btn-secondary">Details</a>
                                        <a href="{{ route('transparency.proposals.edit', $proposal->id) }}"  type="button" class="btn btn-warning">Edit</a>
                                        {{-- <form action="{{ route('transparency.proposals.destroy', $proposal->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Delete</button>
                                        </form> --}}


                                        {{-- <form action="{{ route('transparency.proposals.destroy', $proposal->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <a type="button" class="btn btn-danger" onclick="return confirm('Delete?')">Delete</a>
                                        </form> --}}


                                        <button class="btn btn-danger m-0" onclick="confirmDelete('{{ route('transparency.proposals.destroy', $proposal->id) }}')">Delete</button>

                                        <script>
                                        function confirmDelete(url) {
                                            if (confirm('Delete?')) {
                                            // Create a hidden form and submit it programmatically
                                            var form = document.createElement('form');
                                            form.action = url;
                                            form.method = 'POST';
                                            form.innerHTML = '@csrf @method("delete")';
                                            document.body.appendChild(form);
                                            form.submit();
                                            }
                                        }
                                        </script>



                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="5">Record not found!</td>
                                </tr>
                            @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Proposal Title</th>
                            <th>Proposal Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Action(s)</th>
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
