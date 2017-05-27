@extends('main')
@section('title', 'Create')
@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>This is a page</h2>
			{!! Form::open(['route' => 'posts.store']) !!}
			    {{ Form::label('title', 'Title: ')}}
			    {{ Form::text('title', null, array('class'=>'form-control'))}}

			    {{ Form::label('body', 'Post Body: ')}}
			    {{ Form::textarea('body', null, array('class'=>'form-control'))}}

			    {{ Form::submit('Create New Post', array('class'=>'btn btn-success btn-block btn-lg', 'style'=>'margin-top: 20px'))}}
			   
			{!! Form::close() !!}
		</div>

	</div>
@stop
