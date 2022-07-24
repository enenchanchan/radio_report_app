@extends('layouts.app')
@section('title','新規投稿')
@section('content')
<h1 class="text-center m-3">新規投稿</h1>
<div class="card">
    <form method="POST" action="{{route('articles.store')}}">
        @csrf
        @include('articles.form')
        <div class="text-center">
            <button type="submit" class="btn">投稿する</button>
        </div>
    </form>
</div>
@endsection