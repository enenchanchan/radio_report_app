@extends('layouts.app')
@section('title','番組詳細')
@include('layouts.nav')
@section('content')
@include('radios.card')
@foreach($articles as $article)
@include('articles.about')
@endforeach
@endsection