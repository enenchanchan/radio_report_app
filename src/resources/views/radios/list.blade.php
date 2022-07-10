@extends('layouts.app')
@section('title','登録番組一覧')
@include('layouts.nav')
@section('content')
<radio-table :radios="{{$radios}}"></radio-table>
@endsection