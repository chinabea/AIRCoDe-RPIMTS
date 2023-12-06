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
                                <h3 class="card-title my-1"><i class="nav-icon fas fa-comments"></i> Messages</h3>
                            </div>
                            <div class="card-body">
                                <table id="example4" class="table table-hover table-bordered table-sm text-center">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Action(s)</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        @foreach ($messages as $message)
                                            @if ($message->sender->id == auth()->id() || $message->recipient->id == auth()->id())
                                                @if ($message->sender->id == auth()->id())
                                                        <tr>
                                                            <td class="font-weight-bold">{{ $message->sender->name }}</td>
                                                            <td>{{ $message->content }}</td>
                                                            <td>{{ $message->created_at->diffForHumans() }}</td>
                                                            <td>show, delete, reply</td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td class="font-weight-bold">{{ $message->sender->name }}</td>
                                                            <td>{{ $message->content }}</td>
                                                            <td>{{ $message->created_at->diffForHumans() }}</td>
                                                            <td>
                                                                <div class="btn-group align-middle" role="group"
                                                                    aria-label="Basic example">
                                                                    <a href="{{ route('messages.show', $message->id) }}"
                                                                        type="button" class="btn btn-secondary">
                                                                        <i class="fas fa-info-circle"></i>
                                                                    </a>


                                                                    {{-- MAKE THIS AS ARCHIVE --}}
                                                                    <button class="btn btn-danger">
                                                                        <i class="fas fa-trash"> </i>
                                                                    </button>

                                                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                                        aria-labelledby="dropdownMenuLink">
                                                                        <div class="dropdown-header">Dropdown Header:</div>
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item" href="#">Another action</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="#">Something else
                                                                            here</a>
                                                                    </div>
                                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                                        data-toggle="dropdown">
                                                                        <i class="fas fa-ellipsis-h"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                @endif
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    @if (session('success'))
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
