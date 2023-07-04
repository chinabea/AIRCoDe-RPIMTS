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
            <!-- <h1>DataTables</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li> -->
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
              <hr>
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
                      <th>Research Group</th>
                      <th>Date Submitted</th>
                      <th>Status</th>
                      <th>Reviewers</th>
                      <th>RSC</th>
                      <th>Action(s)</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($records->count() > 0)
                            @foreach($records as $record)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td>
                                  <a href="{{ route('proponents.projects.show', $record->id) }}">{{ $record->projname }}</a>
                                </td>
                                <td class="align-middle">{{ $record->researchgroup }}</td>
                                <td class="align-middle">{{ $record->created_at->format('F j, Y') }}</td>
                                <td class="align-middle">{{ $record->status }}</td>
                              <td>



                                <form method="POST" action="{{ route('proponents.projects.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                      <label for="reviewers">Project Reviewers</label>
                                      <select name="reviewers[]" id="reviewers" class="form-control custom-select" multiple size="3">
                                        @foreach ($reviewers as $reviewer)
                                          <option value="{{ $reviewer->id }}">{{ $reviewer->name }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="select-custom-content">
                                      <button class="btn-save btn btn-primary btn-sm">Save</button>
                                    </div>
                                  </form>

























                              </td>

                              <td class="align-middle">RSC</td>
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
                    <!-- <tfoot>
                        <tr>
                        <th>#</th>
                        <th>Project Title</th>
                        <th>Project Details</th>
                        <th>Reviewers</th>
                        <th>Summarized ? (Status)</th>
                        <th>Action(s)</th>
                        </tr>
                    </tfoot> -->
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
