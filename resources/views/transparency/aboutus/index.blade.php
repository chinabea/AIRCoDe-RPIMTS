@extends('layouts.template')
@section('title', 'Abouts Lists')

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
                <h3 class="card-title">Abouts List</h3>
              </div>
              <div class="card-body">
                <a href="{{ route('transparency.aboutus.create') }}" class="btn btn-primary">Add Abouts</a>

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
                      <th>Title</th>
                      <th>Content</th>
                      <th>Action(s)</th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($records as $record)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $record->title }}</td>
                                <td class="align-middle">{{ $record->content }}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('transparency.aboutus.show', $record->id) }}" type="button" class="btn btn-secondary">Details</a>
                                        <a href="{{ route('transparency.aboutus.edit', $record->id) }}"  type="button" class="btn btn-warning">Edit</a>

                                        <button class="btn btn-danger m-0" onclick="confirmDelete('{{ route('transparency.aboutus.destroy', $record->id) }}')">Delete</button>

                                        <script>
                                        function confirmDelete(url) {
                                            if (confirm('Delete?')) {
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
                        <th>Title</th>
                        <th>Content</th>
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
    </div>


    @endsection
