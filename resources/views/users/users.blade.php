@if(count($users) > 0)
    <ul class="list-unstyled">
        @foreach($users as $user)  
          <li class="media">
            <img src="{{ Gravatar::get($user->email, ['size' => 100]) }}" class="mr-3 rounded-circle" alt="ユーザーアイコン">
            <div class="media-body">
              <h5 class="mt-0 mb-1">{!! link_to_route('users.show', $user->name, ['user' => $user->id]) !!}</h5>
              ユーザーの自己紹介
            </div>
          </li>
        @endforeach
    </ul>
    <!--ページネーションのリンク-->
    {{ $users->links() }}
@endif