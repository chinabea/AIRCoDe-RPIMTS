@foreach($projects as $project)

<li class="nav-item">

    <a href="#" class="nav-link" data-toggle="collapse" data-target="#project-details-{{ $project->id }}">

        <i class="nav-icon fas fa-book"></i>

        <p>{{ $project->projname }}</p>

        <p class="deadline mb-4"><br>Deadline: Jul. 1, 2023</p>

    </a>

</li>

@endforeach
