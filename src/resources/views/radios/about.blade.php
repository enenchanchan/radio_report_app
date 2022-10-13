@extends('layouts.app')
@section('title','番組詳細')
@section('content')
@include('radios.card')
@if(count($articles) == 0 )
<div class="text-center text-danger mt-5">
    <h4>この番組に関する投稿は、<br>まだありません。</h4>
    <a href="{{route('articles.create')}}">→この番組についての視聴メモを投稿する</a>
</div>
@else
<div class="text-center mt-5">
    <h2>投稿一覧</h2>
</div>
@foreach($articles as $article)
@include('articles.about')
@endforeach
{{$articles->links('vendor.pagination.bootstrap-5')}}
@endif
@endsection