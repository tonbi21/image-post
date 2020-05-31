<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <a class="navbar-brand" href="/">Image-post</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      @if(Auth::check())
        <li class="nav-item">
          {!! link_to_route('logout.get', 'logout', [], ['class' => 'nav-link']) !!}
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