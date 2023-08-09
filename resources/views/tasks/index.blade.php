@extends('layouts.template')
@section('title', 'All Tasks')

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
                <h3 class="card-title">Task Index</h3>
              </div> -->
              <div class="card-body">
              <div class="table-responsive">
              <h3>Task Index</h3> 
              <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
              <br>
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

            </div>


          </div>
        </div>
      </div>
    </section>
  </div>
  </div>


  @endsection
