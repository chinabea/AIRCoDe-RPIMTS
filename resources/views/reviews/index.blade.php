@extends('layouts.template')
@section('title', 'Reviews')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include('layouts.topnav')
@include('layouts.sidebar')

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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Reviews List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{ route('reviews.create') }}" class="btn btn-primary">Add Reviews</a>

                <hr />
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Review Date</th>
                      <th>Review Comments</th>
                      <th>Action(s)</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($records->count() > 0)
                            @foreach($records as $review)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $review->reviewdate }}</td>
                                <td class="align-middle">{{ $review->reviewcomments }}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('reviews.show', $review->id) }}" type="button" class="btn btn-secondary">Details</a>
                                        <a href="{{ route('reviews.edit', $review->id) }}"  type="button" class="btn btn-warning">Edit</a>
                                        <!-- <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>  -->


                                        <!-- <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <a type="button" class="btn btn-danger" onclick="return confirm('Delete?')">Delete</a>
                                        </form>  -->


                                        <button class="btn btn-danger m-0" onclick="confirmDelete('{{ route('reviews.destroy', $review->id) }}')">Delete</button>

                                        <script>
                                        function confirmDelete(url) {
                                            if (confirm('Delete?')) {
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
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="5">Record not found!</td>
                                </tr>
                            @endif
                    </tbody>
                    <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Review Date</th>
                          <th>Review Comments</th>
                          <th>Action(s)</th>
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
  @include('layouts.footer')
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
</body>
</html>
