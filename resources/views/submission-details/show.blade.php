@extends('layouts.template')

@section('content')

<div class="content-wrapper">
  <section class="content-header">
  </section>
  
@if(Auth::check())
    @if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3)
    <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                  SUBMISSION DETAILS
              </div>
              <div class="card-body pad table-responsive">
                <table class="table table-bordered table-sm text-right">
                    <tbody>
                        <tr>
                        <th scope="row" width="25%">PROJECT ID</th>
                        <td class="text-left">{{ $records->id }}</td>
                        </tr>
                        <tr>
                        <th scope="row" width="25%">PROJECT TITLE</th>
                        <td class="text-left">{{ $records->projname }}</td>
                        </tr>
                        <tr>
                        <th scope="row">PROJECT LEADER</th>
                        <td class="text-left">{{ $records->user->name }}
                            <a href="{{ route('emailbox.compose') }}" class="btn btn-default btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Send Email">
                                <i class="fa fa-envelope"></i>
                            </a>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row">STATUS</th>
                        <td class="text-left">{{ $records->status }}</td>
                        </tr>
                        <tr>
                        <th scope="row">DATE SUBMITTED</th>
                        <td class="text-left">{{ ($records->created_at) }}</td>
                        </tr>
                        <tr>
                        <th scope="row">LAST UPDATE</th>
                        <td class="text-left">{{ ($records->updated_at) }}</td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
          </div>  
    @elseif(Auth::user()->role == 4)
    <div class="col-md-12">
    <div class="row">
      <div class="col-xl-7 col-lg-7">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Project Details</h6>
          </div>
          <div class="card-body">
            <label>Project Name:</label><br>
            {{ $records->projname }}
            <br><br>

            <label>Status:</label><br>
            {{ $records->status }}
            <br><br>

            <label>Research Group:</label><br>
            {{ $records->researchgroup }}
            <br><br>

            <label>Author(s):</label><br>
            {{ $records->authors }}
            <br><br>

            <label>Introduction:</label><br>
            {{ $records->introduction }}
            <br><br>

            <label>Aims and Objectives:</label><br>
            {{ $records->aims_and_objectives }}
            <br><br>

            <label>Background:</label><br>
            {{ $records->background }}
            <br><br>

            <label>Expected Research Contribution:</label><br>
            {{ $records->expected_research_contribution }}
            <br><br>

            <label>The Proposed Methodology:</label><br>
            {{ $records->proposed_methodology }}
            <br><br>

            <label>Start Date:</label>
            {{ $records->start_date }}
            <br><br>

            <label>End Date:</label>
            {{ $records->end_date }}
            <br><br>

            <label>Work Plan:</label><br>
            {{ $records->workplan }}
            <br><br>

            <label>Resources:</label><br>
            {{ $records->resources }}
            <br><br>

            <label>References:</label><br>
            {{ $records->references }}
            <br><br>
        </div>
    </div>
