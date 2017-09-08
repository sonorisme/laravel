@extends('layouts.app')
@section('title', 'Index')
@section('content')
<div class="top-first-padding"></div>
<div class="container">
	<div class="row">
		<div class="col-md-10">
			<h1>All Posts</h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('posts.create')}}" class="btn btn-primary btn-lg btn-block btn-spacing">
			Create New Post</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-sm table-hover table-bordered">
				<thead>
					<tr>
						<th>id</th>
						<th>title</th>
						<th>body</th>
						<th>created_at</th>
						<th>updated_at</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach( $posts as $post)
						<tr>
							<td>{{$post['id']}}</td>
							<td>{{$post['title']}}</td>
							<td>{{substr($post['body'], 0, 20)}}{{strlen($post->body) > 20 ? '...' : ''}}</td>
							<td>{{$post['created_at']}}</td>
							<td>{{$post['updated_at']}}</td>
							<td>{!! Html::linkRoute('posts.show','Show', array($post->id), 
							array('class'=>'btn btn-primary btn-sm'))!!}{{' '}}{!! Html::linkRoute('posts.edit','Edit', array($post->id), 
							array('class'=>'btn btn-primary btn-sm'))!!}</td>
						</tr>
					@endforeach
				</tbody>			
			</table>
			<div class="text-center">
				{{ $posts->links()}}
			</div>
		</div>
	</div>
</div>
	
@stop