@extends('layouts.app')
@section('title', 'Archive')
@section('content')
<div class="top-first-padding"></div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Archive</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Body</th>
				<th>Created At</th>
			</tr>
			@foreach($posts as $post)
			<tr>
				<td>{{$post->id}}</td>
				<td>{{$post->title}}</td>
				<td>{{$post->body}}</td>
				<td>{{$post->created_at}}</td>
			</tr>
			@endforeach

		</table>
					{{ $posts->links() }}
			
		</div>
	</div>
</div>

@stop