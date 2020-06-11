@if(count($users) > 0)
    <div class="col-md-10 offset-md-1">
        <ul class="list-group">
            
            @foreach($users as $user)  
                <li class="list-group-item">
                    <ul class="list-unstyled">
                        <li class="media">
                            
                            <!--ユーザーのアイコン-->
                            @if($user->user_image_file_name === 'images/topimage.jpg')
                                <img src="{{ secure_asset('images/topimage.jpg') }}" alt="user_icon" class="mr-3 rounded-circle mr-3" width="13%" height="13%">
                            @else
                                <img src= "{{ Storage::disk('s3')->url($user->user_image_file_name) }}" alt="user_icon" class="rounded-circle mr-3" width="13%" height="15%">
                            @endif
                           
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">{!! link_to_route('users.show', $user->name, ['user' => $user->id]) !!}</h5>
                                <p>{!! nl2br(e($user->introduction)) !!}</p>
                            </div>
                        </li>
                    </ul>
                </li>
            @endforeach
            
        </ul>
    </div>
    
@endif


    