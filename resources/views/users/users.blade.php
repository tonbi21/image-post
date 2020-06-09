@if(count($users) > 0)
    <div class="col-md-10 offset-md-1">
        <ul class="list-group">
            
            @foreach($users as $user)  
                <li class="list-group-item">
                    <ul class="list-unstyled">
                        <li class="media">
                            <img src="{{ Gravatar::get($user->email, ['size' => 100]) }}" class="mr-3 rounded-circle" alt="ユーザーアイコン">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">{!! link_to_route('users.show', $user->name, ['user' => $user->id]) !!}</h5>
                                <p>{{ $user->introduction }}</p>
                            </div>
                        </li>
                    </ul>
                </li>
            @endforeach
            
        </ul>
    </div>
    
@endif


    