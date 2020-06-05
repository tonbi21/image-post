@if(Auth::id() != $user->id)
    @if(Auth::user()->is_following($user->id))
        
        <!--すでにフォロー済みなら表示-->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal{{ $user->id }}">
          Followings
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <div class="modal-title" id="exampleModalLabel">
                    <div class="text-center">
                        <img src="{{ Gravatar::get($user->email, ['size' => 90]) }}" class="rounded-circle" alt="ユーザーアイコン">
                    </div>
                    <p>{{ $user->name }}のフォローをやめますか？</p>
                </div>
                <button type="button" class="close m-0" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-footer">
                {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
                    {!! Form::submit('Unfollow', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
    @else
    
        <!--までフォーローしていなければ表示-->
        {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
            {!! Form::submit('Follow', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
        
    @endif
    
@endif