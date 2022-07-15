@extends('layouts.app')
@section('title','投稿編集')
@include('layouts.nav')
@section('content')
<h1 class="text-center m-3">投稿編集</h1>
<div class="card">
    <form method="POST" action="{{route('articles.update',['article'=>$article])}}">
        @method('patch')
        @csrf
        @include('articles.form')
        <div class="text-center">
            <button type="submit" class="btn">変更する</button>
        </div>
    </form>
</div>
@endsection