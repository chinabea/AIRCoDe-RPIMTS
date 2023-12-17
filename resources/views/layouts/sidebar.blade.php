
@php
    $role = auth()->user()->role;
@endphp

@if($role === 1)
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('director.home') }}" class="brand-link sidebar-dark-primary">
        <img src="{{ asset('dist/img/systemAIRCoDeLogo.png') }}" alt="AIRCoDe Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">RPIMTS</span>
    </a>
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('director.home') }}"
                        class="nav-link {{ Route::currentRouteName() == 'director.home' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">MAIN MENU</li>
                <li class="nav-item">
                    <a href="{{ route('users') }}"
                        class="nav-link {{ Route::currentRouteName() == 'users' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users mr-2"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('projects') }}"
                        class="nav-link {{ Route::currentRouteName() == 'projects' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Projects
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('status.under-evaluation') }}"
                        class="nav-link {{ Route::currentRouteName() == 'status.under-evaluation' ? 'active' : '' }}">
                        <i class="fas fa-hourglass-half nav-icon"></i>
                        <p>Under Evaluation</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('status.for-revision') }}"
                        class="nav-link {{ Route::currentRouteName() == 'status.for-revision' ? 'active' : '' }}">
                        <i class="fas fa-edit nav-icon"></i>
                        <p>For Revision</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{ route('status.deferred') }}"
                        class="nav-link {{ Route::currentRouteName() == 'status.deferred' ? 'active' : '' }}">
                        <i class="far fa-pause-circle nav-icon"></i>
                        <p>Deferred</p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="{{ route('status.approved') }}"
                        class="nav-link {{ Route::currentRouteName() == 'status.approved' ? 'active' : '' }}">
                        <i class="far fa-check-circle nav-icon"></i>
                        <p>Approved</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('status.disapproved') }}"
                        class="nav-link {{ Route::currentRouteName() == 'status.disapproved' ? 'active' : '' }}">
                        <i class="far fa-times-circle nav-icon"></i>
                        <p>Disapproved</p>
                    </a>
                </li>
                </li>
                <li class="nav-header">TRANSPARENCY</li>
                <li class="nav-item">
                    <a href="{{ route('messages.mailbox') }}" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Messages</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('call-for-proposals') }}"
                        class="nav-link {{ Route::currentRouteName() == 'call-for-proposals' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>Call for Proposals</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('access-requests') }}"
                        class="nav-link {{ Route::currentRouteName() == 'access-requests' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-key"></i>
                        <p>Access Request</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{ route('reports') }}"
                        class="nav-link {{ Route::currentRouteName() == 'reports' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-trash"></i>
                        <p> Archived</p>
                    </a>
                </li> -->
                <li class="nav-header">SETTINGS</li>
                <li class="nav-item">
                    <a id="theme-toggle" class="nav-link">
                        <i class="nav-icon fas fa-adjust"></i>
                        <p>Toggle Theme</p>
                    </a>
                </li>
    </div>
</aside>



@elseif($role === 2)
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('staff.home') }}" class="brand-link sidebar-dark-primary">
        <img src="{{ asset('dist/img/systemAIRCoDeLogo.png') }}" alt="AIRCoDe Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">RPIMTS</span>
    </a>
    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('staff.home') }}"
                        class="nav-link {{ Route::currentRouteName() == 'staff.home' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">MAIN MENU</li>
                <li class="nav-item">
                    <a href="{{ route('users') }}"
                        class="nav-link {{ Route::currentRouteName() == 'users' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users mr-2"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('projects') }}"
                        class="nav-link {{ Route::currentRouteName() == 'projects' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Projects
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('status.under-evaluation') }}"
                        class="nav-link {{ Route::currentRouteName() == 'status.under-evaluation' ? 'active' : '' }}">
                        <i class="fas fa-hourglass-half nav-icon"></i>
                        <p>Under Evaluation</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('submission-details.reviews.for-reviews') }}"
                        class="nav-link {{ Route::currentRouteName() == 'submission-details.reviews.for-reviews' ? 'active' : '' }}">
                        <i class="fas fa-edit nav-icon"></i>
                        <p>For Review Summary</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{ route('status.deferred') }}"
                        class="nav-link {{ Route::currentRouteName() == 'status.deferred' ? 'active' : '' }}">
                        <i class="far fa-pause-circle nav-icon"></i>
                        <p>Deferred</p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="{{ route('status.approved') }}"
                        class="nav-link {{ Route::currentRouteName() == 'status.approved' ? 'active' : '' }}">
                        <i class="far fa-check-circle nav-icon"></i>
                        <p>Approved</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('status.disapproved') }}"
                        class="nav-link {{ Route::currentRouteName() == 'status.disapproved' ? 'active' : '' }}">
                        <i class="far fa-times-circle nav-icon"></i>
                        <p>Disapproved</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{ route('reports') }}"
                        class="nav-link {{ Route::currentRouteName() == 'reports' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-trash"></i>
                        <p> Archived</p>
                    </a>
                </li> -->
                <li class="nav-header">TRANSPARENCY</li>
                <li class="nav-item">
                    <a href="{{ route('messages.mailbox') }}" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Messages</p>
                    </a>
                </li>
                <li class="nav-header">SETTINGS</li>
                <li class="nav-item">
                    <a id="theme-toggle" class="nav-link">
                        <i class="nav-icon fas fa-adjust"></i>
                        <p>Toggle Theme</p>
                    </a>
                </li>
    </div>
