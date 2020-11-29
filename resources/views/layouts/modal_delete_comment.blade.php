<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger float-right mr-5" data-toggle="modal" data-target="#exampleModal_c{{ $comment->id }}">削除</button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal_c{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">削除確認</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5>このコメントを削除します。よろしいですか？</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
          <form method="post" action="{{ action('CommentsController@destroy', [$post, $comment]) }}">
              {{ csrf_field() }}
              {{ method_field('delete') }}
              <button type="submit" class="btn btn-primary">はい</button>
          </form>
        </div>
      </div>
    </div>
  </div>