

@extends('layouts.template')

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
                            <h3 class="card-title text-center"> Messages</h3>
                        </div>
                        <div class="card-body">
                            @foreach ($messages as $message)
                                @if ($message->sender->id == auth()->id() || $message->recipient->id == auth()->id())
                                    @if ($message->sender->id == auth()->id())
                                        <div class="direct-chat-msg right">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-right"> {{ $message->sender->name }}</span>
                                                <span class="direct-chat-timestamp float-left"> {{ $message->created_at }}</span>
                                            </div>
                                            
                                            <img class="direct-chat-img" src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="message user image">
                                            <div class="direct-chat-text bg-warning"> {{ $message->content }} </div>  
                                        </div>
                                    @else
                                        <div class="direct-chat-msg left">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-left"> {{ $message->sender->name }}</span>
                                                <span class="direct-chat-timestamp float-right"> {{ $message->created_at }}</span>
                                            </div>
                                            
                                            <img class="direct-chat-img" src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="message user image">
                                            <div class="direct-chat-text"> {{ $message->content }} </div>  
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                        <div class="card-footer">
                            <form action="#" method="post">
                            <div class="input-group">
                                <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                <span class="input-group-append">
                                <button type="button" class="btn btn-warning">Send</button>
                                </span>
                            </div>
                            </form>
                        </div>
                        
                        <form id="replyForm" action="{{ route('messages.store') }}" method="POST" class="mt-3" style="display: none;">
                        @csrf
                        <input type="hidden" name="recipient_id" value="{{ $message->recipient_id }}">
                          <div class="form-group">
                            <label for="content">Your Reply:</label>
                            <textarea class="form-control" id="content" name="content" rows="4"></textarea>
                          </div>
                          <button type="cancel" class="btn btn-secondary" name="cancel"> Cancel</button>
                          <button type="submit" class="btn btn-success">Submit Reply</button>
                        </form>
                        </div>
                        <div class="card-footer">
                          <button type="submit"  id="showReplyFormBtn" class="btn btn-primary float-right"><i class="fas fa-reply"></i> Reply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
  $(document).ready(function(){
    $("#showReplyFormBtn").click(function(){
      $(this).hide(); // Hide the reply button
      $("#replyForm").show();
    });
  });
</script>

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