</aside>


@elseif($role === 3)
<!-- FOR RESEARCHER -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('researcher.home') }}" class="brand-link sidebar-dark-primary">
        <img src="{{ asset('dist/img/systemAIRCoDeLogo.png') }}" alt="AIRCoDe Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">RPIMTS</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-header">MAIN MENU</li>
                <li class="nav-item menu-open">
                <li class="nav-item">
                    <a href="{{ route('researcher.home') }}"
                        class="nav-link {{ Route::currentRouteName() == 'researcher.home' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                </li>
                <li class="nav-header">PROPONENTS</li>
                </li>
                <li class="nav-item">
                    <a href="{{ route('projects.create') }}"
                        class="nav-link {{ Route::currentRouteName() == 'projects.create' ? 'active' : '' }}">
                        <i class="far fa-file nav-icon"></i>
                        <p>New Submission</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('projects') }}"
                        class="nav-link {{ Route::currentRouteName() == 'projects' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Projects</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('status.draft') }}"
                        class="nav-link {{ Route::currentRouteName() == 'status.draft' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>Draft</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('status.under-evaluation') }}"
                        class="nav-link {{ Route::currentRouteName() == 'status.under-evaluation' ? 'active' : '' }}">
                        <i class="fas fa-hourglass-half nav-icon"></i>
                        <p>Under Evaluation</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('status.for-revision') }}"
                        class="nav-link {{ Route::currentRouteName() == 'status.for-revision' ? 'active' : '' }}">
                        <i class="fas fa-edit nav-icon"></i>
                        <p>For Revision</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{ route('status.deferred') }}"
                        class="nav-link {{ Route::currentRouteName() == 'status.deferred' ? 'active' : '' }}">
                        <i class="far fa-pause-circle nav-icon"></i>
                        <p>Deferred</p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="{{ route('status.approved') }}"
                        class="nav-link {{ Route::currentRouteName() == 'status.approved' ? 'active' : '' }}">
                        <i class="far fa-check-circle nav-icon"></i>
                        <p>Approved</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('status.disapproved') }}"
                        class="nav-link {{ Route::currentRouteName() == 'status.disapproved' ? 'active' : '' }}">
                        <i class="far fa-times-circle nav-icon"></i>
                        <p>Disapproved</p>
                    </a>
                </li>
                <li class="nav-header">TRANSPARENCY</li>
                <li class="nav-item">
                <li class="nav-item">
                    <a href="{{ route('messages.mailbox') }}" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Messages</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('call-for-proposals') }}"
                        class="nav-link {{ Route::currentRouteName() == 'call-for-proposals' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>Call for Proposals</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('access-requests') }}"
                        class="nav-link {{ Route::currentRouteName() == 'access-requests' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-key"></i>
                        <p>Access Request</p>
                    </a>
                </li>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{ route('reports') }}"
                        class="nav-link {{ Route::currentRouteName() == 'reports' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-trash"></i>
                        <p> Archived</p>
                    </a>
                </li> -->
                <li class="nav-header">SETTINGS</li>
                <li class="nav-item">
                    <a id="theme-toggle" class="nav-link">
                        <i class="nav-icon fas fa-adjust"></i>
                        <p>Toggle Theme</p>
                    </a>
                </li>
    </div>
</aside>


@elseif($role === 4)
<!-- FOR REVIEWER -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('reviewer.home') }}" class="brand-link sidebar-dark-primary">
        <img src="{{ asset('dist/img/systemAIRCoDeLogo.png') }}" alt="AIRCoDe Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">RPIMTS</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('reviewer.home') }}"
                    class="nav-link {{ Route::currentRouteName() == 'reviewer.home' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <!-- <li class="nav-header">FOR REVIEW</li>
            @if (!empty($revs))
                @foreach ($revs as $rev)
                    @if ($rev->user_id === Auth::user()->id)
                        <li class="nav-item">
                            <a href="{{ route('review.for-review-project', ['id' => $rev->project_id]) }}"
                                class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>{{ $rev->project->project_name }}</p>
                                <p class="deadline mb-4 text-xs"><br>Deadline: {{ $rev->deadline }}</p>
                            </a>
                        </li>
                    @endif
                @endforeach
            @else
                <p>No items assigned for review</p>
            @endif -->
            <li class="nav-header">MAIN MENU</li>
            <li class="nav-item">
                <a href="{{ route('reports') }}"
                    class="nav-link {{ Route::currentRouteName() == 'reports' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-edit"></i>
                    <p> For Review</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('reports') }}"
                    class="nav-link {{ Route::currentRouteName() == 'reports' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-check-circle"></i>
                    <p> Reviewed</p>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a href="{{ route('reports') }}"
                    class="nav-link {{ Route::currentRouteName() == 'reports' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-trash"></i>
                    <p> Archived Projects</p>
                </a>
            </li> -->
            <li class="nav-header">TRANSPARENCY</li>
            <li class="nav-item">
                <a href="{{ route('messages.mailbox') }}" class="nav-link">
                    <i class="nav-icon fas fa-comments"></i>
                    <p>Messages</p>
                </a>
            </li>
            <li class="nav-header">SETTINGS</li>
            <li class="nav-item">
                <a id="theme-toggle" class="nav-link">
                    <i class="nav-icon fas fa-adjust"></i>
                    <p>Toggle Theme</p>
                </a>
            </li>
        </ul>
      </nav>
    </div>
</aside>


@else
    @include('sidebar-guest')

@endif

