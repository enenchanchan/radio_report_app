@extends('layouts.app')
@section('title','番組情報変更')
@section('content')
<h1 class="text-center m-3 ">番組情報編集</h1>
<div class="card border border-dark">
    <form method="POST" enctype="multipart/form-data" accept="image/png,image/jpeg,image/jpg" action="{{route('radios.update',['radio'=>$radio])}}">
        @method('patch')
        @csrf
        @include('radios.form')
        <div class="text-center mb-3">
            <button type="submit" class="btn btn-primary">番組情報を変更する</button>
        </div>
    </form>
</div>
@endsection