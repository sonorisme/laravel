@extends('main')
@section('title', 'Contact')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Contact</h2>
			{!! Form::open(['route' => 'contact.post']) !!}
			    {{ Form::label('email', 'Email: ')}}
			    {{ Form::text('email', null, array('class'=>'form-control'))}}

			    {{ Form::label('subject', 'Subject: ')}}
			    {{ Form::text("subject", null, array('class'=>"form-control"))}}

			    {{ Form::label('text', 'Text: ')}}
			    {{ Form::textarea('text', null, array('class'=>'form-control'))}}

			    {{ Form::submit('Send', array('class'=>'btn btn-success btn-block btn-lg', 'style'=>'margin-top: 20px'))}}
			   
			{!! Form::close() !!}
			
		</div>

	</div>
</div>
@stop
	
