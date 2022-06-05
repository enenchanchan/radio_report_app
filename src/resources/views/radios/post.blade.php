@extends('layouts.app')
@section('title','ラジオ番組新規登録')
@include('layouts.nav')
@section('content')
<div class="card">
    <form method="POST" action="{{route('radios.store')}}">
        @csrf
        <div class="md-form">
            <label for="">番組名</label>
            <input type="text" name="radio_title" class="form-control" required value="{{$radio->radio_title ?? old('title')}}">
        </div>

        <div class="form-group">
            <label for="">放送日時</label>
            <input type="date" name="radio_date" required class="form-control" placeholder="放送日時" value="{{$radio->radio_date ?? old('date')}}">
        </div>
        <div class="form-group">
            <label for="">放送局</label>
            <input type="text" name="broadcaster" rows="16" class="form-control" value="{{$article->body ?? old('body')}}">
        </div>
        <div class="form-group">
            <label for="">番組情報</label>
            <textarea type="text" name="radio_about" rows="16" id="" placeholder="内容" class="form-control"> {{$article->body ?? old('body')}}</textarea>
        </div>
        <button type="submit" class="btn">番組を登録する</button>
    </form>
</div>
@endsection