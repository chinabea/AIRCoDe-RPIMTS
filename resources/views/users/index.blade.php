@extends('layouts.template')

@section('content')

  <div class="content-wrapper">
    <section class="content-header">
    </section>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-center align-items-center">
              <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                <h1 class="m-0 ml-3 font-weight-bold">USERS</h1>
            </div>

            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover table-sm text-center">
                  <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action(s)</th>
                      </tr>
                  </thead>
                  <tbody>
                    @if($records->count() > 0)
                        @foreach($records as $user)
                          <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $user->name }}</td>
                            <td class="align-middle">{{ $user->email }}</td>
                            <td class="align-middle">
                                        @if ($user->role == 1)
                                            Director
                                        @elseif ($user->role == 2)
                                            Staff
                                        @elseif ($user->role == 3)
                                            Researcher
                                        @elseif ($user->role == 4)
                                            Reviewer
                                        @else
                                            Guest
                                        @endif
                            </td>
                              <td class="align-middle">
                                  <div class="btn-group align-middle" role="group" aria-label="Basic example">
                                  <a href="{{ route('users.show', $user->id) }}" type="button" class="btn btn-secondary">
                                  <i class="fas fa-info-circle"></i>
                                  </a>
                                  <a href="{{ route('users.edit', $user->id) }}" type="button" class="btn btn-warning">
                                  <i class="fas fa-edit"></i>
                                  </a>

                                  <button class="btn btn-danger" onclick="confirmDelete('{{ route('projects.destroy', $user->id) }}')">
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
                                {{-- </div> --}}
                              </td>
                          </tr>
                          @endforeach
                          @endif
                  </tbody>
              </table>
        </div>
    </div>
</div>
</div>
@endsection
