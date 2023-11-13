@extends('layouts.template')

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
                <h3 class="card-title">Request List</h3>
              </div>
              <div class="card-body">
              <div class="table-responsive">
                @if (auth()->check() && auth()->user()->role == 3)
                  <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#AccessRequest" data-backdrop="static" data-keyboard="false">Add Access Request</button>
                  @include('transparency.access-requests.create')
                @endif

                <table id="example1" class="table table-bordered text-center table-sm">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Role</th>
                      <th>Date of Access</th>
                      <th>Time of Access</th>
                      <th>Purpose of Access</th>
                      <th>Date Approved</th>
                      <th>Action(s)</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($records->count() > 0)
                            @foreach($records as $requests)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ auth()->user()->name }}</td>
                                <td class="align-middle">
                                  @if(auth()->user()->role == 1)
                                      Director
                                  @elseif(auth()->user()->role == 2)
                                      Staff
                                  @elseif(auth()->user()->role == 3)
                                      Researcher
                                  @elseif(auth()->user()->role == 4)
                                      Reviewer
                                  @endif
                                </td> 
                                <td class="align-middle">{{ \Carbon\Carbon::parse($requests->date_of_access)->format('F j, Y') }}</td>
                                <td class="align-middle">{{ \Carbon\Carbon::parse($requests->time_of_access)->format('h:i A') }}</td>
                                <td class="align-middle">{{ $requests->purpose_of_access }}</td>
                                <td class="align-middle">{{ $requests->date_approved }}</td>
                                <td class="align-middle">

                                  <div class="modal fade" id="AccessRequestShow{{ $requests->id }}" tabindex="-1" role="dialog" aria-labelledby="AccessRequestShow{{ $requests->id }}Label" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="AccessRequestShow{{ $requests->id }}Label">View Request Details</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                  <!-- Your details content here -->
                                                  <div class="card-body">
                                                      <label for="inputText">Name</label>
                                                      <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $requests->user->name }}" readonly>
                                                      <br>
                                                      <label for="role">Role</label>
                                                      <select class="form-control" id="role" name="role" readonly>
                                                          <option value="{{ $requests->role }}">{{ $requests->role }}</option>
                                                      </select>
                                                      <br>
                                                      <label for="inputText">Date of access</label>
                                                      <input type="text" class="form-control" id="date_of_access" name="date_of_access" value="{{ \Carbon\Carbon::parse($requests->date_of_access)->format('F j, Y') }}" readonly>
                                                      <br>
                                                      <label for="inputText">Time of access</label>
                                                      <input type="time" class="form-control" id="time_of_access" name="time_of_access" value="{{ $requests->time_of_access }}" readonly>
                                                      <br>
                                                      <label for="">Purpose of Access</label>
                                                      <input type="text" class="form-control" id="purpose_of_access" name="purpose_of_access" value="{{ $requests->purpose_of_access }}" readonly>
                                                      <br>
                                                      <label for="date">Date Approved</label>
                                                      <input type="text" class="form-control" id="date_approved" name="date_approved" value="{{ \Carbon\Carbon::parse($requests->date_approved)->format('F j, Y') }}" readonly>
                                                      <br>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>


                                      <!-- Edit -->
                                      <a href="{{ route('transparency.access-requests.edit', $requests->id) }}" type="button" class="btn btn-warning" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#editModal{{ $requests->id }}">
                                          <i class="fas fa-edit"> </i>
                                      </a>
                                      <div class="modal fade" id="editModal{{ $requests->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $requests->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModal{{ $requests->id }}Label">Edit Request</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                  <form action="{{ route('transparency.access-requests.edit', $requests->id) }}" method="post">
                                                      @csrf
                                                      @method('PUT')
                                                      <label for="role">Name</label>
                                                      <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                                                      <br>
                                                      <label for="role">Role</label>
                                                      <input type="text" class="form-control" value="@if(auth()->user()->role == 1)Director
                                                        @elseif(auth()->user()->role == 2)Staff
                                                        @elseif(auth()->user()->role == 3)Researcher
                                                        @elseif(auth()->user()->role == 4)Reviewer
                                                        @endif" readonly>

                                                      <br>
                                                      <label for="inputText">Date of access</label>
                                                      <input type="date" class="form-control"  id="date_of_access" name="date_of_access" value="{{ $requests->date_of_access }}" required>
                                                      <br>
                                                      @error('date_of_access')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                                      @enderror
                                          
                                                      <label for="inputText">Time of access</label>
                                                      <input type="time" class="form-control"  id="time_of_access" name="time_of_access" value="{{ $requests->time_of_access }}" required>
                                                      <br>
                                                      @error('time_of_access')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                                      @enderror
                                          
                                                      <label for="">Purpose of Access</label>
                                                      <input type="text" class="form-control" id="purpose_of_access" name="purpose_of_access" value="{{ $requests->purpose_of_access }}" required>
                                                      <br>
                                                      @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                                                      <label for="date">Date Approved</label>
                                                      <input type="date" class="form-control" id="date_approved" name="date_approved" value="{{ $requests->date_approved }}">
                                                      <br>
                                                      @error('date_approved')
                                                      <div class="alert alert-danger">{{ $message }}</div>
                                                      @enderror
                                                      @endif

                                                      <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                          <button type="submit" class="btn btn-warning btn-right">Update</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                        <button class="btn btn-danger m-0" onclick="confirmDelete('{{ route('transparency.access-requests.destroy', $requests->id) }}')">
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
                                    </div>
                                </td>
                            </tr>
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
        </div>
      </section>
</div>
@endsection