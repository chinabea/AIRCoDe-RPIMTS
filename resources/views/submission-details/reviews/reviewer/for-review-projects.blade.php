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

                                <button type="button" class="btn bg-navy color-palette float-right btn-sm" data-toggle="modal" data-target="#projectsPdf" data-backdrop="static" data-keyboard="false"> 
                                    <i class="fas fa-file-pdf"></i> Export to PDF</button> 
                                    @include('reports.report-options')
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover text-center table-sm">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">#</th>
                                            <th class="align-middle">Reviewer</th>
                                            <th class="align-middle">Title</th>
                                            <th class="align-middle">Review Date</th>
                                            <th class="align-middle">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $counter = 0;
                                    @endphp
                                        @foreach ($projects as $record)
                                            @if (
                                                (in_array(auth()->user()->role, [1, 2, 4]) && $record->status !== 'Draft') ||
                                                    $record->user_id === auth()->user()->id)   
                                            @php
                                                $counter++;
                                            @endphp
                                                <tr>
                                                    <td>Name</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="align-middle">#</th>
                                            <th class="align-middle">Reviewer</th>
                                            <th class="align-middle">Title</th>
                                            <th class="align-middle">Review Date</th>
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
