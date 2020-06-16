@extends('layouts.app')

@section('content')
 
    <div class="col-md-10 offset-md-1">
        <ul class="list-group">
            <li class="list-group-item" style="background-color:#DCDCDC;">
                <h4>{{ $user->name }}</h4>
                <ul class="nav nav-pills nav-fill row">
                    <li class="nav-item col-md-3 offset-md-3">
                        {!! link_to_route('users.followings', 'フォロー', ['id' => $user->id]) !!}
                    <li class="nav-item col-md-3">
                        {!! link_to_route('users.followers', 'フォロワー', ['id' => $user->id], ['class' => 'nav-link active']) !!}
                    </li>
                </ul>
            </li>
            @foreach($users as $user)  
                <li class="list-group-item">
                    <ul class="list-unstyled">
                        <li class="media">
                            <!--ユーザーのアイコン-->
                            <div class="user-icon-users">
                                @if($user->user_image_file_name === 'images/topimage.jpg')
                                    <img src="{{ secure_asset('images/topimage.jpg') }}" alt="user_icon" class="img-circle">
                                @else
                                    <img src= "{{ Storage::disk('s3')->url($user->user_image_file_name) }}" alt="user_icon" class="img-circle">
                                @endif
                            </div>
                            
                            <div class="media-body ml-3">
                                <h5 class="mb-2">{!! link_to_route('users.show', $user->name, ['user' => $user->id]) !!}</h5>
                                <p>{!! nl2br(e($user->introduction)) !!}</p>
                            </div>
                        </li>
                    </ul>
                </li>
            @endforeach
        </ul>
        {{ $users->links() }}
    </div>

@endsection