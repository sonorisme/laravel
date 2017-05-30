@extends('main')
@section('title', 'Show')
@section('content')
@foreach($posts as $post)
<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="panel">
				<h3>{{$post->title}}</h3>
				<p>{{$post->body}}</p>
				<a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary">Read More</a>
			</div>
		</div>
		<div class="col-md-2">
			
		</div>
	</div>
</div>

@endforeach
@stop