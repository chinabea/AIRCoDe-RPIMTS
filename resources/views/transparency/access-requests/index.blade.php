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
                <h3 class="card-title"><i class="nav-icon fas fa-key"></i> Access Request</h3>
              </div>
              <div class="card-body">
              <div class="table-responsive">
                @if (auth()->check() && auth()->user()->role == 3)
                  <button type="button" class="btn btn-sm btn-info my-1" data-toggle="modal" data-target="#AccessRequest" data-backdrop="static" data-keyboard="false"><i class="fas fa-plus"></i> Add Access Request</button>
                  @include('transparency.access-requests.create')
                @endif

                <table id="example1" class="table table-bordered table-hover table-sm text-center">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Role</th>
                      <th>Date of Access</th>
                      <th>Time of Access</th>
                      <th>Purpose of Access</th>
                      <th>Status</th>
                      <th>Action(s)</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 0;
                        @endphp
                            @foreach($records as $requests)
                            @if(auth()->user()->role == 1 || auth()->user()->role == 2 || $requests->user_id === auth()->user()->id)  
                            @php
                                $counter++;
                            @endphp
                            <tr>
                                <td class="align-middle">{{ $counter }}</td>
                                <td class="align-middle">{{ $requests->user->name }}</td> 
                                <td class="align-middle">
                                  @if( $requests->user->role == 1 )
                                      Director
                                  @elseif( $requests->user->role == 2 )
                                      Staff
                                  @elseif( $requests->user->role == 3 )
                                      Researcher
                                  @elseif( $requests->user->role == 4 )
                                      Reviewer
                                  @endif
                                </td>
                                <td class="align-middle">{{ \Carbon\Carbon::parse($requests->date_of_access)->format('F j, Y') }}</td>
                                <td class="align-middle">{{ \Carbon\Carbon::parse($requests->time_of_access)->format('h:i A') }}</td>
                                <td class="align-middle">{{ $requests->purpose_of_access }}</td>
                                <td class="align-middle">{{ $requests->status }}</td>
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
                                                      <label for="date">Status</label>
                                                      <input type="text" class="form-control" id="date_approved" name="date_approved" value="{{ \Carbon\Carbon::parse($requests->date_approved)->format('F j, Y') }}" readonly>
                                                      <br>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  @if(Auth::check() && (Auth::user()->role == 1 || Auth::user()->role == 2))
                                  <!-- <a href="#" data-id="{{ $requests->id }}" class="btn btn-success approve-btn">Approve</a>
                                  <a href="#" data-id="{{ $requests->id }}" class="btn btn-danger decline-btn">Decline</a> -->

                                  @endif 

                                      <!-- Edit -->
                                      @if( $requests->user_id === auth()->user()->id)  
                                      <a href="{{ route('transparency.access-requests.edit', $requests->id) }}" type="button" class="btn btn-sm btn-warning" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#editModal{{ $requests->id }}">
                                          <i class="fas fa-edit"> </i>
                                      </a>
                                      <div class="modal fade" id="editModal{{ $requests->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $requests->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content text-left">
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
                                                      <label for="text">Status</label>
                                                      <input type="text" class="form-control" id="status" name="status" value="{{ $requests->status }}">
                                                      <br>
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
                                            @endif

                                        <a href="{{ route('requests.approved', ['id' => $requests->id]) }}" class="btn btn-sm btn-info" onclick="event.preventDefault(); document.getElementById('approve-form-{{ $requests->id }}').submit();">
                                            <i class="fas fa-check-circle"></i>
                                        </a>
                                        <form id="approve-form-{{ $requests->id }}" action="{{ route('requests.approved', ['id' => $requests->id]) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="Approved">
                                        </form>
                                        <a href="{{ route('requests.disapproved', ['id' => $requests->id]) }}" class="btn btn-sm btn-secondary" onclick="event.preventDefault(); document.getElementById('disapprove-form-{{ $requests->id }}').submit();">
                                            <i class="fas fa-times-circle"></i>
                                        </a>
                                        <form id="disapprove-form-{{ $requests->id }}" action="{{ route('requests.disapproved', ['id' => $requests->id]) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="Disapproved">
                                        </form>
                                        <button class="btn btn-sm btn-danger m-0" onclick="confirmDelete('{{ route('transparency.access-requests.destroy', $requests->id) }}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <!-- <form method="POST" action="{{ route('requests.approved', ['id' => $requests->id]) }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="approved">
                                            <button class="btn btn-sm btn-info">
                                                <i class="fas fa-times-circle"></i>
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('requests.disapproved', ['id' => $requests->id]) }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="disapproved">
                                            <button class="btn btn-sm btn-secondary">
                                                <i class="fas fa-times-circle"></i>
                                            </button>
                                        </form> -->
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                    </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</div>

@if (session('success'))
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


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        $('.approve-btn').click(function (e) {
            e.preventDefault();
            var accessRequestId = $(this).data('id');

            if (confirm('Are you sure you want to approve this access request?')) {
                $.post('/access-request/' + accessRequestId + '/approve', function (data) {
                    alert(data.message);
                    // Optionally, you can update the UI or redirect to another page
                });
            }
        });

        $('.decline-btn').click(function (e) {
            e.preventDefault();
            var accessRequestId = $(this).data('id');

            if (confirm('Are you sure you want to decline this access request?')) {
                $.post('/access-request/' + accessRequestId + '/decline', function (data) {
                    alert(data.message);
                    // Optionally, you can update the UI or redirect to another page
                });
            }
        });
    });
</script>















@endsection
