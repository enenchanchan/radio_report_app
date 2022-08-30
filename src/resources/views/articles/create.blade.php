@extends('layouts.app')
@section('title','新規投稿')
@section('content')
<h1 class="text-center">新規投稿</h1>
<div class="card border border-dark">
    <form method="POST" action="{{route('articles.store')}}">
        @csrf
        @include('articles.form')
        <div class="text-center mb-3">
            <button type="submit" class="btn btn-primary">投稿する</button>
        </div>
    </form>
</div>
@endsection