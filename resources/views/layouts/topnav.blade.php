


<!-- <nav class="main-header navbar navbar-expand text-dark @if($theme === 'light') navbar-white navbar-light @elseif($theme === 'dark') navbar-dark @endif shadow"> -->

  {{-- <nav class="main-header navbar navbar-expand navbar-dark"> --}}
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ">
      <li class="nav-item ">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                  </button>
              </div>
          </div>
      </form> -->
    </ul>

    <ul class="navbar-nav ml-auto">


      <li class="nav-item dropdown">
        <a class="nav-link" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="{{ route('notifications') }}">
          <i class="far fa-bell"></i>
          @if(auth()->check())
              <span class="badge badge-warning navbar-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        @if(auth()->check())
          <a href="{{ route('notifications') }}" class="dropdown-item dropdown-header btn">Notifications ({{ auth()->user()->unreadNotifications->count() }})</a>
        @endif
        <div class="dropdown-divider"></div>
        <div style="max-height: 300px; overflow-y: auto;">
        @if (Auth::check())
        @foreach (Auth()->user()->notifications->sortByDesc('created_at') as $notification)
        <a href="{{ route('mark-notification-as-read', ['notification' => $notification->id]) }}" class="dropdown-item">
          <i class="{{ $notification->data['icon'] }}"></i> {{ $notification->data['message'] }}
          <span class="float-right text-muted text-xs">{{ $notification->created_at->diffForHumans() }}</span>
        </a>
        <div class="dropdown-divider"></div>
        @endforeach
        @foreach (Auth::user()->readNotifications as $notification)
        <a href="{{ route('mark-notification-as-read', ['notification' => $notification->id]) }}" class="dropdown-item read-notification">
          <i class="{{ $notification->data['icon'] }}"></i> {{ $notification->data['message'] }}
          <span class="float-right text-muted text-xs">{{ $notification->created_at->diffForHumans() }}</span>
        </a>
        <div class="dropdown-divider"></div>
        @endforeach
        @endif
      </div>
      <div class="dropdown-divider" style="margin-top: 8px; margin-bottom: 8px;"></div>
      <form method="POST" action="{{ route('mark-all-as-read') }}">
        @csrf
        @method('POST')
        <button type="submit" class="btn btn-link dropdown-item dropdown-footer">Mark All as Read</button>
      </form>
    </div>
  </li>

<style>
    .unread-notification {
        background-color: #f3f4f6;
    }

</style>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(Auth::user()->role == 4)
                      Reviewer, {{ Auth::user()->name }} - {{ Auth::user()->email }}
                    @elseif(Auth::user()->role == 3) 
                       Researcher, {{ Auth::user()->name }} - {{ Auth::user()->email }}
                    @elseif(Auth::user()->role == 2)
                        Staff, {{ Auth::user()->name }} - {{ Auth::user()->email }}
                    @elseif(Auth::user()->role == 1)
                        Director, {{ Auth::user()->name }} - {{ Auth::user()->email }}
                    @else
                        {{ Auth::user()->name }} - {{ Auth::user()->email }}
                    @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </a>
            </div>
        </li>
    </ul>
</nav>


