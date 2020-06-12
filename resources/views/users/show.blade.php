@extends('layouts.app')

@section('content')
    <div class="row">
      
      <!--ユーザープロフィール-->
        <div class="col-md-10 offset-md-1">
          <div class="row">
            <div class="col-sm-5">
                
                
                <!--ユーザーのアイコン-->
                @if($user->user_image_file_name === 'images/topimage.jpg')
                    <img src="{{ secure_asset('images/topimage.jpg') }}" alt="user_icon" class="mb-3 rounded-circle" width="55%">
                @else
                    <img src= "{{ Storage::disk('s3')->url($user->user_image_file_name) }}" alt="user_icon" class="rounded-circle mb-3" width="55%">
                @endif
                
            </div>
            <div class="col-sm-7">
                <div class="user-menu h4">
                    {{ $user->name }}
                    <!--プロフィール編集-->
                    @if(Auth::id() === $user->id)
                      <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn">
                          <i class="fas fa-cogs ml-3"></i>プロフィール編集
                      </a>
                    @endif
                    <!--フォローボタン-->
                    @include('user_follow.follow_button')
                    <!--退会ボタン-->
                    @include('users.delete_user_button')
                </div>
                
                <div class="navbar">
                    <ul class="nav justify-content-center">
                      <li class="nav-item">
                        投稿{{ $user->posts_count }}件
                      </li>
                      <li class="nav-item">
                        フォロワー{!! link_to_route('users.followers', $user->followers_count, ['id' => $user->id]) !!}
                      </li>
                      <li class="nav-item">
                        フォロー{!! link_to_route('users.followings', $user->followings_count, ['id' => $user->id]) !!}
                      </li>
                    </ul>    
                </div>
                
                <div class="self-introduction mt-3" >
                    {!! nl2br(e($user->introduction)) !!}
                    
                </div>
            </div>
          </div>
        </div>
        
        <!--自分の投稿と保存した投稿の切替バー-->
        <div class="navbar col-sm-10 offset-md-1">
            <ul class="nav nav-tabs text-center">
              <li class="nav-item">
                {!! link_to_route('users.show', '投稿', ['user' => $user->id], ['class' => 'nav-link active']) !!}
              </li>
              <li class="nav-item">
                {!! link_to_route('users.favorites', '保存', ['id' => $user->id], ['class' => 'nav-link']) !!}
              </li>
            </ul>
        </div>
        
        <!--投稿した画像一覧-->
        <!--<div class="row"> ←これをコメントアウトしました--> 
        <div class="col-md-10 offset-md-1">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4 mb-3">
                        <img src= "{{ Storage::disk('s3')->url($post->image_file_name) }}" alt="post_image" class="img-square img-fluid" data-toggle="modal" data-target="#exampleModal{{ $post->id }}">
                    </div>
                    <!--postをmodalで表示-->
                    @include('posts.post')
                @endforeach
            </div>
        </div>
    </div>
@endsection