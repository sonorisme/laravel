@extends('main')
@section('title', 'Create')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			{!! Form::open(['route' => 'posts.store']) !!}
				{{Form::label('email', 'Email: ')}}
				{{Form::email('email', null, ['class'=>'form-control'])}}

				{{Form::label('password', 'Password: ')}}
				{{Form::password('password', ['class'=>'form-control'])}}
							
				{{Form::checkbox('remember')}}
				{{Form::label('remember', 'Remember me: ')}}

				{{Form::submit('Login', ['class'=>'btn btn-success')}}
			   
			{!! Form::close() !!}
		</div>

	</div>
</div>
	
@stop
