<h1>Projects Under Evaluation</h1>
<ul>
    @foreach($projects as $project)
        <li>{{ $project->name }}</li>
    @endforeach
</ul>

