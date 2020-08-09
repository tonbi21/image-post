@if(count($users) > 0)
    <div class="col-md-10 offset-md-1">
        <ul class="list-group">
            
            @foreach($users as $user)  
                <li class="list-group-item">
                    <ul class="list-unstyled">
                        <li class="media">
                            
                            <!--ユーザーのアイコン-->
                            <div class="user-icon-users">
                                @if($user->user_image_file_name === 'images/topimage.jpg')
                                    <img src="{{ secure_asset('images/topimage.jpg') }}" alt="user_icon" class="img-circle">
                                @else
                                    <img src= "{{ Storage::disk('s3')->url($user->user_image_file_name) }}" alt="user_icon" class="img-circle">
                                @endif
                            </div>
                           
                            <div class="media-body ml-3">
                                <h5 class="mb-2">{!! link_to_route('users.show', $user->name, ['user' => $user->id]) !!}</h5>
                                <p>{!! nl2br(e($user->introduction)) !!}</p>
                                <div class="float-right">
                                    <!--フォローボタン-->
                                    @include('user_follow.follow_button')
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            @endforeach
            
        </ul>
    </div>
    {{ $users->links() }}
@endif


    