@extends('layouts.app')
@section('title',$user->name.'のページ')
@include('layouts.nav')
@section('content')
@include('users.user')
<!--タブ -->
<ul class="nav nav-tabs nav-fill">
    <li class="nav-item">
        <a href="{{route('users.show',['name'=>$user->name])}}" class="nav-link active">投稿一覧</a>
    </li>
    <li class="nav-item">
        <a href="{{route('users.favorites',['name'=>$user->name])}}" class="nav-link ">お気に入り番組一覧</a>
    </li>
</ul>

@if(count($articles) == 0 )
<div class="text-center  text-danger mt-5">
    <h2>視聴メモの投稿がありません。</h2>
</div>
@else
@foreach($articles as $article)
@include('articles.about')
@endforeach
{{$articles->links('vendor.pagination.bootstrap-5')}}
@endif

@endsection