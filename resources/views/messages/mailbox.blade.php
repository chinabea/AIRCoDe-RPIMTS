@extends('layouts.template')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
        </section>

        <div class="col-md-12">
            <a href="{{ route('messages.compose') }}" class="btn btn-primary btn-block mb-3">
                <i class="fas fa-edit nav-icon"></i> Compose
            </a>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Inbox</h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">

                    <div class="mailbox-controls float-left">
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle" id="checkAll">
                            <i class="far fa-square"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm deleteSelectedBtn">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </div>
                        <button type="button" class="btn btn-default btn-sm refreshBtn">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                    </div>

                    <div class="card-body table-responsive mailbox-messages">
                        <table id="example5" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Check</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Message</th>
                                    <th class="text-center">Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- @foreach ($conversations as $message) -->
                                @if ($latestMessage = $message->messages()->latest()->first())
                                    <tr>
                                        <td>
                                            <div class="icheck-primary d-flex justify-content-center">
                                                <label for="check{{ $loop->iteration }}"></label>
                                                <input type="checkbox" value="{{ $message->max_id }}" class="message-checkbox"
                                                    id="check{{ $loop->iteration }}" data-conversation-id="{{ $message->conversation_number }}">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('messages.read-mail', ['id' => $message->max_id]) }}">
                                                <div class="conversation">
                                                    <!-- <h3>Conversation ID: {{ $message->conversation_number }}</h3> -->
                                                    <!-- <strong>{{ $latestMessage->sender->name }}</strong> -->
                                                    
                                                    @if ($latestMessage->sender->id == auth()->id())
                                                        <!-- To:  -->
                                                        <strong>{{ $latestMessage->recipient->name }}</strong>
                                                    @else
                                                        <!-- From:  -->
                                                        <strong>{{ $latestMessage->sender->name }}</strong>
                                                    @endif
                                                </div>
                                            </a>
                                        </td>

                                        <td class="mailbox-subject">
                                        @if ($latestMessage)
                                            <strong>{!! Str::limit(htmlspecialchars(strip_tags($latestMessage->subject)), 18, '') !!}</strong>
                                            - {!! Str::limit(htmlspecialchars(strip_tags($latestMessage->content)), 100, '...') !!}
                                        @endif
                                        </td>
                                        <td class="mailbox-date text-center">
                                            @if ($latestMessage)
                                                @if ($latestMessage->created_at->isYesterday())
                                                    Yesterday
                                                @elseif ($latestMessage->created_at->isToday())
                                                    {{ $latestMessage->created_at->format('g:i A') }}
                                                @else
                                                    @if ($latestMessage->created_at->year == now()->year)
                                                        {{$latestMessage->created_at->format('M j') }}
                                                    @else
                                                        {{$latestMessage->created_at->format('M j, Y') }}
                                                    @endif
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                <!-- @endforeach -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer p-0">
                    <div class="mailbox-controls float-left">
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle" id="checkAll">
                            <i class="far fa-square"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm deleteSelectedBtn">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </div>
                        <button type="button" class="btn btn-default btn-sm refreshBtn">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                    </div>
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

    <script>
        $(document).ready(function () {
            // Handle delete selected conversations
            $('.deleteSelectedBtn').click(function () {
                var selectedConversations = [];

                // Loop through each checked checkbox
                $('.message-checkbox:checked').each(function () {
                    selectedConversations.push($(this).data('conversation-id'));
                });

                // Check if any conversation is selected
                if (selectedConversations.length > 0) {
                    // Ask for confirmation before deleting
                    if (confirm('Are you sure you want to delete selected conversations?')) {
                        // Send an AJAX request to delete selected conversations
                        $.ajax({
                            url: '{{ route('messages.deleteSelected') }}',
                            type: 'POST',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'selected_conversations': selectedConversations
                            },
                            success: function (data) {
                                // Handle success, e.g., show a success message or refresh the page
                                toastr.success(data.message);
                                location.reload(); // You can use more sophisticated approaches like updating the table with JavaScript
                            },
                            error: function (xhr, status, error) {
                                // Handle errors, e.g., show an error message
                                toastr.error('Error deleting conversations: ' + xhr.responseText);
                            }
                        });
                    }
                } else {
                    // If no conversation is selected, show an alert or handle it as you prefer
                    alert('Please select at least one conversation to delete.');
                }
            });

            // Add other scripts as needed
        });
    </script>

    <script>
        $(document).ready(function () {
            // Handle "Check All" button click
            $('#checkAll').click(function () {
                // Toggle the state of all checkboxes
                $('.message-checkbox').prop('checked', function (_, current) {
                    return !current;
                });
            });
        });
    </script>

    <!-- Page specific script -->
    <script>
        $(function () {
            // Enable check and uncheck all functionality
            $('.checkbox-toggle').click(function () {
                var clicks = $(this).data('clicks')
                if (clicks) {
                    // Uncheck all checkboxes
                    $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
                    $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
                } else {
                    // Check all checkboxes
                    $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
                    $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
                }
                $(this).data('clicks', !clicks)
            })

            // Handle starring for font awesome
            $('.mailbox-star').click(function (e) {
                e.preventDefault()
                // detect type
                var $this = $(this).find('a > i')
                var fa = $this.hasClass('fa')

                // Switch states
                if (fa) {
                    $this.toggleClass('fa-star')
                    $this.toggleClass('fa-star-o')
                }
            })
        })
    </script>

    <script>
        $(document).ready(function () {
            // Handle refresh button click
            $('.refreshBtn').click(function () {
                location.reload();
            });

            // Add other scripts as needed
        });
    </script>
@endsection
