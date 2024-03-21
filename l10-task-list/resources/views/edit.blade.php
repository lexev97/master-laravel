@extends('layouts.app')

@section('title', 'Edit Task')
@section('styles')
<style>
	.error-message {
		color: darkred;
		font-size: 0.9rem;
	}
</style>
@endsection

@section('content')
<form method="POST" action="{{ route('tasks.update', ['id' => $task->id]) }}">
	@csrf
	@method('PUT')
	<div>
		<label for="title">Title</label>
		<input type="text" id="title" name="title" value="{{ $task->title }}">
		@error('title')
			<span class="error-message">{{ $message }}</span>
		@enderror
	</div>
	<div>
		<label for="description">Description</label>
		<textarea id="description" name="description" rows="5">{{ $task->description }}</textarea>
		@error('description')
			<span class="error-message">{{ $message }}</span>
		@enderror
	</div>
	<div>
		<label for="long_description">Long Description</label>
		<textarea id="long_description" name="long_description" rows="10">{{ $task->long_description }}</textarea>
		@error('long_description')
			<span class="error-message">{{ $message }}</span>
		@enderror
	</div>
	<div>
		<button type="submit">Edit Task</button>
	</div>
</form>
@endsection