@extends('layouts.app')
@section('title','投稿一覧')
@include('layouts.nav')
@section('content')
@foreach($articles as $article)
<div class="card">
    <div class="card-header">
        <p>{{$article->radio_id}}</p>
        <p>{{$article->radio_date}}</p>
    </div>
    <div class="card-body">
        <p class="card-text">{{$article->body}}</p>
        <a href="">{{$article->link}}</a>
        <div class="card-footer">
            <p>{{$Article->user_id}}</p>
        </div>
    </div>
</div>
@endforeach
@endsection