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
                <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#AccessRequest">Add Access Request</button>
                @include('transparency.access-requests.create')
                
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <table id="example1" class="table table-bordered table-sm">
                    <thead>
                    <tr>
                      <th>#</th>
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
                                <td class="align-middle">{{ $requests->role }}</td>
                                <td class="align-middle">{{ \Carbon\Carbon::parse($requests->dateofaccess)->format('F j, Y') }}</td>
                                <td class="align-middle">{{ \Carbon\Carbon::parse($requests->timeofaccess)->format('h:i A') }}</td>
                                <td class="align-middle">{{ $requests->purposeofaccess }}</td>
                                <td class="align-middle">{{ $requests->dateapproved }}</td>
                                <td class="align-middle">
                                  
                                  <div class="btn-group" role="group" aria-label="Basic example"><a href="{{ route('transparency.access-requests.show', $requests->id) }}" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#AccessRequestShow{{ $requests->id }}">
                                    <i class="fas fa-eye"> Details</i>
                                  </a>

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
                    <input type="text" class="form-control" id="dateofaccess" name="dateofaccess" value="{{ \Carbon\Carbon::parse($requests->dateofaccess)->format('F j, Y') }}" readonly>
                    <br>
                    <label for="inputText">Time of access</label>
                    <input type="time" class="form-control" id="timeofaccess" name="timeofaccess" value="{{ $requests->timeofaccess }}" readonly>
                    <br>
                    <label for="">Purpose of Access</label>
                    <input type="text" class="form-control" id="purposeofaccess" name="purposeofaccess" value="{{ $requests->purposeofaccess }}" readonly>
                    <br>
                    <label for="date">Date Approved</label>
                    <input type="text" class="form-control" id="dateapproved" name="dateapproved" value="{{ \Carbon\Carbon::parse($requests->dateapproved)->format('F j, Y') }}" readonly>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>









                <!-- Edit -->
                <a href="{{ route('transparency.access-requests.edit', $requests->id) }}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $requests->id }}">
                    <i class="fas fa-edit"> Edit</i>
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
                                <label for="role">Role</label>
                                <select class="form-control" id="role" name="role" required>
                                  <option value="{{ $requests->role }}">{{ $requests->role }}</option>
                                  <option value="Researcher">Researcher</option>
                                  <option value="Student">Student</option>
                                  <option value="Reviewer">Reviewer</option>
                                </select>
                                <br>
                                <label for="inputText">Date of access</label>
                                <input type="date" class="form-control"  id="dateofaccess" name="dateofaccess" value="{{ $requests->dateofaccess }}" required>
                                <br>
                                @error('dateofaccess')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                    
                                <label for="inputText">Time of access</label>
                                <input type="time" class="form-control"  id="timeofaccess" name="timeofaccess" value="{{ $requests->timeofaccess }}" required>
                                <br>
                                @error('timeofaccess')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                    
                                <label for="">Purpose of Access</label>
                                <input type="text" class="form-control" id="purposeofaccess" name="purposeofaccess" value="{{ $requests->purposeofaccess }}" required>
                                <br>
                                @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                                <label for="date">Date Approved</label>
                                <input type="date" class="form-control" id="dateapproved" name="dateapproved" value="{{ $requests->dateapproved }}">
                                <br>
                                @error('dateapproved')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @endif
                                <button type="submit" class="btn btn-warning">Update</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                                        <button class="btn btn-danger m-0" onclick="confirmDelete('{{ route('transparency.access-requests.destroy', $requests->id) }}')">Delete</button>

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
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</div>
@endsection