@extends('app')

@section('content')
    <h2>{{ $project->name }}</h2>

    @if ( !$project->tasks->count() )
        Your project has no tasks.
    @else
        <ul>
            @foreach( $project->tasks as $task )
                <li>
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.tasks.destroy', $project->slug, $task->slug))) !!}
                        <a href="{{ route('projects.tasks.show', [$project->slug, $task->slug]) }}">{{ $task->name }}</a>
                        (
                            <a class="btn btn-info" href="{{ route('projects.tasks.edit', array($project->slug, $task->slug)) }}">Edit</a>,
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        )
                    {!! Form::close() !!}
                </li>
            @endforeach
        </ul>
    @endif

    <p>
        <a href="{{ route('projects.index') }}">Back to Projects</a> |
        <a href="{{ route('projects.tasks.create', $project->slug) }}">Create Task</a>
    </p>
@endsection
