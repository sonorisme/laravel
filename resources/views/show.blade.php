@extends('main')
@section('title', 'Show')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<table class="table table-sm table-hover table-bordered">
				<thead>
					<tr>
						<th>id</th>
						<th>title</th>
						<th>body</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{$new['id']}}</td>
						<td>{{$new['title']}}</td>
						<td>{{$new['body']}}</td>
					</tr>
				</tbody>			
			</table>
		</div>
		<div class="col-md-4 well">
			<dl class="dl-horizontal">
				<dt>Created at:</dt>
				<dd>{{ $new->created_at}}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Updated at:</dt>
				<dd>{{ $new->updated_at}}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('posts.edit','Edit', array($new->id), 
					array('class'=>'btn btn-primary btn-block'))!!}
					<!--
						<a href="#" class="btn btn-primary btn-block">Edit</a>
					-->
				</div>
				<div class="col-sm-6">
					{!! Form::open(['route'=>['posts.destroy', $new->id], 'method'=>'DELETE'])!!}

					<!--{!! Html::linkRoute('posts.destroy','Delete', array($new->id), 
					array('class'=>'btn btn-warning btn-block'))!!}
					-->
					{{ Form::submit('Delete', array('class'=>'btn btn-warning btn-block'))}}
					<!--
						<a href="#" class="btn btn-warning btn-block">Distroy</a>
					-->
					{!! Form::close()!!}
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<a href="{{route('posts.index')}}" class="btn btn-default btn-block btn-spacing">{{'<< '}}Back</a>
				</div>
			</div>
		</div>
	</div>
</div>
	
@stop