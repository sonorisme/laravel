@extends('layouts.app')

@section('content')
<div class="top-first-padding"></div>
@if (Session::has('success'))
    <div class="alert alert-success">
        <p>Success: {{Session::get('success')}}</p>
    </div>
@endif
@if (count($errors) > 0)
    <ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    </ul>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <th>{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3 col-md-offset-1">
            {!! Form::open(['route'=>'categories.store'])!!}
                <h2>New Category</h2>
                {{ Form::label('name', 'Name:')}}
                {{ Form::text('name', null, ['class'=>'form-control'])}}
                {{ Form::submit('Submit', ['class'=>'btn btn-primary btn-block btn-spacing'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection