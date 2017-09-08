@extends('main')
@section('title', 'Show')

@section('content')
<div class="top-first-padding"></div>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h2>{{ $tag->name }} <small> has {{ $tag->posts()->count() }} posts</small></h2>
		</div>
		<div class="col-md-2 col-md-offset-2 pull-right">
			<button class="btn btn-primary btn-block btn-spacing" onclick="location.href='{{route('tags.edit', $tag->id)}}'">Edit</button>
			{!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
				{{ Form::submit('Delete', ['class' => 'btn btn-block btn-spacing btn-danger']) }}
			{!! Form::close() !!}
		</div>
	</div>
	<hr>
	<div class="row">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Tags</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($tag->posts as $post)
				<tr>
					<th>{{$post->id}}</th>
					<td>{{$post->title}}</td>
					<td>
						@foreach($post->tags as $tag)
							<span class="label label-default">{{$tag->name}}</span>
						@endforeach
					</td>
					<td>
						<a href="{{route('posts.show', $post->id)}}" class="btn btn-xs btn-default">Show</a>
						
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
	
@stop

