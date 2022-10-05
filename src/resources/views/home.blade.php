@extends('layouts.app')
@section('title','ラジレポ')
@section('content')
<div class="container">
    <div class="text-center">

        <h1><strong><u>ラジレポとは</u></strong></h1>
        <p>よく聞くラジオ番組の視聴メモを残して、<br>いつでも振り返ることが出来ます。
        </p>

        <div class="mb-5">
            <div class="d-md-flex align-items-center justify-content-center mb-3">
                <img src="{{asset('storage/トップページ1.png')}}" alt="topimage1">
                <div>
                    <h2 class=""><strong>番組情報登録機能</strong></h2>
                    <p class="">あなたのお気に入りの、<br>ラジオ番組の情報を登録出来ます。</p>
                </div>
            </div>
            <div class="d-md-flex flex-row-reverse align-items-center justify-content-center mb-3">
                <img src="{{asset('storage/トップページ2.png')}}" alt="topimage2">
                <div>
                    <h2 class=""><strong>視聴メモ投稿機能</strong></h2>
                    <p class="">視聴した番組のメモを残して、<br>いつでも振り返ることが出来ます。</p>
                </div>
            </div>
            <div class="d-md-flex align-items-center justify-content-center mb-3">
                <img src="{{asset('storage/トップページ3.png')}}" alt="topimage3">
                <div>
                    <h2 class=""><strong>お気に入り番組機能</strong></h2>
                    <p class="">他の人のお気に入りを参考にして、<br>新しい番組の開拓が出来ます。</p>
                </div>
            </div>
        </div>

        <div>
            <h2 class=""><strong>まずは好きな番組を<br>検索してみよう!</strong></h2>
            <radio-table class="mb-5"></radio-table>
            <div>
                <a href="{{route('register')}}"> <button type="button" class="btn btn-warning btn-lg btn-rounded me-2">ユーザー登録はこちら</button></a>
                <a href="{{route('login')}}"> <button type="button" class="btn btn-primary btn-lg btn-rounded"> ログインはこちら</button></a>
            </div>
        </div>

    </div>
</div>
@endsection