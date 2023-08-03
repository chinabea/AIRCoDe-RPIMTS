@extends('layouts.template')

@section('content')

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <div class="card-body">
              <p>Dashboard</p>

              <div class="card-body pad table-responsive">
                <table class="table table-bordered table-sm text-right">
                    <tbody>
                        <tr>
                        <th scope="row" width="25%">PROJECT ID</th>
                        <td class="text-left">{{ $projects->id }}</td>
                        </tr>
                        <tr>
                        <th scope="row" width="25%">PROJECT TITLE</th>
                        <td class="text-left">{{ $projects->projname }}</td>
                        </tr>
                        <tr>
                        <th scope="row">PROJECT GROUP</th>
                        <td class="text-left">{{ $projects->researchgroup }}</td>
                        </tr>
                        <tr>
                        <th scope="row">STATUS</th>
                        <td class="text-left">{{ $projects->status }}</td>
                        </tr>
                        <tr>
                        <th scope="row">REVIEWERS</th>
                        <td class="text-left">@foreach($reviewers as $reviewer)
                                                <p>{{ $reviewer->name }}</p>
                                            @endforeach
                                          </td>
                        </tr>
                        <tr>
                        <th scope="row">DATE SUBMITTED</th>
                        <td class="text-left">{{ \Carbon\Carbon::parse($projects->created_at)->format('F d, Y') }}</td>
                        </tr>
                        <tr>
                        <th scope="row">LAST UPDATE</th>
                        <td class="text-left">{{ \Carbon\Carbon::parse($projects->updated_at)->format('F d, Y') }}</td>
                        </tr>

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
