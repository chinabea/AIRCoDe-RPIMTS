@extends('layouts.template')
@section('title', 'Announcements')
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
                <h3 class="card-title">Anouncements List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{ route('transparency.announcements.create') }}" class="btn btn-primary">Add Announcement</a>

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
                      <th>Announcement Title</th>
                      <th>Contents</th>
                      <th>Action(s)</th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($records as $announcement)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $announcement->title }}</td>
                                <td class="align-middle">{{ $announcement->content }}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('transparency.announcements.show', $announcement->id) }}" type="button" class="btn btn-secondary">Details</a>
                                        <a href="{{ route('transparency.announcements.edit', $announcement->id) }}"  type="button" class="btn btn-warning">Edit</a>

                                        <button class="btn btn-danger m-0" onclick="confirmDelete('{{ route('transparency.announcements.destroy', $announcement->id) }}')">Delete</button>

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
                    </tbody>
                    <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Announcement Title</th>
                          <th>Contents</th>
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
