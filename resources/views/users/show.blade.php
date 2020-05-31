@extends('layouts.app')

@section('content')
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
                    <a class="nav-link active" href="#">投稿件数</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">フォローワー数</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">フォロー数</a>
                  </li>
                </ul>    
            </div>
            
            <div class="self-introduction">
                自己紹介ぶんがここに入ります。
            </div>
        </div>
        
        <div class="navbar col-sm-12">
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
        <div class="col-sm-4">
            <p>投稿した画像が表示されるよ</p>
        </div>
        <div class="col-sm-4">
            <p>投稿した画像が表示されるよ</p>
        </div>
        <div class="col-sm-4">
            <p>投稿した画像が表示されるよ</p>
        </div>
        <div class="col-sm-4">
            <p>投稿した画像が表示されるよ</p>
        </div>
        <div class="col-sm-4">
            <p>投稿した画像が表示されるよ</p>
        </div>
        <div class="col-sm-4">
            <p>投稿した画像が表示されるよ</p>
        </div>
        <div class="col-sm-4">
            <p>投稿した画像が表示されるよ</p>
        </div>
    </div>
@endsection