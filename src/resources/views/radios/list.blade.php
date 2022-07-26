@extends('layouts.app')
@section('title','登録番組一覧')
@section('content')
<h1 class="text-center mt-5">登録番組一覧</h1>
<radio-table :radios="{{$radios}}" class="mt-3"></radio-table>
@endsection