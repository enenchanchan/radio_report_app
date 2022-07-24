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
                    <form method="POST" action="{{ route('register.{provider}',['provider'=>$provider]) }}">
                        @csrf
                        <input type="hidden" name="token" value="{{$token}}">

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('name') }}
                                <small class="text-danger">※必須</small>
                            </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name ?? old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('name') }}">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('age') }}</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control @error('age') is-invalid @enderror" name="age" value="$user->age ?? {{ old('age') }}" autocomplete="age">

                                @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}
                                <small class="text-danger">※必須</small>
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email }}" required disabled autocomplete="email" placeholder="{{ __('Email Address') }}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection