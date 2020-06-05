@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="row">
            <div class="col-md-6 offset-md-1">
                @foreach($posts as $post)
                    <div class="card mb-5">
                        <div class="card-header">
                            <li class="media">
                                <img src="{{ Gravatar::get($post->user->email, ['size' => 30]) }}" class="mr-3 rounded-circle" alt="ユーザーアイコン">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1">{!! link_to_route('users.show', $post->user->name, ['user' => $user->id]) !!}</h5>
                                </div>
                            </li>
                        </div>
                        <img src= "{{ Storage::disk('s3')->url($post->image_file_name) }}" alt="post_image" width=100% height=auto data-toggle="modal" data-target="#exampleModal{{ $post->id }}">
                        <div class="card-body">
                            <h5>{!! link_to_route('users.show', $post->user->name, ['user' => $user->id]) !!}</h5>
                            <p>{{ $post->content }}</p>
                        </div>
                    </div>
                    
                    <!--postをmodalで表示-->
                    @include('posts.post')
                    
                @endforeach
            </div>
            
            <div class="col-md-3 d-none d-md-block">
                <div class="auth-user">
                    <li class="media">
                        <img src="{{ Gravatar::get($user->email, ['size' => 70]) }}" class="mr-3 rounded-circle" alt="ユーザーアイコン">
                        <div class="media-body">
                            <h5 class="mt-3 mb-0">{!! link_to_route('users.show', $user->name, ['user' => $user->id]) !!}</h5>
                        </div>
                    </li>
                </div>
                <div class="ather-user mt-5">
                    <ul class="list-unstyled">
                        <h5>おすすめ<span class="float-right">{!! link_to_route('users.index', 'すべて見る', [], ['class' => '']) !!}</span></h5>
                        @foreach($users as $user)  
                          <li class="media mb-3">
                            <img src="{{ Gravatar::get($user->email, ['size' => 50]) }}" class="mr-3 rounded-circle" alt="ユーザーアイコン">
                            <div class="media-body">
                              <h5 class="mt-2 mb-0">{!! link_to_route('users.show', $user->name, ['user' => $user->id]) !!}</h5>
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