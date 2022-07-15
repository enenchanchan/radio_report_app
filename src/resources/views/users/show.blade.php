@extends('layouts.app')
@section('title','ユーザーページ')
@include('layouts.nav')
@section('content')
@include('users.user')
<!--タブ -->
<ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
        <a href="{{route('users.show',['name'=>$user->name])}}" class="nav-link active d-grid" data-mdb-toggle="tab" role="tab" aria-selected="true" id="ex1-tab-1" aria-controls="ex1-tabs-1">投稿一覧</a>
    </li>
    <li class="nav-item" role="presentation">
        <a href="{{route('users.favorites',['name'=>$user->name])}}" class="nav-link " data-mdb-toggle="tab" role="tab" aria-selected="false" id="ex1-tab-2" aria-controls="ex1-tabs-2">お気に入り番組一覧</a>
    </li>
</ul>
@foreach($articles as $article)
@include('articles.about')
@endforeach
@endsection