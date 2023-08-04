@extends('layouts.template')
@section('title', 'Dashboard')

@section('content')

  <div class="content-wrapper">
    <section class="content-header">
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header clearfix">
                <h3 class="card-title">For Review</h3>
              </div>
              <div class="card-body">
              <div class="table-responsive">
                content
              </div>
            </div>

            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>


          </div>
        </div>
      </div>
    </section>
  </div>
  </div>


  @endsection
