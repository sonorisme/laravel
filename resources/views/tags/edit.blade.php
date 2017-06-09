@extends('main')
@section('title', 'Edit')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			{!! Form::model( $tag, ['route' => ['tags.update', $tag->id], 'method'=>'PUT']) !!}
			    {{ Form::label('name', 'Name: ')}}
			    {{ Form::text('name', null, array('class'=>'form-control'))}}

			    {{ Form::submit('Update', array('class'=>'btn btn-success btn-spacing'))}}

			    {!! Form::close() !!}
	    
		</div>
	</div>
</div>
	
@stop

