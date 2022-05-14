@extends('layouts.app')
@section('title','投稿一覧')
@section('content')
<div class="card">
    <div class="card-header">
        <p>番組名</p>
        <p>放送日時</p>
    </div>
    <div class="card-body">
        <p class="card-text">本文</p>
        <a href="">放送リンク</a>
        <div class="card-footer">
            <p>{{}}</p>
        </div>
    </div>
</div>
@endsection