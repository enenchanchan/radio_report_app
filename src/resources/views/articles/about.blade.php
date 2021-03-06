<div class="card mt-5">
    <div class="card-header d-flex justify-content-between">
        <a href="{{route('users.show',['name'=>$article->user->name])}}">{{$article->user->name}}</a>
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
                        <div class="modal-body">{{$article->radio_date}}放送の{{$article->radio->radio_title}}に関する投稿を削除しますか？</div>
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
        <div class="d-flex justify-content-between">
            <h5 class="card-title">番組名:<a href="{{route('radios.show',[$article->radio_id])}}">{{$article->radio->radio_title}}</a></h5>
            <p>{{$article->radio_date}}放送分</p>
        </div>
        <p class="card-text">{{$article->body}}</p>
    </div>
    <div class="card-footer">
        <a href="{{$article->link}}" target="_brank" rel="noopener noreferrer" class="card-text">{{$article->link}}</a>
    </div>
</div>