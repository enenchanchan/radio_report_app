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
            <label for="radio_date">放送曜日</label>
            <select type="text" name="radio_date" class="form-control w-50">
                <option style='display:none;' @if (empty($radio->radio_date)) selected @endif>選択してください</option>
                @foreach(Config::get('dayofweek.day_of_week') as $dow =>$day)
                <option value="{{$day}}">{{$day}}</option>
                @endforeach
            </select>
        </div>

        <div class=" form-group">
            <label for="">開始時間</label>
            <input type="time" name="start_time" id="" class="form-control w-50" value="{{$radio->start_time ?? old('start_time')}}">
        </div>
        <div class="form-group">
            <label for="">終了時間</label>
            <input type="time" name="end_time" id="" class="form-control w-50" value="{{$radio->end_time ?? old('end_time')}}">
        </div>

        <div class="form-group">
            <label for="">放送局</label>
            <input type="text" name="broadcaster" rows="16" class="form-control" value="{{$article->body ?? old('body')}}">
        </div>
        <div class="form-group">
            <label for="">番組情報</label>
            <textarea type="text" name="radio_about" rows="16" id="" placeholder="内容" class="form-control"> {{$radio->radio_about ?? old('body')}}</textarea>
        </div>
        <button type="submit" class="btn">番組を登録する</button>
    </form>
</div>
@endsection