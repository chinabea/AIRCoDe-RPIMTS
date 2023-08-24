{{--
@php
    $role = auth()->user()->role;
@endphp

@if($role === 1)
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('researcher.home') }}" class="brand-link">
        <img src="{{ asset('dist/img/systemAIRCoDeLogo.png') }}" alt="AIRCoDe Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AIRCoDe RPIM</span>
      </a>
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{ route('director.home') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-header">MAIN MENU</li>
          <li class="nav-item">
            <a href="{{ route('users') }}" class="nav-link">
              <i class="nav-icon fas fa-users mr-2"></i>
              <p>
                Users
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('projects') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Submitted Projects
                <span class="badge badge-info right">7</span>
              </p>
            </a>
          </li>
          <li class="nav-header">TRANSPARENCY</li>
              <li class="nav-item">
                <a href="{{ route('call-for-proposals') }}" class="nav-link">
                  <i class="nav-icon fas fa-file-signature"></i>
                  <p>Call for Proposals</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('access-requests') }}" class="nav-link">
                  <i class="nav-icon fas fa-key"></i>
                  <p>Access Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('announcements') }}" class="nav-link">
                  <i class="nav-icon fas fa-bell"></i>
                  <p>Announcements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('abouts') }}" class="nav-link">
                  <i class="nav-icon fas fa-info-circle"></i>
                  <p>About Us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="nav-icon fas fa-download"></i>
                  <p>Downloads</p>
                </a>
              </li>
    </div>
  </aside>


@elseif($role === 2)
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('researcher.home') }}" class="brand-link">
        <img src="{{ asset('dist/img/systemAIRCoDeLogo.png') }}" alt="AIRCoDe Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AIRCoDe RPIM</span>
      </a>
      <div class="sidebar">

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <style>
          .project-title {
            font-weight: bold;
          }
          .deadline {
            font-size: 14px;
            margin-top: 5px;
          }
          .history {
            font-size: 14px;
            margin-top: 5px;
          }

          </style>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-angle-down"></i>
              <p>FOR REVIEW</p>
            </a>
            <ul class="nav nav-treeview">
            @foreach($recs as $rec)
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-toggle="collapse" data-target="#project-details-{{ $rec->id }}">
                            <i class="nav-icon fas fa-book"></i>
                            <p>{{ $rec->projname }}</p>
                            <p class="deadline mb-4"><br>Deadline: Jul. 1, 2023</p>
                        </a>
                    </li>
            @endforeach
    </ul>
    </li>
</div>
</aside>

