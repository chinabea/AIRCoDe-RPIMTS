@extends('layouts.template')

@section('content')
  <div class="content-wrapper">
    <section class="content-header">
    </section>
    <section class="content">
      <div class="card">
        <div class="card-body row">
          <div class="col-5 text-center d-flex align-items-center justify-content-center">
            <div class="">
              <h2><strong>Contact Us</strong></h2>
              <p class="lead mb-5">123 Testing Ave, Testtown, 9876 NA<br>
                Phone: +1 234 56789012
              </p>
            </div>
          </div>
          @if(Session::has('message_sent'))
          <div class="alert alert-success" role="alert">
            {{ Session::get('message_sent') }}
          </div>
          @endif
          <div class="col-7">
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
            <!-- <div class="form-group">
              <label for="inputName">Name</label>
              <input type="text" id="inputName" class="form-control" name="name"/>
            </div> -->
            <div class="form-group">
              <label for="inputEmail">E-Mail</label>
              <input type="email" id="inputEmail" class="form-control" name="email" />
            </div>
            <div class="form-group">
              <label for="inputSubject">Subject</label>
              <input type="text" id="inputSubject" class="form-control" name="subject"/>
            </div>
            <div class="form-group">
              <label for="inputMessage">Message</label>
              <textarea id="inputMessage" class="form-control" rows="4" name="message" ></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Send message">
            </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection