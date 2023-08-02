@extends('layouts.template')
@section('title', 'Create Project')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layouts.topnav')
        @include('layouts.sidebar')
        
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            {{-- <h1>Create New Project</h1> --}}
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li> --}}
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <!-- <div class="card-header">
                                    <h3 class="card-title">General</h3>
                                </div> -->
                                <div class="card-body">

                                    @section('contents')
                                    <h1>Project History: {{ $project->projname }}</h1>

                                    <ul>
                                        @foreach ($history as $entry)
                                        <li>
                                            Date: {{ $entry->date }}
                                            <br>
                                            History: {{ $entry->history_text }}
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endsection
