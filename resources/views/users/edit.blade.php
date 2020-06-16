@extends('layouts.app')

@section('content')
    <div class="text-center mb-4">
        <h2>プロフィール編集</h2>
    </div>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'put','files' => true]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'ユーザーネーム') !!}
                    {!! Form::text('name', $user->name, ['class' => 'form-controll w-100']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('introduction', '自己紹介') !!}
                    {!! Form::textarea('introduction', $user->introduction, ['class' => 'form-controll w-100']) !!}
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        {!! Form::label('file', 'アイコン') !!}
                        {!! Form::file('file', ['class' => 'form-controll w-100']) !!}
                    </div>
                    <div class="col-5 offset-1">
                        <p>
                            現在のアイコン
                            <div class="user-icon-login-user">
                                @if($user->user_image_file_name === 'images/topimage.jpg')
                                    <img src="{{ secure_asset('images/topimage.jpg') }}" alt="user_icon" class="img-circle">
                                @else
                                    <img src= "{{ Storage::disk('s3')->url($user->user_image_file_name) }}" alt="user_icon" class="img-circle">
                                @endif
                            </div>
                        </p>
                    </div>
                </div>
                {!! Form::submit('編集', ['class' => 'btn btn-primary col-4 offset-4 mt-3']) !!}
            {!! Form::close() !!}
            
        </div>
    </div>


@endsection