<div class="card mt-5 border border-dark">
    @if($radio->image !== null)
    <div class="text-center mt-3 mb-3">
        <img src=" {{asset('storage/' . $radio->image)}}" class="w-50">
    </div>
    @else
    <div class="text-center mt-3 mb-3">
        <img src=" {{asset('storage/radio_noimage.png')}}" class="w-50">
    </div>
    @endif
    <div class="card-header d-flex justify-content-between">
        <h3><a href="{{route('radios.show',['radio'=>$radio])}}">{{$radio->radio_title}}</a></h3>
        <radio-favorite :initial-is-favorited-by='@json($radio->isFavoritedBy(Auth::user()))' :initial-count-favorites='@json($radio->count_favorites)' :authorized='@json(Auth::check())' endpoint="{{route('radios.favorite',['radio' => $radio])}}">
        </radio-favorite>

        <div class="ms-auto card-text">
            <div class="dropdown">
                <button type="button" class="btn btn-link text-muted m-0 p-2" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu text-center border border-dark" aria-labelledby="dropdownMenuButton">
                    <li>
                        <a class="dropdown-item" href="{{route('articles.create')}}">
                            視聴メモを残す
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider border-dark"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('radios.edit',['radio'=>$radio])}}">
                            番組情報を編集する
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider border-dark"></div>
                    </li>
                    @can('isAdmin')
                    <li>
                        <a href="" class="dropdown-item text-danger" data-mdb-toggle="modal" data-mdb-target="#modal-delete-{{ $radio->id }}">
                            番組情報を削除する
                        </a>
                    </li>
                    @else
                    <small>番組情報の削除は<br>管理者のみ可能です。</small>
                    @endcan
                </ul>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-delete-{{ $radio->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{route('radios.destroy',['radio'=>$radio])}}">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">{{$radio->radio_title}}に関する番組情報を削除しますか？</div>
                        <div clasgit s="modal-footer">
                            <button type="button" class="btn" data-mdb-dismiss="modal">キャンセル</button>
                            <button type="submit" class="btn btn-danger">削除</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="">
            <p>放送日時 {{$radio->radio_date}} {{date('H:i',strtotime($radio->start_time))}}~{{date('H:i',strtotime($radio->end_time))}}</p>
            <p class="card-text">放送局 {{$radio->broadcaster}}</p>
        </div>
    </div>
    <div class="card-body">
        <p class="card-text">{{$radio->radio_about}}</a>
    </div>




</div>