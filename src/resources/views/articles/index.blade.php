@extends('layouts.app')
@section('title','投稿一覧')
@section('content')
<div class="mt-5 text-center">
    <form action="{{route('articles.index')}}" method="GET">
        <input type="text" class="w-75" name="keyword" value="{{$keyword}}" placeholder="&#xf002;投稿を検索" style="font-family:fontawesome;">
        <button type="submit" class="bt btn-primary">検索</button>
    </form>
</div>

@if(count($articles) == 0 )
<div class="text-center text-danger mt-5">
    <h2>条件に合致する投稿がありません。</h2>
</div>
@else
@foreach($articles as $article)
@include('articles.about')
@endforeach
@endif

{{$articles->appends(request()->query())->links('vendor.pagination.bootstrap-5')}}
@endsection