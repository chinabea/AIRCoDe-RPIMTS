
@extends('layouts.template')

@section('content')

<div class="card direct-chat direct-chat-primary" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
      <h3 class="card-title">Direct Message </h3>

      <div class="card-tools">
        <span title="3 New Messages" class="badge badge-primary"> 3</span>
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
          <i class="fas fa-comments"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>

    <div class="card-body">
      <!-- Conversations are loaded here -->

    <div class="direct-chat-messages">
        @foreach ($ascMessages as $message)
            @if ($message->sender->id == auth()->id() || $message->recipient->id == auth()->id())
                <!-- Message. Default to the left -->
                @if ($message->sender->id == auth()->id())
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">{{ $message->sender->name }}</span>
                            <span class="direct-chat-timestamp float-left">{{ $message->created_at->diffForHumans()}}</span>
                        </div>
                        <img class="direct-chat-img" src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="message user image">
                        <div class="direct-chat-text">
                            {{ $message->content }}
                        </div>
                    </div>
                @else
                    <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">{{ $message->sender->name }}</span>
                            <span class="direct-chat-timestamp float-right">{{ $message->created_at->diffForHumans()}}</span>
                        </div>
                        <img class="direct-chat-img" src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="message user image">
                        <div class="direct-chat-text">
                            {{ $message->content }}
                        </div>
                    </div>
                @endif
            @endif
        @endforeach
    </div>

      </div>
      <!--/.direct-chat-messages-->

      <!-- Contacts are loaded here -->
      <div class="direct-chat-contacts">
        <ul class="contacts-list">



    @foreach ($descMessages as $message)
        @if ($message->sender->id == auth()->id() || $message->recipient->id == auth()->id())
            <li>
                <a href="{{ route('messages.show', $message->id) }}">
                    {{-- <img class="contacts-list-img" src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar"> --}}
                    <div class="contacts-list-info">
                        <span class="contacts-list-name">
                            @if ($message->sender->id == auth()->id())
                                <strong>{{ $message->recipient->name }}</strong> <br>
                            @else
                                <strong>{{ $message->sender->name }}</strong> <br>
                            @endif
                            <small class="contacts-list-date float-right">{{ $message->created_at->diffForHumans()}}</small>
                        </span>
                        <span class="contacts-list-msg">
                            @if ($message->sender->id == auth()->id())
                                <strong>You:</strong>
                            @endif
                            {{ $message->content }}
                        </span>
                    </div>
                    <!-- /.contacts-list-info -->
                </a>
            </li>
        @endif
    @endforeach

          <!-- End Contact Item -->
        </ul>
        <!-- /.contacts-list -->
      </div>
      <!-- /.direct-chat-pane -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <form id="message-form" action="{{ route('messages.store') }}" method="post">
        @csrf
        <div class="input-group">
          <input type="text" name="content" id="content" placeholder="Type Message ..." class="form-control" required>
          <span class="input-group-append">
            <button type="submit" class="btn btn-primary">Send</button>
          </span>
        </div>
      </form>
    </div>
    <!-- /.card-footer-->
  </div>


  @endsection
