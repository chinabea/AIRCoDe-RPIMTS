@extends('layouts.template')

@section('content')

  <div class="content-wrapper">
    <section class="content-header">
    </section>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-center align-items-center">
              <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                <h1 class="m-0 ml-3 font-weight-bold">PROPOSALS</h1>
            </div>

            <div class="card-body">
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
                          @foreach($projects as $record)
                          @if($record->user_id === auth()->user()->id)
                          <tr>
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
                                  <i class="fas fa-info-circle"></i>
                                  </a>
                                  <a href="{{ route('projects.edit', $record->id) }}" type="button" class="btn btn-warning">
                                  <i class="fas fa-edit"></i>
                                  </a>

                                  <button class="btn btn-danger" onclick="confirmDelete('{{ route('projects.destroy', $record->id) }}')">
                                  <i class="fas fa-trash"></i>
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
                              </td>
                          </tr>
                          @endif
                          @endforeach
                  </tbody>
              </table>

            @if(session('success'))
                <script>
                    toastr.success('{{ session('success') }}');
                </script>
            @elseif(session('delete'))
            @elseif(session('error'))
            <div id="popupModal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-gradient-warning">
                        <div class="modal-header"></div>
                        <div class="modal-body">
                            <div class="alert alert-warning text-center">
                            <i class="fa-xl fa-solid fa-triangle-exclamation"></i>
                                {{ session('error') }}
                            </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
</div>
@endsection
