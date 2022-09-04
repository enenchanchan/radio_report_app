<div class="card border border-dark mt-3">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h2><a href="{{route('radios.show',['radio'=>$radio])}}">{{$radio->radio_title}}</a></h2>
            <radio-favorite :initial-is-favorited-by='@json($radio->isFavoritedBy(Auth::user()))' :initial-count-favorites='@json($radio->count_favorites)' :authorized='@json(Auth::check())' endpoint="{{route('radios.favorite',['radio' => $radio])}}">
            </radio-favorite>

            <div class="ms-auto card-text">
                <div class="dropdown">
                    <button type="button" class="btn btn-link text-muted m-0 p-2" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu text-center border border-dark" aria-labelledby="dropdownMenuButton">
                        <li>
                            <a class="dropdown-item text-primary" href="{{route('articles.create')}}">
                                <i class="fa-solid fa-user-pen"></i> 視聴メモを残す
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider border-dark"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('radios.edit',['radio'=>$radio])}}">
                                <i class="fa-regular fa-pen-to-square"></i> 番組情報を編集する
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider border-dark"></div>
                        </li>
                        @can('isAdmin')
                        <li>
                            <a href="" class="dropdown-item text-danger" data-mdb-toggle="modal" data-mdb-target="#modal-delete-{{ $radio->id }}">
                                番組情報を削除する <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </li>
                        @else
                        <small class="text-danger"><i class="fa-solid fa-ban"></i>番組情報の削除は<br>管理者のみ可能です。</small>
                        @endcan
                    </ul>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modal-delete-{{ $radio->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        </div>
                        <form method="POST" action="{{route('radios.destroy',['radio'=>$radio])}}">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">{{$radio->radio_title}}に関する番組情報を削除しますか？</div>
                            <div clasgit s="modal-footer">
                                <button type="button" class="btn btn-rounded" data-mdb-dismiss="modal">キャンセル</button>
                                <button type="submit" class="btn btn-danger btn-rounded">削除</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex">
            <h5 class="card-text me-2">{{$radio->broadcaster}}</h5>
            <h5 class="card-text">{{$radio->radio_date}} {{date('H:i',strtotime($radio->start_time))}}~{{date('H:i',strtotime($radio->end_time))}}放送</h5>
        </div>

        @if($radio->image !== null)
        <div class="text-center mt-3 mb-3">
            <img src=" {{asset('storage/' . $radio->image)}}" class="w-50">
        </div>
        @else
        <div class="text-center mt-3 mb-3">
            <img src=" {{asset('storage/radio_noimage.png')}}" class="w-50">
        </div>
        @endif
    </div>

    <div class="card-body">
        <p class="card-text">{{$radio->radio_about}}</a>
    </div>

</div>