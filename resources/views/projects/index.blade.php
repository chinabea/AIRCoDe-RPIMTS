

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
                            <h3 class="card-title my-1"><i class="fa fa-book"></i> Submitted Projects</h3>

                            <a href="{{ route('projects.xlsx.report') }}" class="btn bg-navy color-palette float-right btn-sm" style="background-color: #022A44;">
                                <i class="fa fa-download"></i> Export to Excel
                            </a>

                            <button type="button" class="btn bg-navy color-palette float-right btn-sm" data-toggle="modal" data-target="#pdf" data-backdrop="static" data-keyboard="false">Export to PDF</button>
                            @include('reports.report-options')

                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="align-middle">#</th>
                                        <th class="align-middle">Tracking Code</th>
                                        <th class="align-middle">Call for Proposal</th>
                                        <th class="align-middle">Project Head</th>
                                        <th class="align-middle">Title</th>
                                        <th class="align-middle">Research Group</th>
                                        <th class="align-middle">Date Submitted</th>
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                      @foreach($projects as $record)
                                      @if (in_array(auth()->user()->role, [1, 2, 4]) && $record->status !== 'Draft' || $record->user_id === auth()->user()->id)
                                      <tr>
                                          <td class="align-middle">{{ $loop->iteration }}</td>
                                          <td class="align-middle">{{ $record->tracking_code }}</td>
                                          <td class="align-middle">
                                                @foreach ($call_for_proposals as $call_for_proposal)
                                                    @if ($call_for_proposal->id === $record->call_for_proposal_id)
                                                        {{ $call_for_proposal->title }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="align-middle">{{ $record->user->name }}</td>
                                          <td class="align-middle">
                                            <!-- <a href="{{ route('submission-details.show', $record->id) }}"> -->
                                                {{ $record->project_name }}
                                            <!-- </a> -->
                                          </td>
                                          <td class="align-middle">{{ $record->research_group }}</td>
                                          <td class="align-middle">{{ $record->created_at->format('F j, Y') }}</td>
                                          <td class="align-middle">

                                            @if ($record->status === 'Draft')
                                                <span class="badge badge-primary text-sm">Draft</span>
                                            @elseif ($record->status === 'Under Evaluation')
                                                <span class="badge badge-info text-sm">Under Evaluation</span>
                                            @elseif ($record->status === 'For Revision')
                                                <span class="badge badge-warning text-sm">For Revision</span>
                                            @elseif ($record->status === 'Deferred')
                                                <span class="badge badge-secondary text-sm">Deferred</span>
                                            @elseif ($record->status === 'Approved')
                                                <span class="badge badge-success text-sm">Approved</span>
                                            @elseif ($record->status === 'Disapproved')
                                                <span class="badge badge-danger text-sm">Disapproved</span>
                                            @endif

                                          </td>
                                          <td class="align-middle">
                                              <div class="btn-group align-middle" role="group" aria-label="Basic example">
                                              <a href="{{ route('submission-details.show', $record->id) }}" type="button" class="btn btn-secondary">
                                              <i class="fas fa-info-circle"></i>
                                              </a>

                                              {{-- MAKE THIS AS ARCHIVE --}}
                                              <button class="btn btn-danger" onclick="confirmDelete('{{ route('projects.destroy', $record->id) }}')">
                                              <i class="fas fa-trash"> </i>
                                              </button>
                                          </td>
                                      </tr>
                                      @endif
                                      @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="align-middle">#</th>
                                        <th class="align-middle">Tracking Code</th>
                                        <th class="align-middle">Call for Proposal</th>
                                        <th class="align-middle">Project Head</th>
                                        <th class="align-middle">Title</th>
                                        <th class="align-middle">Research Group</th>
                                        <th class="align-middle">Date Submitted</th>
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle">Actions</th>
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
