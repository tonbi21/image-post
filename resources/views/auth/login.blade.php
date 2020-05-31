@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Log in</h1>
    </div>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-controll w-100']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-controll w-100']) !!}
                </div>
                {!! Form::submit('Login', ['class' => 'btn btn-primary col-4 offset-sm-4']) !!}
            {!! Form::close() !!}
            
            <div class="bg-light text-dark text-center p-3 m-5">
                <p class="h5">Not registered yet? {!! link_to_route('signup.get', 'Signup', [], ['class' => 'ml-3']) !!}</p>
                
            </div>
            
        </div>
    </div>


@endsection