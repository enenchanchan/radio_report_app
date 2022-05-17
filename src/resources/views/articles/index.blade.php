@extends('layouts.app')
@section('title','投稿一覧')
@include('layouts.nav')
@section('content')
@foreach($articles as $article)
@include('articles.about')
@endforeach
@endsection