@extends('layouts.app')

@section('content')
    <div class="row">
      
      <!--ユーザープロフィール-->
        <div class="col-md-10 offset-md-1">
          <div class="row">
            <div class="col-5">
                
                <div class="user-icon-show">
                     <!--ユーザーのアイコン-->
                    @if($user->user_image_file_name === 'images/topimage.jpg')
                        <img src="{{ secure_asset('images/topimage.jpg') }}" alt="user_icon" class="img-circle">
                    @else
                        <img src= "{{ Storage::disk('s3')->url($user->user_image_file_name) }}" alt="user_icon" class="img-circle">
                    @endif
                </div>
               
                
            </div>
            <div class="col-7">
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
        <div class="navbar col-lg-10 offset-lg-1 mt-3">
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
        <div class="col-lg-10 offset-lg-1">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-4 mb-3 d-none d-xl-block">
                        <img src= "{{ Storage::disk('s3')->url($post->image_file_name) }}" alt="post_image" class="img-square-xl img-fluid" data-toggle="modal" data-target="#exampleModal{{ $post->id }}">
                    </div>
                    
                    <div class="col-4 mb-3 d-none d-lg-block d-xl-none">
                        <img src= "{{ Storage::disk('s3')->url($post->image_file_name) }}" alt="post_image" class="img-square-lg img-fluid" data-toggle="modal" data-target="#exampleModal{{ $post->id }}">
                    </div>
                    
                    <div class="col-4 mb-3 d-none d-md-block d-lg-none">
                        <img src= "{{ Storage::disk('s3')->url($post->image_file_name) }}" alt="post_image" class="img-square-md img-fluid" data-toggle="modal" data-target="#exampleModal{{ $post->id }}">
                    </div>
                    
                    <div class="col-4 mb-3 d-none d-sm-block d-md-none">
                        <img src= "{{ Storage::disk('s3')->url($post->image_file_name) }}" alt="post_image" class="img-square-sm img-fluid" data-toggle="modal" data-target="#exampleModal{{ $post->id }}">
                    </div>
                    
                    <div class="col-4 mb-3 d-none d-block d-sm-none">
                        <img src= "{{ Storage::disk('s3')->url($post->image_file_name) }}" alt="post_image" class="img-square-xs img-fluid" data-toggle="modal" data-target="#exampleModal{{ $post->id }}">
                    </div>
                    
                
                    
                    <!--postをmodalで表示-->
                    @include('posts.post')
                @endforeach
            </div>
            {{ $posts->links() }}
        </div>
    </div>
@endsection

	
