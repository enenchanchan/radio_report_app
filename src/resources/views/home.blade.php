@extends('layouts.app')
@section('title','welcome radirepo!')
@section('content')
<div class="container">
    <div>
        <h1 class="text-center">radirepoとは?</h1>
        <div class="d-flex align-items-center justify-content-center mb-3">
            <img src="{{asset('storage/トップページ1.png')}}" alt="">
            <h3 class="">あなたのお気に入りのラジオの、<br>番組情報を登録しよう。</h3>
        </div>
        <div class="d-flex align-items-center justify-content-center mb-3">
            <h3 class=""><br>視聴した番組のメモを残して、<br>いつでも思い出そう。</h3>
            <img src="{{asset('storage/トップページ2.png')}}" alt="">
        </div>
        <div class="d-flex align-items-center justify-content-center mb-3">
            <img src="{{asset('storage/トップページ3.png')}}" alt="">
            <h3 class="">自分なりのメモを共有して<br>みんなで番組を盛り上げよう。</h3>
        </div>
        <div class="text-center">
            <h2 class="mb-3">さあ、はじめよう!</h2>
            <div>
                <a href="{{route('register')}}"> <button type="button" class="btn btn-warning btn-rounded me-2">ユーザー登録はこちら</button></a>
                <a href="{{route('login')}}"> <button type="button" class="btn btn-rounded"> ログインはこちら</button></a>
            </div>
        </div>
    </div>
</div>
@endsection