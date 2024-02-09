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
                            <h3 class="card-title my-1"><i class="fa fa-users"></i> Users</h3>
                            <button type="button" class="btn bg-navy color-palette float-right btn-sm" data-toggle="modal" data-target="#usersPdf" data-backdrop="static" data-keyboard="false"> 
                                <i class="fas fa-file-pdf"></i> Export to PDF</button>
                                @include('reports.report-options')
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action(s)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($records->count() > 0)
                                    @foreach($records as $user)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $user->name }}</td>
                                        <td class="align-middle">{{ $user->email }}</td>
                                        <td class="align-middle">
                                            @if ($user->role == 1)
                                            Director
                                            @elseif ($user->role == 2)
                                            Staff
                                            @elseif ($user->role == 3)
                                            Researcher
                                            @elseif ($user->role == 4)
                                            Reviewer
                                            @else
                                            Guest
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <!-- <a href="{{ route('users.show', $user->id) }}" type="button"
                                                    class="btn btn-secondary">
                                                    <i class="fas fa-info-circle"></i>
                                                </a> -->
                                                <a href="{{ route('users.edit', $user->id) }}" type="button"
                                                    class="btn btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button class="btn btn-danger" onclick="confirmDelete('{{ route('users.destroy', $user->id) }}')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                              </div>
                                            <div class="btn-group align-middle" role="group" aria-label="Basic example">
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
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
