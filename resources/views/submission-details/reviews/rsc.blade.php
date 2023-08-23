@extends('layouts.template')
@section('title', 'Make Recommendations, Suggestions and Comments')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
    </section>
        <section class="content">


            <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <!-- /.col -->
                  <div class="col-md-9">
                    <div class="card card-primary card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Read Mail</h3>

                        <div class="card-tools">
                          <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                          <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                        <!-- /.mailbox-read-info -->
                        <div class="mailbox-controls with-border text-center">
                          <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm" data-container="body" title="Delete">
                              <i class="far fa-trash-alt"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm" data-container="body" title="Reply">
                              <i class="fas fa-reply"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm" data-container="body" title="Forward">
                              <i class="fas fa-share"></i>
                            </button>
                          </div>
                          <!-- /.btn-group -->
                          <button type="button" class="btn btn-default btn-sm" title="Print">
                            <i class="fas fa-print"></i>
                          </button>
                        </div>
                        <!-- /.mailbox-controls -->
                        <div class="mailbox-read-message">

                            <div class="page-break"></div>

                            <div style="text-align: center;">
                                {{-- <h1>Chapter 2</h1> --}}
                                {{-- <h1>REVIEW OF RELATED LITERATURE AND SYSTEMS </h1> --}}
                            </div>

                            <label>Project Name</label>
                                <p>{{ $data->projname }}</p>

                            <label>Status</label>
                                <p>{{ $data->status }}</p>

                            <label>Research Group</label>
                                <p>{{ $data->researchgroup }}</p>

                            <label>Author(s)</label>
                                <p>{{ $data->authors }}</p>

                            <label>Introduction</label>
                                <p>{{ $data->introduction }}</p>

                            <label>Aims and Objectives</label>
                                <p>{{ $data->aims_and_objectives }}</p>

                            <label>Background</label>
                                <p>{{ $data->background }}</p>

                            <label>Expected Research Contribution</label>
                                <p>{{ $data->expected_research_contribution }}</p>

                            <label>The Proposed Methodology</label>
                                <p>{{ $data->proposed_methodology }}</p>

                            <label>Start Date</label>
                                <p>{{ $data->start_date }}</p>

                            <label>End Date</label>
                                <p>{{ $data->end_date }}</p>

                            <label>Work Plan</label>
                                <p>{{ $data->workplan }}</p>

                            <label>Resources</label>
                                <p>{{ $data->resources }}</p>

                            <label>References</label>
                                <p>{{ $data->references }}</p>


                        </div>
                        <!-- /.mailbox-read-message -->
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer bg-white">
                        <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                          <li>
                            <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

                            <div class="mailbox-attachment-info">
                              <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> Sep2014-report.pdf</a>
                                  <span class="mailbox-attachment-size clearfix mt-1">
                                    <span>1,245 KB</span>
                                    <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                  </span>
                            </div>
                          </li>
                          <li>
                            <span class="mailbox-attachment-icon"><i class="far fa-file-word"></i></span>

                            <div class="mailbox-attachment-info">
                              <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> App Description.docx</a>
                                  <span class="mailbox-attachment-size clearfix mt-1">
                                    <span>1,245 KB</span>
                                    <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                  </span>
                            </div>
                          </li>
                          <li>
                            <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo1.png" alt="Attachment"></span>

                            <div class="mailbox-attachment-info">
                              <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo1.png</a>
                                  <span class="mailbox-attachment-size clearfix mt-1">
                                    <span>2.67 MB</span>
                                    <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                  </span>
                            </div>
                          </li>
                          <li>
                            <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo2.png" alt="Attachment"></span>

                            <div class="mailbox-attachment-info">
                              <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo2.png</a>
                                  <span class="mailbox-attachment-size clearfix mt-1">
                                    <span>1.9 MB</span>
                                    <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                  </span>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <!-- /.card-footer -->
                      <div class="card-footer">
                        <div class="float-right">
                          <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                          <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                        </div>
                        <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                        <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <a href="mailbox.html" class="btn btn-primary btn-block mb-3">Reviews</a>

                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Reviewer Name: Date: Time:</h3>

                      </div>
                      <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                          <li class="nav-item active">
                            <a href="#" class="nav-link">
                              <i class="fas fa-inbox"></i> Comments[1]: Expected Research ContributionExpected Research Contribution
                            </a>
                          </li>

                        </ul>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Labels</h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
              </section>
        </section>
  </div>
@endsection
