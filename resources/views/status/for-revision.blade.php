

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
                        <!-- <div class="card-header"> -->
                            
                            <!-- <button type="button" class="btn bg-navy color-palette float-right btn-sm" data-toggle="modal" data-target="#forRevisionPdf" data-backdrop="static" data-keyboard="false"> 
                                <i class="fas fa-file-pdf"></i> Export to PDF</button>  -->
                                @include('reports.report-options')
                                    
                        <!-- </div> -->
                        <div class="card-body">
                            <h3 class="card-title"><i class="fa fa-book"></i> For Revision</h3><br><br>
                            <form action="{{ route('generate.for-revision.report') }}" method="post" id="exportForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <p for="filter_type">Filter By:</p>
                                            <select class="form-control" name="filter_type" id="filter_type">
                                                <option value="year">Year</option>
                                                <option value="date">Date Range</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2" id="yearFilter">
                                        <div class="form-group">
                                            <p for="year">Year:</p>
                                            <select class="form-control" name="year" id="year">
                                                @for ($i = date('Y'); $i >= 2000; $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="dateFilter" style="display: none;">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <p for="start_date">Start Date:</p>
                                                <input type="date" class="form-control" name="start_date" id="start_date">
                                            </div>
                                            <div class="col-md-6">
                                                <p for="end_date">To:</p>
                                                <input type="date" class="form-control" name="end_date" id="end_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-5">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-primary" id="btn_search"><i class="fa fa-search"></i> Search</button>
                                            <button type="button" id="reset" class="btn btn-sm btn-warning"><i class="fa fa-sync"></i> Reset</button>
                                            <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-file-pdf"></i> Generate PDF</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                                    @php
                                        $counter = 0;
                                    @endphp
                                    @foreach($projects as $index => $project)
                                      @if(auth()->user()->role == 1 || auth()->user()->role == 2 || $project->user_id === auth()->user()->id)
                                            @php
                                                $counter++;
                                            @endphp
                                      <tr>
                                          <td class="align-middle">{{ $counter }}</td>
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
                                          <td class="align-middle">{!! $project->research_group !!}</td>
                                          <td class="align-middle">{{ $project->created_at->format('F j, Y') }}</td>
                                          <td class="align-middle"><span class="badge badge-warning text-sm">{{ $project->status }}</span></td>
                                          <td class="align-middle">
                                              <div class="btn-group align-middle" role="group" aria-label="Basic example">
                                              <a href="{{ route('submission-details.show', $project->id) }}" type="button" class="btn btn-secondary">
                                              <i class="fas fa-info-circle"></i>
                                              </a>

                                            @if(auth()->user() && auth()->user()->role === 3)
                                                <a href="{{ route('projects.edit', $project->id) }}" type="button" class="btn btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endif
                                            
                                              <button class="btn btn-danger" onclick="confirmDelete('{{ route('projects.destroy', $project->id) }}')">
                                              <i class="fas fa-trash"></i>
                                              </button>
                                          </td>
                                      </tr>
                                      @endif
                                      @endforeach
                                </tbody>
                                <tfoot>
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

