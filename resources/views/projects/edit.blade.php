
    <!-- <form action="{{ route('projects.storeReviewer') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="projname">Project Title</label>
            <input type="text" name="projname" id="projname" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="reviewers">Project Reviewers</label>
            <select name="reviewers[]" id="reviewers" class="form-control custom-select" multiple>
                <option disabled>Select reviewers</option>
                @foreach ($reviewers as $reviewer)
                    <option value="{{ $reviewer->id }}" data-project-id="{{ $reviewer->project_id }}">{{ $reviewer->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Project</button>
    </form> -->

    <!-- projects/edit.blade.php -->
@extends('layouts.template')
@section('title', 'Edit Project')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layouts.topnav')
        @include('layouts.sidebar')

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            {{-- <h1>Edit Project</h1> --}}
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
                                {{-- <div class="card-header">
                                    <h3 class="card-title">General</h3>
                                </div> --}}
                                <div class="card-body">
                                    <h1>Edit Research Project</h1>
                                    <p>Please update the following information:</p>
                                    <form action="{{ route('projects.update', ['project' => $project->id]) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <!-- Rest of the form fields and content as in the original create form -->

                                        <!-- Pre-fill the form fields with existing project data -->
                                        <div class="form-group">
                                            <label for="projname">Project Name</label>
                                            <input type="text" id="projname" name="projname" class="form-control"
                                                value="{{ $project->projname }}">
                                        </div>

                                        <!-- Add other form fields here with their respective values -->

                                        <!-- Submit and Cancel buttons -->
                                        <a href="#" class="btn btn-secondary">Cancel</a>
                                        <input type="submit" value="Update Project" class="btn btn-success float-right">
                                    </form>
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

