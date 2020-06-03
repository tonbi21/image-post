<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <a class="navbar-brand" href="/">Image-post</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="nav-bar">
    <ul class="navbar-nav mr-auto"></ul>
    <ul class="navbar-nav">
      @if(Auth::check())
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="{{ Gravatar::get(Auth::user()->email, ['size' => 50]) }}" class="mr-3 rounded-circle" alt="ユーザーアイコン">
          </a>
          <ul class="dropdown-menu dropdown-menu-right">
            <li class="nav-item">
              {!! link_to_route('users.show', 'My profile', ['user' => Auth::id()], ['class' => 'nav-link']) !!}
            </li>
            <li class="nav-item">
              {!! link_to_route('users.index', 'Users', [], ['class' => 'nav-link']) !!}
            </li>
            <li class="nav-item">
              {!! link_to_route('logout.get', 'Logout', [], ['class' => 'nav-link']) !!}
            </li>
            <li class="nav-item">
              {!! link_to_route('posts.create', 'Create post', [], ['class' => 'nav-link']) !!}
            </li>
            
          </ul>
        </li>
        
        
      @else
        <li class="nav-item">
          {!! link_to_route('signup.get', 'signup', [], ['class' => 'nav-link']) !!}
        </li>
        <li class="nav-item">
          {!! link_to_route('login.get', 'login', [], ['class' => 'nav-link']) !!}
        </li>
      @endif
    </ul>
  </div>
</nav>