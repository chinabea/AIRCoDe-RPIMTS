    <div class="direct-chat-messages">
        @foreach ($allMessages as $message)
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
