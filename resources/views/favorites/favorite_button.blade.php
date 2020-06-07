@if(Auth::user()->is_favorites($post->id))
    
    <!--保存済み-->
    
    {!! Form::open(['route' => ['favorites.unfavorite', $post->id], 'method' => 'delete']) !!}
        
        <button type="submit" class="btn btn-link" style="color: black;">
             <i class="fas fa-bookmark fa-lg"></i>
        </button>
       
    {!! Form::close() !!}
    
@else
    
    <!--保存する-->
    
    {!! Form::open(['route' => ['favorites.favorite', $post->id]]) !!}
        <button type="submit" class="btn btn-link" style="color: black;">
            <i class="far fa-bookmark fa-lg"></i>
        </button>
    {!! Form::close() !!}
    
@endif