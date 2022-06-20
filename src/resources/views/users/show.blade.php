@extends('layouts.app')
@section('title','ユーザーページ')
@include('layouts.nav')
@section('content')
@include('users.user')
<!--タブ -->
<ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1" aria-selected="true">投稿一覧</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2" role="tab" aria-controls="ex1-tabs-2" aria-selected="false" href="{{route('users.favorites',['name'=>$user->name])}}">お気に入り番組</a>
    </li>
</ul>
@foreach($articles as $article)
@include('articles.about')
@endforeach
@endsection