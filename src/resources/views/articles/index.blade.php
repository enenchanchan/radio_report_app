@extends('layouts.app')
@section('title','投稿一覧')
@include('layouts.nav')
@section('content')
@foreach($articles as $article)
<div class="card mt-3 ">
    <div class="card-header d-flex justify-content-between">
        <p>番組名{{$article->radio_id}}</p>
        <p>{{$article->radio_date}}放送分</p>
    </div>
    <div class="card-body">
        <label for="">内容</label>
        <p class="card-text">{{$article->body}}</p>
        <a href="">{{$article->link}}</a>
        <div class="card-footer">
            <p>{{$article->user_id}}</p>
        </div>
    </div>
</div>
@endforeach
@endsection