@extends('layouts.app')
@section('title','番組情報変更')
@include('layouts.nav')
@section('content')
<div class="card">
    <form method="POST" action="{{route('radios.update',['radio'=>$radio])}}">
        @method('patch')
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
            <input type="text" name="broadcaster" rows="16" class="form-control" value="{{$radio->broadcaster ?? old('broadcaster')}}">
        </div>
        <div class="form-group">
            <label for="">番組情報</label>
            <textarea type="text" name="radio_about" rows="16" id="" placeholder="内容" class="form-control"> {{$radio->radioabout ?? old('radio_about')}}</textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn">変更する</button>
        </div>
    </form>
</div>
@endsection