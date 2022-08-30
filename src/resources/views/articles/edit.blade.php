@extends('layouts.app')
@section('title','投稿編集')
@section('content')
<h1 class="text-center">投稿編集</h1>
<div class="card border border-dark">
    <form method="POST" action="{{route('articles.update',['article'=>$article])}}">
        @method('patch')
        @csrf
        @include('articles.form')
        <div class="text-center mb-3">
            <button type="submit" class="btn btn-primary">変更する</button>
        </div>
    </form>
</div>
@endsection