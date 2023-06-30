@extends('layouts.template')
@section('title', 'Update Project')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('layouts.topnav')
@include('layouts.sidebar')
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            {{-- <h1>Data Tables</h1> --}}
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
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Project</h3>
            </div>
            <div class="card-body">

            <form action="/editprojects/{{$projects->id}}" method="post">
                @method('PUT')
                    @csrf
                <br>
                <div class="form-group">
                <label for="title">Title</label>
                <textarea class="form-control" rows="2" id="title" name="title" class="form-control" value={{$projects->title}}></textarea>
                </div>
                <br><br>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-control">
                                <option value="New">New</option>
                                <option value="Draft">Draft</option>
                                <option value="Under Evaluation">Under Evaluation</option>
                                <option value="For Revision">For Revision</option>
                                <option value="Approved">Approved</option>
                                <option value="Deferred">Deferred</option>
                                <option value="Disapproved">Disapproved</option>
                            </select>
                        </div>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#status').change(function() {
                                    var status = $(this).val();
                                    var documentId = {{ $document->id }};

                                    $.ajax({
                                        url: '/documents/' + documentId,
                                        type: 'PUT',
                                        data: {
                                            status: status,
                                        },
                                        success: function(response) {
                                            console.log('Status updated successfully.');
                                        },
                                        error: function(xhr) {
                                            console.log('Error updating status.');
                                        }
                                    });
                                });
                            });
                        </script>
                    <div class="form-group">
                <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" rows="2" id="content" name="content" class="form-control" value={{$projects->content}} ></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <br>
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
































