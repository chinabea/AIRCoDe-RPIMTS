
@extends('layouts.template')

@section('content')

  <div class="content-wrapper">
    <section class="content-header">
    </section>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-center align-items-center">
              <i class="nav-icon fas fa-book fa-2x"></i>
                <h4 class="m-0 ml-3 font-weight-bold">DISAPPROVED</h4>
            </div>

            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover text-center table-sm">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Tracking Code</th>
                          <th>Call for Proposal</th>
                          <th>Title</th>
                          <th>Research Group</th>
                          <th>Date Submitted</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                        @if($projects->count() > 0)
                    @foreach($projects as $index => $project)
                          @if(auth()->user()->role == 1 || auth()->user()->role == 2 || $project->user_id === auth()->user()->id)
                          <tr>
                              <td class="align-middle">{{ $loop->iteration }}</td>
                              <td class="align-middle">{{ $project->tracking_code }}</td>
                              <td class="align-middle">
                                    @foreach ($call_for_proposals as $call_for_proposal)
                                        @if ($call_for_proposal->id === $project->call_for_proposal_id)
                                            {{ $call_for_proposal->title }}
                                        @endif
                                    @endforeach
                              </td>
                              <td class="align-middle">
                                {{-- <a href="{{ route('submission-details.show', $project->id) }}"> --}}
                                    {{ $project->project_name }}
                                {{-- </a> --}}
                              </td>
                              <td class="align-middle">{{ $project->research_group }}</td>
                              <td class="align-middle">{{ $project->created_at->format('F j, Y') }}</td>
                              <td class="align-middle"><span class="badge badge-danger text-sm">{{ $project->status }}</span></td>
                              <td class="align-middle">
                                  <div class="btn-group align-middle" role="group" aria-label="Basic example">
                                  <a href="{{ route('submission-details.show', $project->id) }}" type="button" class="btn btn-secondary">
                                  <i class="fas fa-info-circle"></i>
                                  </a>
                                  <a href="{{ route('projects.edit', $project->id) }}" type="button" class="btn btn-warning">
                                  <i class="fas fa-edit"></i>
                                  </a>

                                  <button class="btn btn-danger" onclick="confirmDelete('{{ route('projects.destroy', $project->id) }}')">
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
                          @endif
                  </tbody>
              </table>
            @if(session('success'))
                <script>
                    toastr.success('{{ session('success') }}');
                </script>
            @elseif(session('delete'))
                <script>
                    toastr.delete('{{ session('delete') }}');
                </script>
            @elseif(session('message'))
                <script>
                    toastr.message('{{ session('message') }}');
                </script>
            @elseif(session('error'))
                <script>
                    toastr.error('{{ session('error') }}');
                </script>
            @endif
        </div>
    </div>
</div>
</div>
@endsection
