@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('styles')
<style>
	.error-message {
		display: block color: darkred;
		font-size: 0.9rem;
	}
</style>
@endsection

@section('content')
<form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
	@csrf
	@isset($task)
		@method('PUT')
	@endisset
	<div>
		<label for="title">Title</label>
		<input type="text" id="title" name="title" value="{{ $task->title ?? old('title') }}">
		@error('title')
		<span class="error-message">{{ $message }}</span>
		@enderror
	</div>
	<div>
		<label for="description">Description</label>
		<textarea id="description" name="description" rows="5">{{ $task->description ?? old('description') }}</textarea>
		@error('description')
		<span class="error-message">{{ $message }}</span>
		@enderror
	</div>
	<div>
		<label for="long_description">Long Description</label>
		<textarea id="long_description" name="long_description"
			rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
		@error('long_description')
		<span class="error-message">{{ $message }}</span>
		@enderror
	</div>
	<div>
		<button type="submit">
			@isset($task)
			Update Task
			@else
			Add Task
			@endisset
		</button>
	</div>
</form>
@endsection