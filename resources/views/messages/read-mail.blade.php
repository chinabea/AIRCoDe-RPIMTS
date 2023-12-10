@extends('layouts.template')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
        </section>

        <div class="col-md-12">
            <a href="{{ route('messages.mailbox') }}" class="btn btn-primary btn-block mb-3"><i class="fas fa-reply"></i> Back
                to Inbox</a>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Read Mail</h3>

                    <div class="card-tools">
                        <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                        <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                @foreach ($conversations as $message)
                    <div class="card-body p-0">
                        <div class="mailbox-read-info">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5 class="font-weight-bold">{{ $message->subject }}</h5>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm" data-container="body"
                                                title="Delete">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm" data-container="body"
                                                title="Reply">
                                                <i class="fas fa-reply"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm" data-container="body"
                                                title="Forward">
                                                <i class="fas fa-share"></i>
                                            </button>
                                        </div>
                                        <button type="button" class="btn btn-default btn-sm" title="Print">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <h6>
                                @if ($message->sender->id == auth()->id())
                                    To: {{ $message->recipient->name }} - {{ $message->recipient->email }}
                                @else
                                    From: {{ $message->sender->name }} - {{ $message->sender->email }}
                                @endif
                                <span
                                    class="mailbox-read-time float-right my-2">{{ $message->created_at->format('M j, Y, g:i A') }}</span>
                            </h6>
                        </div>
                        <div class="mailbox-read-message" style="padding: 20px;">
                            <div id="message-content-preview-{{ $message->id }}">
                                {!! Str::limit(strip_tags($message->content), 190, '...') !!}
                            </div>
                            <div id="message-content-full-{{ $message->id }}" style="display: none;">
                                {!! $message->content !!}
                            </div>

                            <button class="toggle-message-content btn btn-link" style="padding: 10px;"
                                data-message-id="{{ $message->id }}">
                                Show More
                            </button>
                        </div>

                        <hr>
                    </div>
                @endforeach
                 <div class="card-footer">
                        <form id="replyForm" action="{{ route('messages.reply') }}" method="POST" class="mt-3" style="display: none;">
                            @csrf
                            <input type="hidden" name="recipient_id" value="{{ $message->recipient_id }}">
                            <div class="form-group">
                                <label for="content">Your Reply:</label>
                                <input class="form-control" id="subject" name="subject"></input>
                                <textarea class="form-control" id="content" name="content"></textarea>
                            </div>
                            <button type="button" class="btn btn-secondary" name="cancel">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit Reply</button>
                        </form>

                        </div>
                        
                <div class="card-footer">
                    <div class="float-right">
                        <button type="submit" id="showReplyFormBtn" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                        <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                    </div>
                    <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                    <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toggleButtons = document.querySelectorAll('.toggle-message-content');

            toggleButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var messageId = button.getAttribute('data-message-id');
                    var previewDiv = document.getElementById('message-content-preview-' +
                    messageId);
                    var fullDiv = document.getElementById('message-content-full-' + messageId);

                    if (previewDiv.style.display === 'none') {
                        previewDiv.style.display = 'block';
                        fullDiv.style.display = 'none';
                        button.textContent = 'Show More';
                    } else {
                        previewDiv.style.display = 'none';
                        fullDiv.style.display = 'block';
                        button.textContent = 'Show Less';
                    }
                });
            });
        });
    </script>
    <script>
    $(document).ready(function(){
        $("#showReplyFormBtn").click(function(){
        $(this).hide(); // Hide the reply button
        $("#replyForm").show();
        });
    });
    </script>
    
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
