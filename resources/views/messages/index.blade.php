{{--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Messages</title>
</head>
<body>
    <p>Chat Messages</p>

    <form action="{{ route('messages.store') }}" method="post">
        @csrf
        <label for="recipient_id">Recipient:</label>
        <select name="recipient_id" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="content">Message:</label>
        <textarea name="content" required></textarea>
        <br>
        <button type="submit">Send</button>
    </form>

    <ul>
        @foreach ($mymessages as $message)
        <br>
                @if ($message->sender->id == auth()->id())
                    <strong>{{ $message->recipient->name }}</strong> <br>
                    <strong>You:</strong>
                @else
                    <strong>{{ $message->user->name }}:</strong>
                @endif
                {{ $message->content }}
                {{ $message->created_at->diffForHumans()}}
                <br>
        @endforeach
    </ul>
</body>
</html>
 --}}

<!-- resources/views/messages/index.blade.php -->



@extends('layouts.template')

@section('content')

<div class="content-wrapper">
  <section class="content-header">
  </section>
    <div class="container mt-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-center align-items-center">
                <i class="fas fa-file-signature fa-2x text-gray-300"></i>
                <h1 class="m-0 ml-3 font-weight-bold">Research Project Form</h1>
            </div>
            <div class="card-body">


            @foreach ($mymessages as $message)
                <br>
                @if ($message->sender->id == auth()->id())
                    <strong>To: {{ $message->recipient->name }}</strong> <br>
                    <strong>You:</strong>
                @else
                    <strong>From: {{ $message->sender->name }}</strong> <br>
                    <strong>{{ $message->user->name }}:</strong>
                @endif
                {{ $message->content }}
                {{ $message->created_at->diffForHumans()}}
                <br>
            @endforeach

            <h2>Compose a New Message:</h2>
            <form action="{{ route('messages.store') }}" method="post">
                @csrf
                <label for="recipient_id">Recipient:</label>
                <select name="recipient_id" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <br>
                <label for="content">Message:</label>
                <textarea name="content" required></textarea>
                <br>
                <button type="submit">Send</button>
            </form>


            </div>
        </div>
    </div>
</div>



@if(session('success'))
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

