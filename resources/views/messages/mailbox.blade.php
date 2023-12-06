@extends('layouts.template')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
        </section>

        <div class="col-md-12">
            <a href="{{ route('messages.compose') }}" class="btn btn-primary btn-block mb-3"><i
                    class="fas fa-edit nav-icon"></i> Compose</a>
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Inbox</h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                 
                <div class="mailbox-controls d-flex justify-content-center">
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                        <i class="far fa-square"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm">
                            <i class="fas fa-reply"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm">
                            <i class="fas fa-share"></i>
                        </button>
                    </div>
                    <button type="button" class="btn btn-default btn-sm">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </div>

                    <div class="card-body table-responsive mailbox-messages">
                        <table id="example5" class="table table-hover table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th class="text-center">Check</th>
                                  <!-- <th>Star</th> -->
                                  <th class="text-center">Name</th>
                                  <th class="text-center">Message</th>
                                  <!-- <th>Attachment</th> -->
                                  <th class="text-center">Created</th>
                              </tr>
                          </thead>
                            <tbody>
                                @foreach ($conversations as $message)
                                    <tr>
                                        <td>
                                            <div class="icheck-primary d-flex justify-content-center">
                                                <input type="checkbox" value="" id="check{{ $loop->iteration }}">
                                                <label for="check{{ $loop->iteration }}"></label>
                                            </div>
                                        </td>
                                        <!-- <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td> -->
                                        <td>
                                            <a href="{{ route('messages.read-mail', ['id' => $message->id]) }}">
                                                @if ($message->sender->id == auth()->id())
                                                    To: {{ $message->recipient->name }}
                                                @else
                                                    {{ $message->sender->name }}
                                                @endif
                                            </a>
                                        </td>
                                        <td class="mailbox-subject">
                                            <!-- <b>{{ strlen($message->subject) > 18 ? substr($message->subject, 0, 18) . '...' : $message->subject }}</b> -->
                                            <b>{!! Str::limit(htmlspecialchars(strip_tags($message->subject)), 18, '...') !!}</b>
                                            -
                                            <!-- {{ strlen($message->content) > 95 ? substr($message->content, 0, 95) . '...' : $message->content }} -->
                                            {!! Str::limit(htmlspecialchars(strip_tags($message->content)), 95, '...') !!}
                                        </td>
                                        <!-- <td class="mailbox-attachment"></td> -->
                                        <td class="mailbox-date text-center">
                                            @if ($message->created_at->isYesterday())
                                                Yesterday
                                            @elseif ($message->created_at->isToday())
                                                {{ $message->created_at->format('g:i A') }}
                                            @else
                                                @if ($message->created_at->year == now()->year)
                                                    {{ $message->created_at->format('M j') }}
                                                @else
                                                    {{ $message->created_at->format('M j, Y') }}
                                                @endif
                                            @endif
                                        </td>
                                      </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer p-0">
                <div class="mailbox-controls d-flex justify-content-center">
    <!-- Check all button -->
    <button type="button" class="btn btn-default btn-sm checkbox-toggle">
        <i class="far fa-square"></i>
    </button>
    <div class="btn-group">
        <button type="button" class="btn btn-default btn-sm">
            <i class="far fa-trash-alt"></i>
        </button>
        <button type="button" class="btn btn-default btn-sm">
            <i class="fas fa-reply"></i>
        </button>
        <button type="button" class="btn btn-default btn-sm">
            <i class="fas fa-share"></i>
        </button>
    </div>
    <button type="button" class="btn btn-default btn-sm">
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
@endsection
