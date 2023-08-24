@extends('layouts.template')
@section('title', 'Projects')

@section('content')

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
        </div>
      </div>
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
                                <th>#</th>
                                <th>Title</th>
                                <th>Group</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($approvedprojs as $index => $approvedproj)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $approvedproj->projname }}</td>
                                <td>{{ $approvedproj->researchgroup }}</td>
                                <td>{{ $approvedproj->start_date }}</td>
                                <td>{{ $approvedproj->end_date }}</td>
                            </tr>
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
