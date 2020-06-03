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
                <div class="user-menu">
                    {{ $user->name }}
                    <a href="#" class="btn btn-primary">プロフィール編集</a>
                </div>
                
                <div class="navbar">
                    <ul class="nav justify-content-center">
                      <li class="nav-item">
                        投稿{{ $user->posts_count }}件
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">フォローワー数</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">フォロー数</a>
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