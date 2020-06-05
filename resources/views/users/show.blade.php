@extends('layouts.app')

@section('content')
    <div class="row">
      
      <!--ユーザープロフィール-->
        <div class="col-md-10 offset-md-1">
          <div class="row">
            <div class="col-sm-5">
                <img src="{{ Gravatar::get($user->email, ['size' => 150]) }}" class="mr-3 rounded-circle" alt="ユーザーアイコン">
            </div>
            <div class="col-sm-7">
                <div class="user-menu h4">
                    {{ $user->name }}
                    <!--プロフィール編集-->
                    <i class="fas fa-cogs ml-3"></i>
                    
                    <!--フォローボタン-->
                    @include('user_follow.follow_button')
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
                
                <div class="self-introduction" >
                    自己紹介がここに入ります。
                </div>
            </div>
          </div>
        </div>
        
        <!--自分の投稿と保存した投稿の切替バー-->
        <div class="navbar col-sm-10 offset-md-1">
            <ul class="nav nav-tabs text-center">
              <li class="nav-item">
                <a class="nav-link active" href="#">投稿</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">保存</a>
              </li>
            </ul>
        </div>
        
        <!--投稿した画像一覧-->
        <div class="row">
          <div class="col-md-10 offset-md-1">
            <div class="row">
            @foreach($posts as $post)
              <div class="col-md-4 mb-3">
                <img src= "{{ Storage::disk('s3')->url($post->image_file_name) }}" alt="post_image" class="img-fluid" data-toggle="modal" data-target="#exampleModal{{ $post->id }}">
              </div>
              
              <!--postをmodalで表示-->
              @include('posts.post')
              
            @endforeach
            </div>
          </div>
        </div>
        
    </div>
@endsection