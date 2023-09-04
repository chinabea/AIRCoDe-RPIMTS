@extends('layouts.template')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Contact Us</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                @if(Session::has('message_sent'))
                <div class="alert alert-success">
                    {{ Session::get('message_sent') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" id="inputName" class="form-control" name="name" required />
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">E-Mail</label>
                                <input type="email" id="inputEmail" class="form-control" name="email" required />
                            </div>
                            <div class="form-group">
                                <label for="inputSubject">Subject</label>
                                <input type="text" id="inputSubject" class="form-control" name="subject" required />
                            </div>
                            <div class="form-group">
                                <label for="inputMessage">Message</label>
                                <textarea id="inputMessage" class="form-control" rows="4" name="message" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Contact Information</h2>
                        <p class="lead">123 Testing Ave, Testtown, 9876 NA</p>
                        <p>Phone: +1 234 56789012</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
