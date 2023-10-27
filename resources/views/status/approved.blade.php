@extends('layouts.template')
@section('title', 'Projects')

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
                <h3 class="card-title">Approved Projects</h3>
              </div>
              <div class="card-body">
                <div class="card-body pad table-responsive">
                    <table id="example1" class="table table-hover table-bordered text-center table-sm">
                        <thead class="table-info">
                            <tr>
                                {{-- <th>#</th> --}}
                                <th>Tracking Code</th>
                                <th>Title</th>
                                <th>Group</th>
                                <th>Call for Proposal</th>
                                <th>Date Submitted</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($approvedprojs as $index => $approvedproj)
                            @if(auth()->user()->role == 1 || auth()->user()->role == 2 || $approvedproj->user_id === auth()->user()->id)
                            <tr>
                                {{-- <td>{{ $index + 1 }}</td> --}}
                                <td>{{ $approvedproj->tracking_code }}</td>
                                <td class="align-middle">
                                  <a href="{{ route('submission-details.show', $approvedproj->id) }}">{{ $approvedproj->projname }}</a>
                                </td>
                                <td>{{ $approvedproj->researchgroup }}</td>
                                <td>{{ $approvedproj->start_date }}</td>
                                <td>{{ $approvedproj->end_date }}</td>
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
  </div>
@endsection
