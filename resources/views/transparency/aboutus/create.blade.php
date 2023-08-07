@extends('layouts.template')
@section('title', 'For Revision')

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
                  <h3 class="card-title">About</h3>
                </div>
                <div class="card-body">
                <form action="{{ route('transparency.aboutus.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <br>
                    <div class="form-group">
                    <label for="title">Title</label>
                    <textarea class="form-control" id="title" name="title" class="form-control" ></textarea>
                    </div>
                    <div class="form-group">
                    <label for="title">Content</label>
                    <textarea class="form-control" rows="3" id="content" name="content" class="form-control" ></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    </div>

    @endsection



























