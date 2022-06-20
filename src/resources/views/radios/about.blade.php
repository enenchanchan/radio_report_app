@extends('layouts.app')
@section('title','番組詳細')
@include('layouts.nav')
@section('content')
<div class="card bg-success mt-3 ">
    <div class="card-header d-flex justify-content-between">
        <p>{{$radio->radio_title}}</p>
        <p>{{$radio->radio_date}} {{date('H:i',strtotime($radio->start_time))}}~{{date('H:i',strtotime($radio->end_time))}}</p>

        <div class="ml-auto card-text">
            <div class="dropdown">
                <button type="button" class="btn btn-link text-muted m-0 p-2" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                    <li>
                        <a class="dropdown-item" href="{{route('radios.edit',['radio'=>$radio])}}">
                            番組情報を編集する
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li>
                        <a href="" class="dropdown-item text-danger" data-mdb-toggle="modal" data-mdb-target="#modal-delete-{{ $radio->id }}">
                            番組情報を削除する
                        </a>
                    </li>
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
                        <div class="modal-body">{{$radio->radio_id}}に関する番組情報を削除しますか？</div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-mdb-dismiss="modal">キャンセル</button>
                            <button type="submit" class="btn btn-danger">削除</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="card-body">
        <p class="card-text">放送局:{{$radio->broadcaster}}</p>
        <p class="card-text">概要:{{$radio->radio_about}}</a>
    </div>
</div>
@endsection