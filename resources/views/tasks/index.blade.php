@extends('layouts.template')
@section('title', 'For Revision')

@section('content')
  <div class="content-wrapper">
    <section class="content-header">
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- <div class="card-header clearfix">
                <h3 class="card-title">For Review</h3>
              </div> -->
              <div class="card-body">
              <div class="table-responsive">
        <h1>Task Index</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
        <table class="table table-bordered table-hover" id="example1" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Deadline</th>
                    <th>Assigned To</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->start_date }}</td>
                        <td>{{ $task->end_date }}</td>
                        <td>{{ $task->assignedTo->name }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('tasks.delete', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete?')">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
              </div>
            </div>

            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>


          </div>
        </div>
      </div>
    </section>
  </div>
  </div>


  @endsection
