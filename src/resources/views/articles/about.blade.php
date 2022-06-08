<div class="card mt-3 ">
    <div class="card-header d-flex justify-content-between">
        <p>番組名:<a href="{{route('radios.show',[''])}}">{{$article->radio_title}}</a></p>
        <p>{{$article->radio_date}}放送分</p>
        @if(Auth::id() === $article->user_id)
        <div class="ml-auto card-text">
            <div class="dropdown">
                <button type="button" class="btn btn-link text-muted m-0 p-2" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                    <li>
                        <a class="dropdown-item" href="{{route('articles.edit',['article'=>$article])}}">
                            投稿を編集する
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li>
                        <a href="" class="dropdown-item text-danger" data-mdb-toggle="modal" data-mdb-target="#modal-delete-{{ $article->id }}">
                            投稿を削除する
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modal-delete-{{ $article->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{route('articles.destroy',['article'=>$article])}}">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">{{$article->radio_date}}放送の{{$article->radio_title}}に関する投稿を削除しますか？</div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-mdb-dismiss="modal">キャンセル</button>
                            <button type="submit" class="btn btn-danger">削除</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="card-body">
        <label for="">内容</label>
        <p class="card-text">{{$article->body}}</p>
        <label for="">リンク</label>
        <a href="" class="card-text">{{$article->link}}</a>
        <div class="card-footer">
            <p>{{$article->user->name}}</p>
        </div>
    </div>
</div>