@extends('layouts.template')
@section('title', 'Projects')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('layouts.topnav')
@include('layouts.sidebar')
  <div class="content-wrapper">
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
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Project List</h3>
              </div>
              <div class="card-body">
                <a href="{{ route('proponents.projects.create') }}" class="btn btn-primary">Add Project</a>

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
                      <th>Project Title</th>
                      <th>Project Details</th>
                      <th>Reviewers</th>
                      <th>Summarized ? (Status)</th>
                      <th>Action(s)</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($records->count() > 0)
                            @foreach($records as $record)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td>
                                  <a href="{{ route('proponents.projects.show', $record->id) }}">{{ $record->title }}</a>
                                </td>
                                <td class="align-middle">{{ $record->description }}</td>
                                <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                  Reviewer 1
                                </button>
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        ...
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="btn-group">
                                  <button type="button" class="btn btn-secondary btn-sm  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Reviewer 2
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                  </div>
                                </div>
                                <div class="btn-group">
                                  <button type="button" class="btn btn-secondary btn-sm  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Reviewer 3
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                  </div>
                                </div>
                              </td>
                              <td class="align-middle">Summarized : Approved / Revised / Rejected</td>
                              <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('proponents.projects.show', $record->id) }}" type="button" class="btn btn-secondary">Details</a>
                                        <a href="{{ route('proponents.projects.edit', $record->id) }}"  type="button" class="btn btn-warning">Edit</a>
                                        {{-- <form action="{{ route('transparency.aboutus.destroy', $record->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Delete</button>
                                        </form> --}}


                                        {{-- <form action="{{ route('transparency.aboutus.destroy', $record->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <a type="button" class="btn btn-danger" onclick="return confirm('Delete?')">Delete</a>
                                        </form> --}}


                                        <button class="btn btn-danger m-0" onclick="confirmDelete('{{ route('proponents.projects.destroy', $record->id) }}')">Delete</button>

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
                        <th>Project Title</th>
                        <th>Project Details</th>
                        <th>Reviewers</th>
                        <th>Summarized ? (Status)</th>
                        <th>Action(s)</th>
                        </tr>
                    </tfoot>
                </table>

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