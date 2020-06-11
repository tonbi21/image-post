@if(Auth::id() === $user->id)
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
        退会
    </button>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">アカウント削除</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="font-size: 75%">
            アカウントが削除されると今まで投稿した写真も削除されますがよろしいですか？
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
            {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger inline-block']) !!}
            {!!Form::close() !!}
          </div>
        </div>
      </div>
    </div>
@endif


