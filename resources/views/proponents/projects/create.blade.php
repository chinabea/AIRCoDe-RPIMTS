@extends('layouts.template')

@section('title', 'About Us')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!-- navbar  -->
@include('layouts.topnav')
<!-- / navbar  -->

  <!-- Main Sidebar Container -->
    @include('layouts.researchersidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Content Header (Page header) -->
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
        </div><!-- /.container-fluid -->
      </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Projects</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('proponents.projects.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <br>
                        <div class="form-group">
                        <label for="title">Project Title</label>
                        <textarea class="form-control" rows="2" id="title" name="title" class="form-control" ></textarea>
                        </div>
                        <br><br>
                        <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="2" id="description" name="description" class="form-control" ></textarea>
                        </div>
                        <br>



                        <label for="">Call for Proposals</label>
                        <select name="callforproposals" id="callforproposals" class="form-control" >
                        <option value="">Select</option>
                        <option value="JRP">2023 JRP</option>
                        <option value="YIP">Young Innovators Program (YIP)</option>
                        <option value="PCHRD">PCHRD</option>
                        </select>
                        <br>
                        <label for="">Type of Proposal</label>
                        <select name="typeofproposal" id="typeofproposal" class="form-control" >
                        <option value="">Select</option>
                        <option value="R&D Project">R&D Project</option>
                        <option value="TECHNICOM R&D Project">TECHNICOM R&D Project</option>
                        <option value="NON R&D Project">NON R&D Project</option>
                        </select>
                        <br>
                        <label for="">Proposal Classification</label>
                        <select name="proposalclassification" id="proposalclassification" class="form-control" >
                        <option value="">Select</option>
                        <option value="New Proposal">New Proposal</option>
                        <option value="Resubmitted Proposal">Resubmitted Proposal</option>
                        <option value="Directed Proposal">Directed Proposal</option>
                        </select>
                        <br>
                        <div class="form-group">
                        <label for="comment">Project Title</label>
                        <textarea class="form-control" placeholder="Working title for the project" rows="2" id="comment" name="projecttitle" class="form-control" ></textarea>
                        </div>
                        <br>
                        <label for="">Research Group</label>
                        <input type="text" placeholder="Name of research group" id="groupname" name="groupname" class="form-control" >
                        <br>
                        <label for="">Author(s)</label>
                        <input type="text" placeholder="Names of Author"  id="author" name="author" class="form-control" >
                        <br>
                        <label for="">Introduction</label>
                        <input type="text" placeholder="Briefly describe the key aspects of what you will be investigating."  id="author" name="author" class="form-control" >
                        <br>
                        <div class="form-group">
                        <label for="comment">Aims and Objectives</label>
                        <textarea class="form-control" rows="3" id="comment" name="projecttitle" class="form-control"
                        placeholder="What are the overall aims of the work? What objectives are necessary to meet the aims?"  ></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                        <label for="comment">Background</label>
                        <textarea class="form-control" rows="3" id="comment" name="projecttitle" class="form-control"
                        placeholder="Brief review of literature in the area of interest. Describe what research lyas in the groundwork for your topic."></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                        <label for="comment">Expected Research Contribution</label>
                        <textarea class="form-control" rows="3" id="comment" name="projecttitle" class="form-control"
                        placeholder="Why is the topi/creative work important? Describe how the research may be novel and it's impact on the descipline."></textarea>
                        </div>
                        <br>
                        {{-- equipment --}}
                        <div class="form-group">
                        <label for="comment">The Proposed Methodology</label>
                        <textarea class="form-control" rows="3" id="comment" name="projecttitle" class="form-control"
                        placeholder="Approach or methodology to be used in the research, the materials/equipment you intend to use, your space/laboratory/studio requirements."></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                        <label for="comment">Work Plan</label>
                        <textarea class="form-control" rows="3" id="comment" name="projecttitle" class="form-control"
                        placeholder="An initial plan for completion with annual milestones (eg. over 3 years)."></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                        <label for="comment">Resources</label>
                        <textarea class="form-control" rows="3" id="comment" name="projecttitle" class="form-control"
                        placeholder="Provide details of major resources required for you to carry out your research project. What significant resources are required for the success of your proposed projec? (e.g travel, equipment)."></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                        <label for="">References</label>
                        <textarea class="form-control" rows="3" id="comment" name="projecttitle" class="form-control"
                        placeholder="A short bibliography of the cited literature."></textarea>
                        </div>
                        <br>


                        <!-- <label for="date">Start Date</label>
                        <input type="date" id="startdate" name="startdate" class="form-control" >
                        <br>
                        <label for="date">End Date</label>
                        <input type="date" id="enddate" name="enddate" class="form-control" >
                        <br>  -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>


  </div>
  <!-- /.content-wrapper -->
    @include('layouts.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
</html>






























