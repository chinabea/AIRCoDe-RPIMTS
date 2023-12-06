

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
                            <h3 class="card-title my-1"><i class="fa fa-book"></i> APPROVED</h3>
                            <button type="button" class="btn bg-navy color-palette float-right btn-sm" data-toggle="modal" data-target="#approvedPdf" data-backdrop="static" data-keyboard="false"> 
                                <i class="fas fa-file-pdf"></i> Export to PDF</button> 
                                @include('reports.report-options')
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover text-center table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tracking Code</th>
                                        <th>Call for Proposal</th>
                                        <th>Project Head</th>
                                        <th>Title</th>
                                        <th>Research Group</th>
                                        <th>Date Submitted</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($approvedprojs->count() > 0)
                                @foreach($approvedprojs as $index => $project)
                                      @if(auth()->user()->role == 1 || auth()->user()->role == 2 || $project->user_id === auth()->user()->id)
                                      <tr>
                                          <td class="align-middle">{{ $loop->iteration }}</td>
                                          <td class="align-middle">{{ $project->tracking_code }}</td>
                                          <td class="align-middle">
                                                @foreach ($call_for_proposals as $call_for_proposal)
                                                    @if ($call_for_proposal->id === $project->call_for_proposal_id)
                                                        {{ $call_for_proposal->title }}
                                                    @endif
                                                @endforeach
                                          </td>
                                          <td class="align-middle">{{ $project->user->name }}</td>
                                          <td class="align-middle">
                                            {{-- <a href="{{ route('submission-details.show', $project->id) }}"> --}}
                                                {{ $project->project_name }}
                                            {{-- </a> --}}
                                          </td>
                                          <td class="align-middle">{!! $project->research_group !!}</td>
                                          <td class="align-middle">{{ $project->created_at->format('F j, Y') }}</td>
                                          <td class="align-middle"><span class="badge badge-success text-sm">{{ $project->status }}</span></td>
                                          <td class="align-middle">
                                              <div class="btn-group align-middle" role="group" aria-label="Basic example">
                                              <a href="{{ route('submission-details.show', $project->id) }}" type="button" class="btn btn-secondary">
                                              <i class="fas fa-info-circle"></i>
                                              </a>
                                              <a href="{{ route('projects.edit', $project->id) }}" type="button" class="btn btn-warning">
                                              <i class="fas fa-edit"></i>
                                              </a>

                                              <button class="btn btn-danger" onclick="confirmDelete('{{ route('projects.destroy', $project->id) }}')">
                                              <i class="fas fa-trash"></i>
                                              </button>
                                          </td>
                                      </tr>
                                      @endif
                                      @endforeach
                                      @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Tracking Code</th>
                                        <th>Call for Proposal</th>
                                        <th>Project Head</th>
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

