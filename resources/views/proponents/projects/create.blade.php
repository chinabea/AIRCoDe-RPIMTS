@extends('layouts.template')
@section('title', 'About Us')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('layouts.topnav')
@include('director.sidebar')


  <div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Create New Project</h1>
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">General</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <form action="{{ route('proponents.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="title">Project Name</label>
                      <input  placeholder="Working title for the project" type="text" id="title" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="description">Research Group</label>
                      <input placeholder="Name of research group" type="text" id="description" name="description" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="inputProjectLeader">Author(s)</label>
                      <input placeholder="Names of Author" type="text" id="inputProjectLeader" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="inputDescription">Introduction</label>
                      <textarea placeholder="Briefly describe the key aspects of what you will be investigating." id="inputDescription" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="inputDescription">Aims and Objectives</label>
                      <textarea placeholder="What are the overall aims of the work? What objectives are necessary to meet the aims?" id="inputDescription" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="inputDescription">Background</label>
                      <textarea placeholder="Brief review of literature in the area of interest. Describe what research lyas in the groundwork for your topic." id="inputDescription" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="inputDescription">Expected Research Contribution</label>
                      <textarea placeholder="Why is the topi/creative work important? Describe how the research may be novel and it's impact on the descipline." id="inputDescription" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="inputDescription">The Proposed Methodology</label>
                      <textarea placeholder="Approach or methodology to be used in the research, the materials/equipment you intend to use, your space/laboratory/studio requirements." id="inputDescription" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Work Plan:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                          </div>
                          <input placeholder="An initial plan for completion with annual milestones (eg. over 3 years)." type="text" class="form-control float-right" id="reservation">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputDescription">Resources</label>
                        <textarea placeholder="Provide details of major resources required for you to carry out your research project. What significant resources are required for the success of your proposed projec? (e.g travel, equipment)." id="inputDescription" class="form-control" rows="4"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="inputDescription">Referencences</label>
                        <textarea placeholder="A short bibliography of the cited literature." id="inputDescription" class="form-control" rows="4"></textarea>
                      </div>
                      <a href="#" class="btn btn-secondary">Cancel</a>
                      <input type="submit" value="Create new Project" class="btn btn-success float-right">
                  </div>
            </form>
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






























