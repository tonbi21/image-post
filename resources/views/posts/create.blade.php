@extends('layouts.app')

@section('content')
    <h2>Create New Post</h2>
    
    {!! Form::open(['route' => 'posts.store', 'method' => 'post','files' => true]) !!}
        <div class="form-group">
            {!! Form::label('file', 'image', ['class' => 'control-label']) !!}
            {!! Form::file('file') !!}
        </div>
        <div class="form-group">
            {!! Form::label('content', 'content', ['class' => 'control-label']) !!}
            {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group text-center">
        {!! Form::submit('投稿', ['class' => 'btn btn-primary my-2']) !!}
        </div>
    {!! Form::close() !!}
@endsection