</div>
<div class="col-xl-5 col-lg-5">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Recommendations, Suggestions and Comments (RSC)</h6>
        </div>
        <div class="card-body">
                <form method="POST" action="{{ route('reviews.storeComments', $records->id) }}">
                  @csrf
                  <div class="form-group">
                    <label for="project_name">Project Name</label>
                    <textarea type="text" id="project_name" name="project_name" class="form-control" rows="1"></textarea>
                  </div>

                                        <div class="form-group">
                                            <label for="research_group">Research Group</label>
                                            <textarea type="text" id="research_group" name="research_group" class="form-control" rows="1"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="project_authors">Author(s)</label>
                                            <textarea type="text" id="project_authors" name="project_authors" class="form-control" rows="1"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="project_introduction">Introduction</label>
                                            <textarea id="project_introduction" name="project_introduction" class="form-control" rows="1"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="project_aims_and_objectives">Aims and Objectives</label>
                                            <textarea id="project_aims_and_objectives" name="project_aims_and_objectives" class="form-control" rows="1"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="project_background">Background</label>
                                            <textarea id="project_background" name="project_background" class="form-control" rows="1"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="research_contribution">Expected Research Contribution</label>
                                            <textarea id="research_contribution" name="research_contribution" class="form-control" rows="1"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="project_methodology">The Proposed Methodology</label>
                                            <textarea id="project_methodology" name="project_methodology" class="form-control" rows="1"></textarea>
                                        </div>

                                        <label for="project_start_date">Start Date:</label>
                                        <input type="date" id="project_start_date" name="project_start_date" class="form-control">
                                        <label for="project_end_date">End Date:</label>
                                        <input type="date" id="project_end_date" name="project_end_date" class="form-control">

                                        {{-- <div class="form-group">
                                            <label>Work Plan:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                            </div>
                                            <input type="text" class="form-control float-right" id="reservation" name="reservation">
                                             placeholder="An initial plan for completion with annual milestones (eg. over 3 years).">
                                        </div>
                                        </div> --}}

                                        <div class="form-group">
                                            <label>Work Plan:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                            </div>
                                            <input type="text" class="form-control float-right" id="project_workplan" name="project_workplan">
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="project_resources">Resources</label>
                                            <textarea class="form-control" id="project_resources" name="project_resources" rows="1"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="project_total_budget">Total Budget</label>
                                            <textarea id="project_total_budget" name="project_total_budget" class="form-control" rows="1"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="project_references">References</label>
                                            <textarea id="project_references" name="project_references" class="form-control" rows="1"></textarea>
                                        </div>
                                        <div class="form-group">
                                          <label for="other_rsc">Other Recommendation, Suggestion and Comments</label>
                                          <textarea id="other_rsc" name="other_rsc" class="form-control" rows="1"></textarea>
                                        </div>
                                        <br>

                                        <a href="#" class="btn btn-secondary">Cancel</a>
                                        <input type="submit" value="Submit Review" class="btn btn-info float-right">
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>  
@endif

    @if(Auth::user()->role == 1)
        <div class="text-center">
        <button id="actions-btn" class="btn btn-primary">
            <i class="fas fa-cogs mr-2"></i>Actions
        </button>
        <button id="details-btn" class="btn btn-primary my-2">
            <i class="fas fa-info-circle mr-2"></i>Details
        </button>
        <button id="tasks-btn" class="btn btn-primary my-2">
            <i class="fas fa-tasks mr-2"></i>Tasks
        </button>
        <button id="lib-btn" class="btn btn-primary my-2">
            <i class="fas fa-list-alt mr-2"></i>Line-Item Budget
        </button>
        <button id="files-btn" class="btn btn-primary my-2">
            <i class="fas fa-file-alt mr-2"></i>Files
        </button>
        <button id="messages-btn" class="btn btn-primary my-2">
            <i class="fas fa-comments mr-2"></i>Messages
        </button>
        <button id="project-team-btn" class="btn btn-primary my-2">
            <i class="fas fa-users mr-2"></i>Project Team
        </button>
        <button id="status-btn" class="btn btn-primary my-2">
            <i class="fas fa-tasks mr-2"></i>Status
        </button>
        <button id="reviewer-btn" class="btn btn-primary my-2">
            <i class="fas fa-user-check mr-2"></i>Reviewer
        </button>
        </div>

    @elseif(Auth::user()->role == 2)
        <div class="text-center">
        <button id="actions-btn" class="btn btn-primary">
            <i class="fas fa-cogs mr-2"></i>Actions
        </button>
        <button id="details-btn" class="btn btn-primary my-2">
            <i class="fas fa-info-circle mr-2"></i>Details
        </button>
        <button id="tasks-btn" class="btn btn-primary my-2">
            <i class="fas fa-tasks mr-2"></i>Tasks
        </button>
        <button id="lib-btn" class="btn btn-primary my-2">
            <i class="fas fa-list-alt mr-2"></i>Line-Item Budget
        </button>
        <button id="files-btn" class="btn btn-primary my-2">
            <i class="fas fa-file-alt mr-2"></i>Files
        </button>
        <button id="messages-btn" class="btn btn-primary my-2">
            <i class="fas fa-comments mr-2"></i>Messages
        </button>
        <button id="project-team-btn" class="btn btn-primary my-2">
            <i class="fas fa-users mr-2"></i>Project Team
        </button>
        <button id="status-btn" class="btn btn-primary my-2">
            <i class="fas fa-tasks mr-2"></i>Status
        </button>
        <button id="reviewer-btn" class="btn btn-primary my-2">
            <i class="fas fa-user-check mr-2"></i>Reviewer
        </button>
        <div class="text-center">
          <button id="review-btn" class="btn btn-primary my-2">
            <i class="fas fa-file-signature mr-2"></i>Review
          </button>
        </div>
      </div>
    
    @elseif(Auth::user()->role == 3)
        <div class="text-center">
        <button id="actions-btn" class="btn btn-primary">
            <i class="fas fa-cogs mr-2"></i>Actions
        </button>
        <button id="details-btn" class="btn btn-primary my-2">
            <i class="fas fa-info-circle mr-2"></i>Details
        </button>
        <button id="tasks-btn" class="btn btn-primary my-2">
            <i class="fas fa-tasks mr-2"></i>Tasks
        </button>
        <button id="lib-btn" class="btn btn-primary my-2">
            <i class="fas fa-list-alt mr-2"></i>Line-Item Budget
        </button>
        <button id="files-btn" class="btn btn-primary my-2">
            <i class="fas fa-file-alt mr-2"></i>Files
        </button>
        <button id="messages-btn" class="btn btn-primary my-2">
            <i class="fas fa-comments mr-2"></i>Messages
        </button>
        <button id="project-team-btn" class="btn btn-primary my-2">
            <i class="fas fa-users mr-2"></i>Project Team
        </button>
        </div>

    @endif
@endif
 
<div id="actions-form" class="mt-4" style="display: none;">
<div class="col-md-12">
  <div class="card card-primary card-outline">
    <div class="card-header">ACTIONS</div>
    <div class="card-body pad table-responsive">
      <div class="col-md-12">
        <div class="document">
          @if ($toreview)
          <p><b>Project Name: </b>{{ $records->projname }}</p>
          <p><b>{{ $toreview->user->name }}: </b>{{ $toreview->project_name }}</p>
                    <hr>
                    <label>Research Group</label>
                    <p>{{ $toreview->research_group }}</p>
                    <hr>
                    <label>Author(s)</label>
                    <p>{{ $toreview->project_authors }}</p>
                    <hr>
                    <label>Introduction</label>
                    <p>{{ $toreview->project_introduction }}</p>
                    <hr>
                    <label>Aims and Objectives</label>
                    <p>{{ $toreview->project_introduction }}</p>
                    <hr>
                    <label>Background</label>
                    <p>{{ $toreview->project_background }}</p>
                    <hr>
                    <label>Expected Research Contribution</label>
                    <p>{{ $toreview->research_contribution }}</p>
                    <hr>
                    <label>The Proposed Methodology</label>
                    <p>{{ $toreview->project_methodology }}</p>
                    <hr>
                    <label>Start Date</label>
                    <p>{{ $toreview->project_start_date }}</p>
                    <hr>
                    <label>Work Plan</label>
                    <p>{{ $toreview->project_workplan }}</p>
                    <hr>
                    <label>Resources</label>
                    <p>{{ $toreview->project_resources }}</p>
                    <hr>
                    <label>Total Budget</label>
                    <p>{{ $toreview->project_total_budget }}</p>
                    <hr>
                    <label>References</label>
                    <p>{{ $toreview->project_references }}</p>
                    <hr>
                    <label>Other Recommendation, Suggestion and Comments</label>
                    <p>{{ $toreview->other_rsc }}</p>

                @else
                <p>No review/comment available for this project.</p>
                @endif
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<div id="details-form" class="mt-4" style="display: none;">
<!-- Form fields go here -->
<div class="col-md-12">
  <div class="card card-primary card-outline">
    <div class="card-header">
        DETAILS
    </div>
    <div class="card-body pad table-responsive text-left">
    <a href="{{ route('generate.pdf', ['data_id' => $records->id]) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-file-pdf fa-sm text-white-50"></i> Export to PDF</a>
        <div style="text-align: justify;">
            <label>Project Name:</label><br>
            {{ $records->projname }}
            <br><br>

            <label>Status:</label><br>
            {{ $records->status }}
            <br><br>

            <label>Research Group:</label><br>
            {{ $records->researchgroup }}
            <br><br>

            <label>Author(s):</label><br>
            {{ $records->authors }}
            <br><br>

            <label>Introduction:</label><br>
            {{ $records->introduction }}
            <br><br>

            <label>Aims and Objectives:</label><br>
            {{ $records->aims_and_objectives }}
            <br><br>

            <label>Background:</label><br>
            {{ $records->background }}
            <br><br>

            <label>Expected Research Contribution:</label><br>
            {{ $records->expected_research_contribution }}
            <br><br>

            <label>The Proposed Methodology:</label><br>
            {{ $records->proposed_methodology }}
            <br><br>

            <label>Start Date:</label>
            {{ $records->start_date }}
            <br><br>

            <label>End Date:</label>
            {{ $records->end_date }}
            <br><br>

            <label>Work Plan:</label><br>
            {{ $records->workplan }}
            <br><br>

            <label>Resources:</label><br>
            {{ $records->resources }}
            <br><br>

            <label>References:</label><br>
            {{ $records->references }}
            <br><br>
        </div>

    </div>
  </div>
