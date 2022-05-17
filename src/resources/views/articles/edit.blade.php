@extends('layouts.app')
@section('title','新規投稿')
@include('layouts.nav')
@section('content')
<div class="card">
    <form method="POST" action="{{route('articles.update',['article'=>$article])}}">
        @method('patch')
        @csrf
        @include('articles.form')
        <button type="submit" class="btn">投稿する</button>
    </form>
</div>
@endsection