@extends('layouts.app')

@section('title', $task->title)

@section('content')
<p>{{ $task->description }}</p>

@if ($task->long_description)
<p>{{ $task->long_description }}</p>
@endif

<p>{{ $task->created_at }}</p>
<p>{{ $task->updated_at }}</p>

<p>
	@if ($task->completed)
	Completed
	@else
	Not Completed
	@endif
</p>

<div>
	<a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit</a>
</div>

<form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task->id]) }}">
	@csrf
	@method('PUT')
	<button>
		Mark as {{ $task->completed ? 'not completed' : 'completed'}}
	</button>
</form>

<div>
	<form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
		@csrf
		@method('DELETE')
		<button type="submit">Delete</button>
	</form>
</div>
@endsection