@extends('layouts.template')
@section('title', 'Call for Proposals')

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
                <h3 class="card-title">Proposals List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{ route('proponents.admin-proponents.create') }}" class="btn btn-primary">Add Proposals</a>

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
                      <th>Title</th>
                      <th>Status</th>
                      <th>Content</th>
                      <th>Action(s)</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($records->count() > 0)
                            @foreach($records as $proposal)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $proposal->title }}</td>
                                <td class="align-middle">



                                <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="btn btn-secondary btn-sm dropdown-toggle">
                                <option value="New">New</option>
                                <option value="Draft">Draft</option>
                                <option value="Under Evaluation">Under Evaluation</option>
                                <option value="For Revision">For Revision</option>
                                <option value="Approved">Approved</option>
                                <option value="Deferred">Deferred</option>
                                <option value="Disapproved">Disapproved</option>
                            </select>
                        </div>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#status').change(function() {
                                    var status = $(this).val();
                                    var documentId = {{ $proposal->id }};

                                    $.ajax({
                                        url: '/documents/' + documentId,
                                        type: 'PUT',
                                        data: {
                                            status: status,
                                        },
                                        success: function(response) {
                                            console.log('Status updated successfully.');
                                        },
                                        error: function(xhr) {
                                            console.log('Error updating status.');
                                        }
                                    });
                                });
                            });
                        </script>
</td>

                                
                       
                                <td class="align-middle">{{ $proposal->content }}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('proponents.admin-proponents.show', $proposal->id) }}" type="button" class="btn btn-secondary">Details</a>
                                        <a href="{{ route('proponents.admin-proponents.edit', $proposal->id) }}"  type="button" class="btn btn-warning">Edit</a>
                                        {{-- <form action="{{ route('proponents.admin-proponents.destroy', $proposal->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Delete</button>
                                        </form> --}}


                                        {{-- <form action="{{ route('proponents.admin-proponents.destroy', $proposal->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <a type="button" class="btn btn-danger" onclick="return confirm('Delete?')">Delete</a>
                                        </form> --}}


                                        <button class="btn btn-danger m-0" onclick="confirmDelete('{{ route('proponents.admin-proponents.destroy', $proposal->id) }}')">Delete</button>

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
                          <th>Title</th>
                          <th>Status</th>
                          <th>Content</th>
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
