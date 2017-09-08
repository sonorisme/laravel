@extends('layouts.app')
@section('title', 'Edit')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@stop
@section('content')
<div class="top-first-padding"></div>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			{!! Form::model( $post, ['route' => ['posts.update', $post->id], 'method'=>'PUT']) !!}
			    {{ Form::label('title', 'Title: ')}}
			    {{ Form::text('title', null, array('class'=>'form-control'))}}

				{{ Form::label('category', 'Category: ')}}			    			    
				{{ Form::select('category', $categories, $post->category_id, ['class'=>'form-control'])}}

				{{ Form::label('tag', 'Tags:', ['class'=>'btn-spacing'])}}
			    {{ Form::select("tag[]", $tags, $value, ['class'=>"form-control tag", 'multiple'=>"multiple"])}}

			    {{ Form::label('body', 'Post Body: ')}}
			    {{ Form::textarea('body', null, array('class'=>'form-control'))}}
	    
		</div>
		<div class="col-md-4 well">
			<dl class="dl-horizontal">
				<dt>Created at:</dt>
				<dd>{{ $post->created_at}}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Updated at:</dt>
				<dd>{{ $post->updated_at}}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{{ Form::submit('Update', array('class'=>'btn btn-success btn-block'))}}
				</div>
				<div class="col-sm-6">
					{!! Html::linkRoute('posts.show','Cancel', array($post->id), 
					array('class'=>'btn btn-danger btn-block'))!!}
				
					<!--
						<a href="#" class="btn btn-primary btn-block">Edit</a>
					-->
				</div>
			</div>
		</div>
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