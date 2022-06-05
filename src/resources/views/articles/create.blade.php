@extends('layouts.app')
@section('title','新規投稿')
@include('layouts.nav')
@section('content')
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