@extends('main')
@section('title', 'Create')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@stop
@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>This is a page</h2>
			{!! Form::open(['route' => 'posts.store']) !!}
			    {{ Form::label('title', 'Title: ')}}
			    {{ Form::text('title', null, array('class'=>'form-control'))}}

			    {{ Form::label('category', 'Category: ')}}
			    <select name="category" class="form-control">
			    @foreach($categories as $category)
			    	<option value="{{$category->id}}">{{$category->name}}</option>
			    @endforeach
			    </select>

			    {{ Form::label('tag', 'Tags:', ['class'=>'btn-spacing'])}}
			    <select name="tag[]" class="form-control tag" multiple="multiple">
			    @foreach($tags as $tag)
			    	<option value="{{$tag->id}}">{{$tag->name}}</option>
			    @endforeach
			    </select>

			    {{ Form::label('body', 'Post Body: ')}}
			    {{ Form::textarea('body', null, array('class'=>'form-control'))}}

			    {{ Form::submit('Create New Post', array('class'=>'btn btn-success btn-block btn-lg', 'style'=>'margin-top: 20px'))}}
			   
			{!! Form::close() !!}
		</div>

	</div>
@stop
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
	$(document).ready(function(){
		$('.tag').select2();
	});  
</script>
@stop
