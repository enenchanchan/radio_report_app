@extends('layouts.app')
@section('title','ユーザー登録')
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <h1 class="card-header text-center">{{ __('Register') }}
                </h1>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        @include('auth.users_about')
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>



                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{route('login.{provider}',['provider'=>'google'])}}" class="btn btn-danger">
                                    <i class="fa-brands fa-google me-2"></i>Googleアカウントで登録
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 offset-md-4">
                                <div class="form-check">
                                    <a class="text-muted" href="{{ route('login')}}">
                                        ログインはこちらから </a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection