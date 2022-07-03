@extends('layouts.app')
@section('title','ユーザーページ')
@include('layouts.nav')
@section('content')
@include('users.user')
<!--タブ -->
<ul class="nav nav-tabs nav-fill mb-3" id="myTab0" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link" data-mdb-toggle="tab" type="button" role="tab" aria-selected="true">
            <a href="{{route('users.show',['name'=>$user->name])}}">投稿一覧</a>
        </button>
    </li>
    <li class="nav-item active" role="presentation">
        <button class="nav-link" data-mdb-toggle="tab" type="button" role="tab" aria-selected="false">
            <a href="{{route('users.favorites',['name'=>$user->name])}}">お気に入り番組一覧</a>
        </button>
    </li>
</ul>
@foreach($articles as $article)
@include('articles.about')
@endforeach
@endsection