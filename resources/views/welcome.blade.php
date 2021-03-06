@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="row">
            <!--ここから投稿-->
            <div class="col-md-6 offset-md-1">
                @foreach($posts as $post)
                    <div class="card mb-5">
                        <div class="card-header">
                            <li class="media">
                                <!--ユーザーアイコンの表示-->
                                <div class="user-icon-post">
                                    @if($post->user->user_image_file_name === 'images/topimage.jpg')
                                        <img src="images/topimage.jpg" alt="user_icon" class="img-circle mr-3">
                                    @else
                                        <img src= "{{ Storage::disk('s3')->url($post->user->user_image_file_name) }}" alt="user_icon" class="img-circle mr-3">
                                    @endif
                                </div>
                                
                                
                                <div class="media-body">
                                    <h5 class="mt-2 ml-2">{!! link_to_route('users.show', $post->user->name, ['user' => $post->user->id]) !!}</h5>
                                </div>
                            </li>
                        </div>
                        <img src= "{{ Storage::disk('s3')->url($post->image_file_name) }}" alt="post_image" width=100% height=auto data-toggle="modal" data-target="#exampleModal{{ $post->id }}">
                        <div class="card-body">
                            <h5>{!! link_to_route('users.show', $post->user->name, ['user' => $post->user->id]) !!}</h5>
                            <p>{{ $post->content }}</p>
                            
                            <!--保存ボタン-->
                            @include('favorites.favorite_button')
                            <!--投稿日の表示-->
                            {{ $post->created_at->format('Y/m/d') }}
                        </div>
                    </div>
                    <!--postをmodalで表示-->
                    @include('posts.post')
                @endforeach
                
                {{ $posts->links() }}
            </div>
            <!--ここまで投稿-->
            
            <div class="col-md-3 d-none d-md-block">
                <div class="auth-user">
                    <li class="media">
                        <!--ユーザーアイコンの表示-->
                        <div class="user-icon-login-user">
                            @if(Auth::user()->user_image_file_name === 'images/topimage.jpg')
                                <img src="{{ secure_asset('images/topimage.jpg') }}" alt="user_icon" class="img-circle">
                            @else
                                <img src= "{{ Storage::disk('s3')->url(Auth::user()->user_image_file_name) }}" alt="user_icon" class="img-circle">
                            @endif
                        </div>
                        
                        <div class="media-body">
                            <h5 class="mt-4 ml-3">{!! link_to_route('users.show', $user->name, ['user' => $user->id]) !!}</h5>
                        </div>
                    </li>
                </div>
                <div class="ather-user mt-5">
                    <ul class="list-unstyled">
                        <h5>おすすめ<span class="float-right">{!! link_to_route('users.index', 'すべて見る', [], ['class' => '']) !!}</span></h5>
                        @foreach($users as $user)  
                          <li class="media mb-3">
                              
                            <!--ユーザーアイコンの表示-->
                            <div class="user-icon-ather-user">
                                @if($user->user_image_file_name === 'images/topimage.jpg')
                                    <img src="{{ secure_asset('images/topimage.jpg') }}" alt="user_icon" class="img-circle">
                                @else
                                    <img src= "{{ Storage::disk('s3')->url($user->user_image_file_name) }}" alt="user_icon" class="img-circle">
                                @endif  
                            </div>
                            
                            <div class="media-body">
                              <h5 class="mt-3 ml-3">{!! link_to_route('users.show', $user->name, ['user' => $user->id]) !!}</h5>
                            </div>
                          </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @else
        <div class="row pb-5">
            <div class="col-sm-6 mt-5">
                <img src="images/topimage.jpg" alt="トップページイメージ" class="w-100">
            </div>
            
            <div class="col-sm-6 mt-5 pt-5">
                <div class="title">
                    <h1>Image-post</h1>
                    <h2>Let's enjoy</h2>
                </div>
                
                <div class="mt-3">
                    {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    @endif

@endsection