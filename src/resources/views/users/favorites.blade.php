@extends('layouts.app')
@section('title',$user->name.'のお気に入り番組')
@include('layouts.nav')
@section('content')
@include('users.user')
<!--　タブ -->
<ul class="nav nav-tabs nav-fill">
    <li class="nav-item">
        <a href="{{route('users.show',['name'=>$user->name])}}" class="nav-link">投稿一覧</a>
    </li>
    <li class="nav-item">
        <a href="{{route('users.favorites',['name'=>$user->name])}}" class="nav-link active">お気に入り番組一覧</a>
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