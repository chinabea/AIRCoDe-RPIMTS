@extends('layouts.template')
@section('title', 'Dashboard')

@section('content')

  <div class="content-wrapper">
    <section class="content-header">
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Project List</h3>
              </div> 
              <div class="card-body">
                
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <div class="mb-3">
                    <a href="{{ route('projects.create') }}" class="btn btn-info">
                        <i class="fas fa-plus"></i> Add Project
                    </a>
                </div>

                <table id="example1" class="table table-bordered table-hover table-sm">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Research Group</th>
                      <th>Date Submitted</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($projects->count() > 0)
                            @foreach($projects as $record)
                            <tr>
                                <!-- <td class="align-middle">{{ $loop->iteration }}.</td> -->
                                <td class="align-middle">{{ $record->id }}</td>
                                <td class="align-middle">
                                  <a href="{{ route('submission-details.show', $record->id) }}">{{ $record->projname }}</a>
                                </td>
                                <td class="align-middle">{{ $record->researchgroup }}</td>
                                <td class="align-middle">{{ $record->created_at->format('F j, Y') }}</td>
                                <td class="align-middle">{{ $record->status }}</td>
                              <td class="align-middle">
                                    <div class="btn-group align-middle" role="group" aria-label="Basic example">
                                    <a href="{{ route('submission-details.show', $record->id) }}" type="button" class="btn btn-secondary">
                                      <i class="fas fa-info-circle"></i> Details
                                    </a>
                                    <a href="{{ route('projects.edit', $record->id) }}" type="button" class="btn btn-warning">
                                      <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <button class="btn btn-danger" onclick="confirmDelete('{{ route('projects.destroy', $record->id) }}')">
                                      <i class="fas fa-trash"></i> Delete
                                    </button>

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
                </table>
                </div>
                  <div class="card-footer clearfix">
                      <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                      </ul>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>
  </div>


  @endsection