@elseif($role === 3)
<!-- FOR RESEARCHER -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('researcher.home') }}" class="brand-link">
      <img src="{{ asset('dist/img/systemAIRCoDeLogo.png') }}" alt="AIRCoDe Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AIRCoDe RPIM</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">PROPONENTS</li>
        </li>
        <li class="nav-item">
          <a href="{{ route('projects.create') }}" class="nav-link">
            <i class="far fa-file nav-icon"></i>
            <p>New Submission</p>
          </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>Submitted Projects
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
                @if(is_array($recs) || $recs instanceof \Traversable)
                    @foreach($recs as $rec)
                        <li class="nav-item">
                            <a href="{{ route('submission-details.show', ['id' => $rec->id]) }}" class="nav-link">
                                <i class=""></i>
                                <p>{{ $rec->projname }}</p>
                            </a>
                        </li>
                    @endforeach
                @else
                    <li class="nav-item">
                        <p>No projects submitted.</p>
                    </li>
                @endif
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-file-alt nav-icon"></i>
                <p>Draft <i class="fas fa-angle-left right"></i></p>
            </a>
            @if(is_array($recs) || $recs instanceof \Traversable)
                <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
                    @foreach($recs as $rec)
                        @if($rec->status == 'Draft' && $project->user_id == auth()->id())
                            <li class="nav-item">
                                <a href="{{ route('submission-details.show', $rec->id) }}" class="nav-link">
                                    <i class="fas fa-angle-down"></i>
                                    <p>{{ $rec->projname }}</p>
                                </a>
                            </li>
                </ul>
                @endif
            @endforeach
            @else
                <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
                    <li class="nav-item">
                        <p>No projects submitted.</p>
                    </li>
                </ul>
            @endif
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-hourglass-half nav-icon"></i>
            <p>Under Evaluation
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          @if(is_array($recs) || $recs instanceof \Traversable)
            @foreach($recs as $rec)
                @if($rec->status == 'Under Evaluation' && $project->user_id == auth()->id())
                <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
                        <li class="nav-item">
                            <a href="{{ route('submission-details.show', $rec->id) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                            <p>{{ $rec->projname }}</p>
                            </a>
                        </li>
                    @endif
                @endforeach
          </ul>
          @else
              <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
                  <li class="nav-item">
                      <p>No projects submitted.</p>
                  </li>
              </ul>
          @endif
      </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-edit nav-icon"></i>
            <p>For Revision
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          @if(is_array($recs) || $recs instanceof \Traversable)
          @foreach($recs as $rec)
          @if($rec->status == 'For Revision' && $project->user_id == auth()->id())
          <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
            <li class="nav-item">
              <a href="{{ route('submission-details.show', $rec->id) }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
              <p>{{ $rec->projname }}</p>
              </a>
            </li>
            @endif
            @endforeach
          </ul>
          @else
              <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
                  <li class="nav-item">
                      <p>No projects submitted.</p>
                  </li>
              </ul>
          @endif
      </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-pause-circle nav-icon"></i>
            <p>Deferred
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          @if(is_array($recs) || $recs instanceof \Traversable)
          @foreach($recs as $rec)
          @if($rec->status == 'Deferred' && $project->user_id == auth()->id())
          <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
            <li class="nav-item">
              <a href="{{ route('submission-details.show', $rec->id) }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
              <p>{{ $rec->projname }}</p>
              </a>
            </li>
            @endif
            @endforeach
          </ul>
          @else
              <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
                  <li class="nav-item">
                      <p>No projects submitted.</p>
                  </li>
              </ul>
          @endif
      </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-check-circle nav-icon"></i>
            <p>Approved
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          </a>
          @if(is_array($recs) || $recs instanceof \Traversable)
          @foreach($recs as $rec)
          @if($rec->status == 'Approved' && $project->user_id == auth()->id())
          <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
            <li class="nav-item">
              <a href="{{ route('submission-details.show', ['id' => $rec->id]) }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
              <p>{{ $rec->projname }}</p>
              </a>
            </li>
          </ul>
          @endif
          @endforeach
          @else
              <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
                  <li class="nav-item">
                      <p>No projects submitted.</p>
                  </li>
              </ul>
          @endif
      </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-times-circle nav-icon"></i>
            <p>Disapproved
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          @if(is_array($recs) || $recs instanceof \Traversable)
          @foreach($recs as $rec)
          @if($rec->status == 'Disapproved' && $project->user_id == auth()->id())
          <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
            <li class="nav-item">
              <a href="{{ route('status.draft') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
              <p>{{ $rec->projname }}</p>
              </a>
            </li>
            @endif
            @endforeach
          </ul>
          @else
              <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
                  <li class="nav-item">
                      <p>No projects submitted.</p>
                  </li>
              </ul>
          @endif
      </li>
          <li class="nav-header">MAIN MENU</li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('reviewer.home') }}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('projects.track') }}" class="nav-link">
                  <i class="nav-icon fas fa-bullseye"></i>
                  <p>Track</p>
                </a>
              </li>
            </ul>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-balance-scale"></i>
              <p>
                Transparency
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('call-for-proposals') }}" class="nav-link">
                  <i class="nav-icon fas fa-file-signature"></i>
                  <p>Call for Proposals</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('access-requests') }}" class="nav-link">
                  <i class="nav-icon fas fa-key"></i>
                  <p>Access Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('announcements') }}" class="nav-link">
                  <i class="nav-icon fas fa-bell"></i>
                  <p>Announcements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('abouts') }}" class="nav-link">
                  <i class="nav-icon fas fa-info-circle"></i>
                  <p>About Us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="nav-icon fas fa-download"></i>
                  <p>Downloads</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('faqs') }}" class="nav-link">
                <i class="nav-icon fas fa-question-circle"></i>
              <p>
                FAQs
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('contacts') }}" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Contact Us
              </p>
            </a>
          </li>
          <li class="nav-header">EXTRAS</li>
          <li class="nav-item">
            <a href="{{ route('reviews') }}" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Reviews
              </p>
            </a>
          </li>
    </div>
</aside>


