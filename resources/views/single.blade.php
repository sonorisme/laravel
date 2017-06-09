@extends('main')
@section('title', 'Single')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>{{$post->title}}</h1>
			<p>{{$post->body}}</p>
			<p>Categorized in: {{$post->category->name}}</p>
		</div>
	</div>
</div>

@stop