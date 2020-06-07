<!--投稿をモダールで表示-->
<div class="modal fade" id="exampleModal{{ $post->id }}", tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"> 
            <div class="row">
                <div class="col-md-8">
                    <img src= "{{ Storage::disk('s3')->url($post->image_file_name) }}" alt="post_image" width=100% height=auto>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="post-content">
                            <h5>{!! link_to_route('users.show', $user->name, ['user' => $user->id]) !!}</h5>
                            <p>{{ $post->content }}</p>
                            
                            <div class="text-right">
                                <!--保存ボタンの設置-->
                                @include('favorites.favorite_button')
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>