@extends('layouts.app')

@section('content')
    
    <div class="text-center mb-4">
        <h2>新規投稿</h2>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
    
            {!! Form::open(['route' => 'posts.store', 'method' => 'post','files' => true]) !!}
                
                    <div class="form-group">
                        {!! Form::label('file', 'image', ['class' => 'control-label']) !!}
                        {!! Form::file('file', ['class' => 'form-control']) !!}
                    </div>
               
                
                <div class="form-group">
                    {!! Form::label('content', 'content', ['class' => 'control-label']) !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group text-center">
                {!! Form::submit('投稿', ['class' => 'btn btn-primary my-2']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection