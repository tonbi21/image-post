@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>User edit</h1>
    </div>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', $user->name, ['class' => 'form-controll w-100']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('introduction', 'Introduction') !!}
                    {!! Form::textarea('introduction', $user->introduction, ['class' => 'form-controll w-100']) !!}
                </div>
            
                {!! Form::submit('Login', ['class' => 'btn btn-primary col-4 offset-sm-4']) !!}
            {!! Form::close() !!}
            
        </div>
    </div>


@endsection