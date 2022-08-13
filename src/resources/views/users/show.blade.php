@extends('layouts.app')
@section('title',$user->name.'のページ')
@section('content')
@include('users.user',['article_tab'=>true,'favorite_tab'=>false])
<!--タブ -->

@if(count($articles) == 0 )
<div class="text-center text-danger mt-5">
    <h2>視聴メモの投稿がありません。</h2>
</div>
@else
@foreach($articles as $article)
@include('articles.about')
@endforeach
{{$articles->links('vendor.pagination.bootstrap-5')}}
@endif
@endsection