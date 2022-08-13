@extends('layouts.app')
@section('title',$user->name.'のお気に入り番組')
@section('content')
@include('users.user',['article_tab'=>false,'favorite_tab'=>true])
<!-- タブ -->

@if(count($radios) == 0)
<div class=" text-center text-danger mt-5">
    <h2>お気に入り番組が登録されていません。</h2>
</div>
@else
@foreach($radios as $radio)
@include('radios.card')
@endforeach
{{$radios->links('vendor.pagination.bootstrap-5')}}
@endif

@endsection