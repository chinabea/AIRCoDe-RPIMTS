<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav ">
      <li class="nav-item ">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

      <!-- Topbar Search -->
      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                  </button>
              </div>
          </div>
      </form>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="{{ route('notifications') }}">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{ route('notifications') }}" class="dropdown-item dropdown-header bg-primary shadow-sm m-0 font-weight-bold btn">Notifications ({{ auth()->user()->unreadNotifications->count() }})</a>
        <div class="dropdown-divider"></div>
        <div style="max-height: 300px; overflow-y: auto;">
        @if (Auth::check())
        @foreach (Auth()->user()->notifications->sortByDesc('created_at') as $notification)
        <!-- @php
        $isUnread = !$notification->read_at;
        $notificationClass = $isUnread ? 'unread-notification' : 'read-notification';
        @endphp -->
        <a href="{{ route('mark-notification-as-read', ['notification' => $notification->id]) }}" class="dropdown-item {{ $notificationClass }}">
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
        background-color: #f3f4f6; /* Bluish background color for unread messages */
    }

    /* .read-notification {
        background-color: #f5f5f5; /* Light background color for read messages */
    } */
</style>

      
      <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 ">{{ Auth::user()->name }}
                    {{-- @if(Auth::user()->role == 4)
                        Reviewer: {{ Auth::user()->name }}
                    @elseif(Auth::user()->role == 3)
                        Researcher: {{ Auth::user()->name }}
                    @elseif(Auth::user()->role == 2)
                        Staff: {{ Auth::user()->name }}
                    @elseif(Auth::user()->role == 1)
                        Director: {{ Auth::user()->name }}
                    @else
                        {{ Auth::user()->name }}
                    @endif --}}
                </span>
                <!-- <img class="img-profile rounded-circle" src="dist/img/user4-128x128.jpg"> -->
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
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
  <!-- /.navbar -->
