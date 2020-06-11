<nav class="navbar navbar-expand navbar-light bg-light mb-4">
  <a class="navbar-brand" href="/">Image-post</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-bar" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="nav-bar">
    <ul class="navbar-nav mr-auto"></ul>
    <ul class="navbar-nav">
      @if(Auth::check())
        <li class="nav-item">
          <a href="#" class="nav-link dropdown-toggle text-right" data-toggle="dropdown">
                @if(Auth::user()->user_image_file_name === 'images/topimage.jpg')
                    <img src="{{ secure_asset('images/topimage.jpg') }}" alt="user_icon" class="mr-3 rounded-circle" width="6%">
                @else
                    <img src= "{{ Storage::disk('s3')->url(Auth::user()->user_image_file_name) }}" alt="user_icon" class="mr-3 rounded-circle" width="6%">
                @endif
          </a>
          <ul class="dropdown-menu dropdown-menu-right">
            <li class="nav-item">
              {!! link_to_route('users.show', 'マイプロイフィール', ['user' => Auth::id()], ['class' => 'nav-link']) !!}
            </li>
            <li class="nav-item">
              {!! link_to_route('users.index', 'ユーザー一覧', [], ['class' => 'nav-link']) !!}
            </li>
            <li class="nav-item">
              {!! link_to_route('posts.create', '新規投稿', [], ['class' => 'nav-link']) !!}
            </li>
            <li class="nav-item">
              {!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}
            </li>
            
          </ul>
        </li>
        
        
      @else
        <li class="nav-item">
          {!! link_to_route('signup.get', 'signup', [], ['class' => 'nav-link']) !!}
        </li>
        <li class="nav-item">
          {!! link_to_route('login', 'login', [], ['class' => 'nav-link']) !!}
        </li>
      @endif
    </ul>
  </div>
</nav>