@elseif($role === 4)
<!-- FOR REVIEWER -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('researcher.home') }}" class="brand-link">
        <img src="{{ asset('dist/img/systemAIRCoDeLogo.png') }}" alt="AIRCoDe Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AIRCoDe RPIM</span>
      </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('dist/img/user4-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
              <a href="#" class="d-block">Reviewer</a>
          </div>
        </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">MAIN MENU</li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('reviewer.home') }}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('projects') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Submitted Projects
                <span class="badge badge-info right">7</span>
              </p>
            </a>
          </li>
    </div>
  </aside>

@else
    @include('sidebar-guest')
@endif --}}
@php
    $role = auth()->user()->role;
@endphp

@if($role === 1)
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('director.home') }}" class="brand-link">
        <img src="{{ asset('dist/img/systemAIRCoDeLogo.png') }}" alt="AIRCoDe Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AIRCoDe RPIM</span>
    </a>

    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{ route('director.home') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-header">MAIN MENU</li>
          <li class="nav-item">
            <a href="{{ route('users') }}" class="nav-link">
              <i class="nav-icon fas fa-users mr-2"></i>
              <p>
                Users
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('projects') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Submitted Projects
                <span class="badge badge-info right">7</span>
              </p>
            </a>
          </li>
          <li class="nav-header">TRANSPARENCY</li>
              <li class="nav-item">
                <a href="{{ route('call-for-proposals') }}" class="nav-link">
                  <i class="nav-icon fas fa-file-signature"></i>
                  <p>Call for Proposals</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('access-requests') }}" class="nav-link">
                  <i class="nav-icon fas fa-key"></i>
                  <p>Access Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('announcements') }}" class="nav-link">
                  <i class="nav-icon fas fa-bell"></i>
                  <p>Announcements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('abouts') }}" class="nav-link">
                  <i class="nav-icon fas fa-info-circle"></i>
                  <p>About Us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="nav-icon fas fa-download"></i>
                  <p>Downloads</p>
                </a>
              </li>
    </div>
  </aside>


@elseif($role === 2)
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('staff.home') }}" class="brand-link">
        <img src="{{ asset('dist/img/systemAIRCoDeLogo.png') }}" alt="AIRCoDe Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AIRCoDe RPIM</span>
      </a>
      <div class="sidebar">

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <style>
          .project-title {
            font-weight: bold;
          }
          .deadline {
            font-size: 14px;
            margin-top: 5px;
          }
          .history {
            font-size: 14px;
            margin-top: 5px;
          }

          </style>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-angle-down"></i>
              <p>FOR REVIEW</p>
            </a>
            <ul class="nav nav-treeview">
            @foreach($recs as $rec)
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-toggle="collapse" data-target="#project-details-{{ $rec->id }}">
                            <i class="nav-icon fas fa-book"></i>
                            <p>{{ $rec->projname }}</p>
                            <p class="deadline mb-4"><br>Deadline: Jul. 1, 2023</p>
                        </a>
                    </li>
            @endforeach
    </ul>
    </li>
</div>
</aside>

