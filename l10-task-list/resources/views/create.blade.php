@extends('layouts.app')

@section('title', 'Add Task')
@section('styles')
<style>
	.error-message {
		color: darkred;
		font-size: 0.9rem;
	}
</style>
@endsection

@section('content')
<form method="POST" action="{{ route('tasks.store') }}">
	@csrf
	<div>
		<label for="title">Title</label>
		<input type="text" id="title" name="title" value="{{ old('title') }}">
		@error('title')
			<span class="error-message">{{ $message }}</span>
		@enderror
	</div>
	<div>
		<label for="description">Description</label>
		<textarea id="description" name="description" rows="5">{{ old('description') }}</textarea>
		@error('description')
			<span class="error-message">{{ $message }}</span>
		@enderror
	</div>
	<div>
		<label for="long_description">Long Description</label>
		<textarea id="long_description" name="long_description" rows="10">{{ old('long_description') }}</textarea>
		@error('long_description')
			<span class="error-message">{{ $message }}</span>
		@enderror
	</div>
	<div>
		<button type="submit">Add Task</button>
	</div>
</form>
@endsection