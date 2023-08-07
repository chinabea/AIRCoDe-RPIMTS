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
                <h3 class="card-title">About Us</h3>
            </div>
            <div class="card-body">

            <form action="/editaboutus/{{$aboutus->id}}" method="post">
                @method('PUT')
                    @csrf
                <br>
                <div class="form-group">
                <label for="title">Title</label>
                <textarea class="form-control" rows="2" id="title" name="title" class="form-control" value="{{$aboutus->title}}"></textarea>
                </div>
                <br><br>
                <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" rows="2" id="content" name="content" class="form-control" value="{{$aboutus->content}}"></textarea>
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
</div>

@endsection

