@elseif($role === 3)
<!-- FOR RESEARCHER -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('researcher.home') }}" class="brand-link">
        <img src="{{ asset('dist/img/systemAIRCoDeLogo.png') }}" alt="AIRCoDe Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AIRCoDe RPIM</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">PROPONENTS</li>
        </li>
        <li class="nav-item">
          <a href="{{ route('projects.create') }}" class="nav-link">
            <i class="far fa-file nav-icon"></i>
            <p>New Submission</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>Submitted Projects
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
        @if(is_array($recs) || $recs instanceof \Traversable)
          @foreach($recs as $rec)
            <li class="nav-item">
              <a href="{{ route('submission-details.show', ['id' => $rec->id]) }}" class="nav-link">
                <i class=""></i>
              <p>{{ $rec->projname }}</p>
              </a>
            </li>
          @endforeach
          @endif
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-file-alt nav-icon"></i>
            <p>Draft
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
        @if(is_array($recs) || $recs instanceof \Traversable)
          @foreach($recs as $rec)
          @if($rec->status == 'Draft')
          <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
            <li class="nav-item">
              <a href="{{ route('submission-details.show', $rec->id) }}" class="nav-link">
              <i class="fas fa-angle-down"></i>
              <p>{{ $rec->projname }}</p>
              </a>
            </li>
          </ul>
          @endif
          @endforeach
        @endif
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-hourglass-half nav-icon"></i>
            <p>Under Evaluation
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
        @if(is_array($recs) || $recs instanceof \Traversable)
          @foreach($recs as $rec)
          @if($rec->status == 'Under Evaluation')
          <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
            <li class="nav-item">
              <a href="{{ route('submission-details.show', $rec->id) }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
              <p>{{ $rec->projname }}</p>
              </a>
            </li>
          </ul>
          @endif
          @endforeach
        @endif
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-edit nav-icon"></i>
            <p>For Revision
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
        @if(is_array($recs) || $recs instanceof \Traversable)
          @foreach($recs as $rec)
          @if($rec->status == 'For Revision')
          <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
            <li class="nav-item">
              <a href="{{ route('submission-details.show', $rec->id) }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
              <p>{{ $rec->projname }}</p>
              </a>
            </li>
          </ul>
          @endif
          @endforeach
        @endif
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-pause-circle nav-icon"></i>
            <p>Deferred
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
        @if(is_array($recs) || $recs instanceof \Traversable)
          @foreach($recs as $rec)
          @if($rec->status == 'Deferred')
          <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
            <li class="nav-item">
              <a href="{{ route('submission-details.show', $rec->id) }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
              <p>{{ $rec->projname }}</p>
              </a>
            </li>
          </ul>
          @endif
          @endforeach
        @endif
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-check-circle nav-icon"></i>
            <p>Approved
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          </a>
        @if(is_array($recs) || $recs instanceof \Traversable)
          @foreach($recs as $rec)
          @if($rec->status == 'Approved')
          <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
            <li class="nav-item">
              <a href="{{ route('submission-details.show', ['id' => $rec->id]) }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
              <p>{{ $rec->projname }}</p>
              </a>
            </li>
          </ul>
          @endif
          @endforeach
        @endif
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-times-circle nav-icon"></i>
            <p>Disapproved
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
        @if(is_array($recs) || $recs instanceof \Traversable)
          @foreach($recs as $rec)
          @if($rec->status == 'Disapproved')
          <ul class="nav nav-treeview bg-black py-2 collapse-inner rounded">
            <li class="nav-item">
              <a href="{{ route('status.draft') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
              <p>{{ $rec->projname }}</p>
              </a>
            </li>
          </ul>
          @endif
          @endforeach
        @endif
        </li>
          <li class="nav-header">MAIN MENU</li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('reviewer.home') }}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('projects.track') }}" class="nav-link">
                  <i class="nav-icon fas fa-bullseye"></i>
                  <p>Track</p>
                </a>
              </li>
            </ul>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-balance-scale"></i>
              <p>
                Transparency
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('call-for-proposals') }}" class="nav-link">
                  <i class="nav-icon fas fa-file-signature"></i>
                  <p>Call for Proposals</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('access-requests') }}" class="nav-link">
                  <i class="nav-icon fas fa-key"></i>
                  <p>Access Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('announcements') }}" class="nav-link">
                  <i class="nav-icon fas fa-bell"></i>
                  <p>Announcements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('abouts') }}" class="nav-link">
                  <i class="nav-icon fas fa-info-circle"></i>
                  <p>About Us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="nav-icon fas fa-download"></i>
                  <p>Downloads</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('faqs') }}" class="nav-link">
                <i class="nav-icon fas fa-question-circle"></i>
              <p>
                FAQs
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('contacts') }}" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Contact Us
              </p>
            </a>
          </li>
          <li class="nav-header">EXTRAS</li>
          <li class="nav-item">
            <a href="{{ route('reviews') }}" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Reviews
              </p>
            </a>
          </li>
    </div>
</aside>


@elseif($role === 4)
<!-- FOR REVIEWER -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('reviewer.home') }}" class="brand-link">
        <img src="{{ asset('dist/img/systemAIRCoDeLogo.png') }}" alt="AIRCoDe Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AIRCoDe RPIM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('dist/img/user4-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
              <a href="#" class="d-block">Reviewer</a>
          </div>
        </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">MAIN MENU</li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('reviewer.home') }}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('projects') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Submitted Projects
                <span class="badge badge-info right">7</span>
              </p>
            </a>
          </li>
    </div>
  </aside>

@else
    @include('sidebar-guest')
@endif
