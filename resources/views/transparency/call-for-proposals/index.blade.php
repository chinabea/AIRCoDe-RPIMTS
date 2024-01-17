

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
                            <h3 class="card-title"><i class="nav-icon fas fa-file-signature"></i> Call for Proposals</h3>
                            <button type="button" class="btn bg-navy color-palette  float-right btn-sm mx-2" data-toggle="modal" data-target="#CallforProposal" data-backdrop="static" data-keyboard="false">
                              <i class="fas fa-plus"></i> Add Call for Proposals</button>
                            @include('transparency.call-for-proposals.create')
                        </div>
                        <div class="card-body">
                            <!-- <form action="{{ route('generate.call-for-proposals.report') }}" method="post" id="exportForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label>Date:</label>
                                        <input type="date" class="form-control" name="start_date" id="start_date">
                                    </div>
                                    <div class="col-lg-3">
                                        <label>To</label>
                                        <input type="date" class="form-control" name="end_date" id="end_date">
                                    </div>
                                    <div class="col-lg-6 mt-4">
                                        <label></label>
                                        <button type="button" class="btn btn-primary" id="btn_search"><i class="fa fa-search"></i></button>
                                        <button type="button" id="reset" class="btn btn-warning"><i class="fa fa-sync"></i></button>
                                        <button type="submit" class="btn bg-navy color-palette"><i class="fa fa-file-pdf"></i> Generate PDF</button>
                                    </div>
                                </div>
                            </form>
                            <hr> -->
                            <table id="example1" class="table table-bordered table-hover text-center table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th>Remarks</th>
                                        <th>Action(s)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 0;
                                    @endphp
                                    @foreach($records as $proposal)
                                            @php
                                                $counter++;
                                            @endphp
                                    <tr>
                                        <td class="align-middle">{{ $counter }}</td>
                                        <td class="align-middle">{{ $proposal->title }}</td>
                                        <td class="align-middle">{{ $proposal->description }}</td>
                                        <td class="align-middle">{{ \Carbon\Carbon::parse($proposal->start_date)->format('F j, Y') }}</td>
                                        <td class="align-middle">{{ \Carbon\Carbon::parse($proposal->end_date)->format('F j, Y') }}</td>
                                        <td class="align-middle">
                                          @php
                                              $currentDate = now();
                                              $startDate = \Carbon\Carbon::parse($proposal->start_date);
                                              $endDate = \Carbon\Carbon::parse($proposal->end_date);

                                              if ($currentDate >= $startDate && $currentDate <= $endDate) {
                                                  echo 'Open';
                                              } elseif ($currentDate < $startDate) {
                                                  echo 'Opening Soon';
                                              } else {
                                                  echo 'Closed';
                                              }
                                          @endphp
                                        </td>
                                        <td class="align-middle">{{ $proposal->remarks }}</td>
                                        <td class="align-middle">
                                            <div class="btn-group btn-sm" role="group" aria-label="Basic example">

                                            <a href="{{ route('transparency.call-for-proposals.edit', $proposal->id) }}" type="button" class="btn btn-warning" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#editModal{{ $proposal->id }}">
                                              <i class="fas fa-edit"></i>
                                            </a>
                                                    <div class="modal fade" id="editModal{{ $proposal->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $proposal->id }}Label" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <h5 class="modal-title" id="editModal{{ $proposal->id }}Label">Edit Call for Proposal</h5>
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                  </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                <form action="{{ route('transparency.call-for-proposals.edit', $proposal->id) }}" method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <label for="title" class="float-left">Call for Proposals</label>
                                                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Call for Proposals" value="{{$proposal->title}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="description" class="float-left">Description</label>
                                                                    <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="{{$proposal->description}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="start_date" class="float-left">Start Date</label>
                                                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{$proposal->start_date}}">
                                                                </div>
                                                                @error('start_date')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                <div class="form-group">
                                                                    <label for="end_date" class="float-left">End Date</label>
                                                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{$proposal->end_date}}">
                                                                </div>
                                                                @error('end_date')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                <!-- <div class="form-group">
                                                                    <label for="status">Status</label>
                                                                    <input type="text" class="form-control" id="status" name="status" placeholder="Status" value="{{$proposal->status}}">
                                                                </div> -->
                                                                <div class="form-group">
                                                                    <label for="remarks" class="float-left">Remarks</label>
                                                                    <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Remarks" value="{{$proposal->remarks}}">
                                                                </div>
                                                                <!-- <div class="form-group">
                                                                    <button type="submit" class="btn btn-warning float-right">Update</button>
                                                                </div> -->

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-warning btn-right">Update</button>
                                                                </div>
                                                            </form>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>

                                            <button class="btn btn-danger" onclick="confirmDelete('{{ route('transparency.call-for-proposals.destroy', $proposal->id) }}')">
                                              <i class="fas fa-trash"></i>
                                            </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th>Remarks</th>
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

@endsection


