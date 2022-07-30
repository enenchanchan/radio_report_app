@extends('layouts.app')
@section('title','ラジオ番組新規登録')
@section('content')
<h1 class="text-center m-3">番組新規登録</h1>
<div class="card">
    <form method="POST" enctype="multipart/form-data" accept="image/png,image/jpeg,image/jpg" action="{{route('radios.store')}}">
        @csrf
        @include('radios.form')
        <div class="text-center">
            <button type="submit" class="btn">番組を登録する</button>
        </div>
    </form>
</div>
@endsection