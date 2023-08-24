
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
                <h3 class="card-title">Under Evaluation Projects</h3>
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
                            @foreach($projects as $index => $project)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $project->projname }}</td>
                                <td>{{ $project->researchgroup }}</td>
                                <td>{{ $project->start_date }}</td>
                                <td>{{ $project->end_date }}</td>
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
