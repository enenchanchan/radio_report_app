@extends('layouts.app')
@section('title',$user->name.'のお気に入り番組')
@section('content')
@include('users.user')
<!-- タブ -->
<ul class="nav nav-tabs nav-fill bg-white mt-3">
    <li class="nav-item border">
        <a href="{{route('users.show',['user'=>$user->id])}}" class="nav-link">投稿一覧</a>
    </li>
    <li class="nav-item border">
        <a href="{{route('users.favorites',['user'=>$user->id])}}" class="nav-link active">お気に入り番組一覧</a>
    </li>
</ul>

@if(count($radios) == 0)
<div class=" text-center text-danger mt-5">
    <h2>お気に入り番組が登録されていません。</h2>
</div>
@else
@foreach($radios as $radio)
@include('radios.card')
@endforeach
{{$radios->links('vendor.pagination.bootstrap-5')}}
@endif

@endsection