</div>
</div>

<div id="tasks-form" class="mt-4" style="display: none;">
<!-- Form fields go here -->
<div class="col-md-12">
  <div class="card card-primary card-outline">
    <div class="card-header">
        TASKS
    </div>
    <div class="card-body pad table-responsive text-left">
    <!-- <a href="{{ route('generate.pdf', ['data_id' => $records->id]) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-file-pdf fa-sm text-white-50"></i> Export to PDF</a> -->
      <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#Tasks">Add Task</button>
        @include('submission-details.tasks.create')
        <table id="example1" class="table table-hover table-bordered text-center table-sm">
          <thead class="table-info">
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Description</th>
              <th>Added at</th>
              <th>Due Date</th>
              <th>Assigned To</th>
              <th>Updated At</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($tasks as $task)
            <tr>
              <td class="align-middle">{{ $loop->iteration }}.</td>
              <td>{{ $task->title }}</td>
              <td>{{ $task->description }}</td>
              <td>{{ $task->created_at }}</td>
              <td>{{ $task->end_date }}</td>
              <td>{{ $task->assignedTo->name }}</td>
              <td>{{ $task->updated_at }}</td>
              <td>
                <a href="{{ route('submission-details.tasks.edit', $task->id) }}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $task->id }}">
                    <i class="fas fa-edit"></i>
                </a>
                <div class="modal fade" id="editModal{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $task->id }}Label" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="editModal{{ $task->id }}Label">Edit Task</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <form method="post" action="{{ route('submission-details.tasks.update', $task->id) }}" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="modal-body">
                                  <!-- Input fields for editing -->
                                  <div class="form-group">
                                      <label for="title">Title</label>
                                      <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}">
                                  </div>
                                  <div class="form-group">
                                      <label for="description">Description</label>
                                      <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
                                  </div>
                                  <div class="form-group">
                                      <label for="assigned_to">Assigned To</label>
                                      <select name="assigned_to" id="assigned_to" class="form-control">
                                          @foreach ($members as $member)
                                              <option value="{{ $member->id }}" {{ $member->id == $task->assigned_to ? 'selected' : '' }}>
                                                  {{ $member->name }}
                                              </option>
                                          @endforeach
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label for="start_date">Start Date</label>
                                      <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $task->start_date ? $task->start_date->format('Y-m-d') : '' }}" >
                                  </div>
                                  <div class="form-group">
                                      <label for="end_date">End Date</label>
                                      <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $task->end_date ? $task->end_date->format('Y-m-d') : '' }}" >
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  <button type="submit" class="btn btn-primary">Save Changes</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
              <button class="btn btn-danger" onclick="confirmDelete('{{ route('submission-details.tasks.delete', $task->id) }}')">
                <i class="fas fa-trash"></i>
              </button>
                    <script>
                    function confirmDelete(url) {
                        if (confirm('Are you sure you want to delete this record?')) {
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
              </td>
            </tr>
        @endforeach
          </tbody>
        </table>
    </div>
  </div>
</div>
</div>

<div id="lib-form" class="mt-4" style="display: none;">
<!-- Form fields go here -->
<div class="col-md-12">
  <div class="card card-primary card-outline">
    <div class="card-header">
      LINE-ITEM BUDGET
      </h3>
    </div>
    <div class="card-body pad table-responsive text-left">
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right">
          <i class="far fa-file-excel fa-sm text-white-50"></i> Export to Excel
      </a>
      <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#lib">Add Line-Item</button>
          @include('submission-details.line-items-budget.create')
          <table id="" class="table table-hover table-bordered text-center table-sm">
            <thead class="table-info">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Actions</th>
              </tr>
            </thead>
              @foreach($lineItems as $lineItem)
            <tbody>
              <tr>
                <td class="align-middle">{{ $loop->iteration }}.</td>
                <td>{{ $lineItem->name }}</td>
                <td>{{ $lineItem->quantity }}</td>
                <td>{{ $lineItem->unit_price }}</td>
                <td>
                  <a href="{{ route('submission-details.line-items-budget.edit', $lineItem->id) }}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $lineItem->id }}">
                      <i class="fas fa-edit"></i>
                  </a>
                  <div class="modal fade" id="editModal{{ $lineItem->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $lineItem->id }}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModal{{ $lineItem->id }}Label">Edit Line-Item Budget</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="{{ route('submission-details.line-items-budget.update', $lineItem->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <!-- Input fields for editing -->
                                    @php
                                        $totalAllLineItems = 0;
                                        foreach ($allLineItems as $item) {
                                            $totalAllLineItems += $item->quantity * $item->unit_price;
                                        }
                                    @endphp
                                    <div class="form-group">
                                        <label for="edit_name">Name:</label>
                                        <input type="text" class="form-control" id="edit_name{{ $lineItem->id }}" name="name" value="{{ $lineItem->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_quantity">Quantity:</label>
                                        <input type="number" class="form-control" id="edit_quantity{{ $lineItem->id }}" name="quantity" value="{{ $lineItem->quantity }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_unit_price">Unit Price:</label>
                                        <input type="number" class="form-control" id="edit_unit_price{{ $lineItem->id }}" name="unit_price" value="{{ $lineItem->unit_price }}" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger" onclick="confirmDelete('{{ route('submission-details.line-items-budget.destroy', $lineItem->id) }}')">
                  <i class="fas fa-trash"></i>
                </button>
                      <script>
                      function confirmDelete(url) {
                          if (confirm('Are you sure you want to delete this record?')) {
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
                </td>
              </tr>
            </tbody>
          @endforeach
          </table>
          <div class="form-group float-right">
              <label for="edit_total">Total:</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text">₱</span>
                  </div>
                  <input type="text" class="form-control bg-light text-large" id="total_all_line_items" value="{{ number_format($totalAllLineItems, 2, '.', ',') }}" readonly>
              </div>
          </div>
    </div>
  </div>
</div>
</div>

<div id="files-form" class="mt-4" style="display: none;">
<div class="col-md-12">
  <div class="card card-primary card-outline">
    <div class="card-header">
            FILES
      </h3>
    </div>
    <div class="card-body pad table-responsive">
      <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#filesModal">Add File</button>
          @include('submission-details.files.create')
          <table id="example1" class="table table-hover table-bordered table-sm">
            <thead class="table-info">
              <tr>
                <th>#</th>
                <th>Filename</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
              </tr>
            </thead>
            @foreach($files as $file)
            <tbody>
              <tr>
                <td class="align-middle">{{ $loop->iteration }}.</td>
                <td>{{ $file->file_name }}</td>
                <td>{{ $file->created_at }}</td>
                <td>{{ $file->updated_at }}</td>
                <td>
                <a href="{{ route('submission-details.files.preview', ['filename' => $file->file_path]) }}" class="btn btn-secondary">
                    <i class="fas fa-eye"></i> <!-- Font Awesome eye icon -->
                </a>

                <a href="{{ route('file.download', ['id' => $file->id]) }}" class="btn btn-primary">
                    <i class="fas fa-download"></i>
                </a>
                <a href="{{ route('submission-details.files.edit', $file->id) }}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#editFileModal{{ $file->id }}">
                    <i class="fas fa-edit"></i>
                </a>
                <div class="modal fade" id="editFileModal{{ $file->id }}" tabindex="-1" role="dialog" aria-labelledby="editFileModal{{ $file->id }}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editFileModal{{ $file->id }}Label">Edit File</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="{{ route('submission-details.files.reupload', $file->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <!-- Input fields for editing -->
                                    <div class="form-group">
                                        <label for="edit_file_name">File Name:</label>
                                        <input type="text" class="form-control" id="edit_file_name{{ $file->id }}" name="file_name" value="{{ $file->file_name }}" required>
                                    </div>
                                    <!-- You can add more fields here if needed -->
                                    <div class="form-group">
                                        <label for="file">Choose File:</label>
                                        <input type="file" class="form-control-file" id="file" name="file" accept=".pdf, .doc, .docx" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger" onclick="confirmDelete('{{ route('submission-details.files.delete', $file->id) }}')">
                  <i class="fas fa-trash"></i>
                </button>
                  <script>
                    function confirmDelete(url) {
                        if (confirm('Are you sure you want to delete this record?')) {
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
                </td>
              </tr>
            </tbody>
          @endforeach
          </table>
    </div>
  </div>
</div>
</div>
<!-- </div> -->

      <div id="messages-form" class="mt-4" style="display: none;">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
                  MESSAGES
            </h3>
          </div>
          <div class="card-body pad table-responsive">


          </div>
        </div>
      </div>
      </div>

<div id="project-team-form" class="mt-4" style="display: none;">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
            PROJECT TEAM
        </div>
        <div class="card-body pad table-responsive">
        <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#ProjectTeam">Add Project Members</button>
            @include('submission-details.project-teams.create')
            <table id="example1" class="table table-hover table-bordered table-sm">
            <thead class="table-info">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            @foreach($teamMembers as $member)
            <tbody>
              <tr>
                <td class="align-middle">{{ $loop->iteration }}.</td>
                <td>{{ $member->member_name }}</td>
                <td>{{ $member->role }}</td>
                <td>
                  <a href="{{ route('submission-details.project-teams.edit', $member->id) }}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $member->id }}">
                      <i class="fas fa-edit"></i>
                  </a>
                  <div class="modal fade" id="editModal{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $member->id }}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModal{{ $member->id }}Label">Edit Project Team Member</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="{{ route('submission-details.project-teams.update', $member->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <!-- Input fields for editing -->
                                    <div class="form-group">
                                        <label for="edit_member_name">Name:</label>
                                        <input type="text" class="form-control" id="edit_member_name{{ $member->id }}" name="member_name" value="{{ $member->member_name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_role">Role:</label>
                                        <select class="form-control" id="edit_role{{ $member->id }}" name="role" required>
                                            <option disabled>Select Role</option>
                                            <option{{ $member->role === 'Project Leader' ? ' selected' : '' }}>Project Leader</option>
                                            <option{{ $member->role === 'Database Designer' ? ' selected' : '' }}>Database Designer</option>
                                            <option{{ $member->role === 'Network Designer' ? ' selected' : '' }}>Network Designer</option>
                                            <option{{ $member->role === 'UI Designer' ? ' selected' : '' }}>UI Designer</option>
                                            <option{{ $member->role === 'Quality Assurance' ? ' selected' : '' }}>Quality Assurance</option>
                                            <option{{ $member->role === 'Document Writer' ? ' selected' : '' }}>Document Writer</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger" onclick="confirmDelete('{{ route('submission-details.project-teams.destroy', $member->id) }}')">
                  <i class="fas fa-trash"></i>
                </button>

                </td>
              </tr>
            </tbody>
          @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
<!-- </div> -->

<div id="status-form" class="mt-4" style="display: none;">
<div class="col-md-12">
  <div class="card card-primary card-outline">
    <div class="card-header">
            STATUS
      </h3>
    </div>
    <div class="card-body pad table-responsive">
     <div class="container"><h3>Edit Project Status</h3>
      <form action="{{ route('projects.updateStatus', ['id' => $records->id]) }}" method="POST">
          @csrf
          @method('PUT')
          <!-- Other form fields... -->
          <input type="hidden" name="project_id" value="{{ $records->id }}">
          <div class="form-group">
              <label for="status">Status</label>
              <select class="form-control" id="status" name="status" required>
                  <option value="New">New</option>
                  <option value="Draft">Draft</option>
                  <option value="Under Evaluation">Under Evaluation</option>
                  <option value="For Revision">For Revision</option>
                  <option value="Approved">Approved</option>
                  <option value="Deferred">Deferred</option>
                  <option value="Disapproved">Disapproved</option>
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Update Status</button>
      </form>

    </div>
    </div>
  </div>
</div>
</div>

<div id="reviewer-form" class="mt-4" style="display: none;">
<div class="col-md-12">
  <div class="card card-primary card-outline">
    <div class="card-header">
            REVIEWER
      </h3>
    </div>
    <div class="card-body pad table-responsive">
    <div class="container">
        <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#ReviewerModal">Select Reviewer</button>
            @include('submission-details.reviews.select-reviewer')
            
    </div>
    </div>
  </div>
</div>
</div>
        
        <div id="review-form" class="mt-4" style="display: none;">
          <!-- Form fields go here -->
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                Review
              </div>
              <div class="card-body pad table-responsive text-left">
                <div class="col-lg-12">
                  <div class="card shadow mb-4">
                      <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Review Decision</h6>
                      </div>
                      <div class="card-body">
                          <h3>{{ $records->projname }}</h3>
                          <p>comments</p>
                      </div>
                  </div>
              </div>
              <div class="text-center">
                <form action="{{ route('reviews.review-decision.store', ['id' => $records->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <!-- Other form fields... -->
                    <input type="hidden" name="project_id" value="{{ $records->id }}">
  
                    <button value="Accepted" type="submit" name="decision" class="btn btn-info">
                        <i class="fas fa-check-circle mr-2"></i>Accepted
                    </button>
                    <button value="Accepted with Revision" type="submit" name="decision" class="btn btn-warning">
                        <i class="fas fa-edit mr-2"></i>Accepted with Revision
                    </button>
                    <button value="Rejected" type="submit" name="decision" class="btn btn-danger">
                        <i class="fas fa-times-circle mr-2"></i>Rejected
                    </button>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>







</div>
@endsection