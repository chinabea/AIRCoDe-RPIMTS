@extends('layouts.template')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <div class="col-md-12">
            <a href="{{ route('messages.mailbox') }}" class="btn btn-primary btn-block mb-3"><i class="fas fa-reply"></i> Back
                to Inbox</a>

            <div class="card card-outline">
                <div class="card-header">
                    <h3 class="card-title">Compose New Message</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('messages.store') }}" method="POST" id="message">
                        @csrf
                        <div class="form-group">
                        <select name="recipient_id" id="recipient_id" class="selectpicker form-control" data-live-search="true">
                            <option value="">Select Recipient</option>
                            @foreach ($users as $user)
                                @if ($user->id != Auth::user()->id)
                                    <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                                @endif
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="subject" name="subject" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea id="content" name="content" class="form-control" style="height: 300px"></textarea>
                        </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i>
                                    Draft</button>
                                <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                            </div>
                            <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    @if (session('success'))
        <script>
            toastr.success('{{ session('success') }}');
        </script>
    @elseif(session('delete'))
        <script>
            toastr.delete('{{ session('delete') }}');
        </script>
    @elseif(session('message'))
        <script>
            toastr.message('{{ session('message') }}');
        </script>
    @elseif(session('error'))
        <script>
            toastr.error('{{ session('error') }}');
        </script>
    @endif
@endsection
