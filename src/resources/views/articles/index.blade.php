@extends('layouts.app')
@section('title','投稿一覧')
@section('content')
<div class="mt-5 text-center">
    <form action="{{route('articles.index')}}" method="GET">
        <input type="search" class="w-75" name="keyword" value="{{$keyword}}" placeholder="投稿を検索">
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>
@foreach($articles as $article)
@include('articles.about')
@endforeach
@if(count($articles) == 0 )
<div class="text-center text-danger mt-5">
    <h2>条件に合致する投稿がありません。</h2>
</div>
@endif
{{$articles->appends(request()->query())->links('vendor.pagination.bootstrap-5')}}
@endsection