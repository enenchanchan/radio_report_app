@extends('layouts.app')
@section('title','番組詳細')
@section('content')
@include('radios.card')
@if(count($articles) == 0 )
<div class="text-center text-danger mt-5">
    <h2>この番組に関する投稿がありません。</h2>
</div>
@else
@foreach($articles as $article)
@include('articles.about')
@endforeach
{{$articles->links('vendor.pagination.bootstrap-5')}}
@endif
@endsection