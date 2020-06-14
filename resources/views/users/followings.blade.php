@extends('layouts.app')


@section('content')
    
    <div class="col-md-10 offset-md-1">
        <ul class="list-group">
            <li class="list-group-item" style="background-color:#DCDCDC;">
                <h4>{{ $user->name }}</h4>
                <ul class="nav nav-pills nav-fill row">
                    <li class="nav-item col-md-3 offset-md-3">
                        {!! link_to_route('users.followings', 'フォロー', ['id' => $user->id], ['class' => 'nav-link active']) !!}
                    </li>
                    <li class="nav-item col-md-3">
                        {!! link_to_route('users.followers', 'フォロワー', ['id' => $user->id]) !!}
                    </li>
                </ul>
            </li>
            @foreach($users as $user)  
                <li class="list-group-item">
                    <ul class="list-unstyled">
                        <li class="media">
                            
                            <!--ユーザーのアイコン-->
                            @if($user->user_image_file_name === 'images/topimage.jpg')
                                <img src="{{ secure_asset('images/topimage.jpg') }}" alt="user_icon" class="mr-3 rounded-circle mr-3" width="13%" height="13%">
                            @else
                                <img src= "{{ Storage::disk('s3')->url($user->user_image_file_name) }}" alt="user_icon" class="rounded-circle mr-3" width="13%" height="15%">
                            @endif
                            
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">{!! link_to_route('users.show', $user->name, ['user' => $user->id]) !!}</h5>
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



