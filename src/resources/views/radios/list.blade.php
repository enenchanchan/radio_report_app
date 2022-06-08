@extends('layouts.app')
@section('title','新規投稿')
@include('layouts.nav')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">番組名</th>
            <th scope="col">放送日時</th>
            <th scope="col">放送局</th>
        </tr>
    </thead>
    @foreach($radios as $radio)
    <tbody>
        <tr>
            <th><a href="{{route('radios.show',['radio'=>$radio])}}">{{$radio->radio_title}}</a></th>
            <th>{{$radio->radio_date}}</th>
            <th>{{$radio->broadcaster}}</th>
        </tr>
    </tbody>
    @endforeach
</table>
@endsection