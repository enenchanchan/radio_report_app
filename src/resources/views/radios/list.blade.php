@extends('layouts.app')
@section('title','登録番組一覧')
@include('layouts.nav')
@section('content')
<h1 class="text-center m-3">登録番組一覧</h1>
<radio-table :radios="{{$radios}}"></radio-table>
@endsection