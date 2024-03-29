@extends('layouts.app')
@section('title','投稿一覧')
@section('content')
<div class="text-center">
    <form action="{{route('articles.index')}}" method="GET">
        <input type="search" class="w-75" name="keyword" value="{{$keyword}}" placeholder="投稿検索">
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>
@if(count($articles) == 0 )
<div class="text-center text-danger mt-5">
    <h2>投稿がありません。</h2>
</div>
@else
@foreach($articles as $article)
@include('articles.about')
@endforeach
{{$articles->appends(request()->query())->links('vendor.pagination.bootstrap-5')}}
@endif
@endsection