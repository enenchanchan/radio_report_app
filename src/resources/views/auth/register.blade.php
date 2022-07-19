@extends('layouts.app')
@section('title','ユーザー登録')
@include('layouts.nav')
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
                            <label for="prefecture_id" class="col-md-4 col-form-label text-md-end">{{__('prefecture')}}</label>
                            <div class="col-md-6">
                                <select type="text" class="form-control" name="prefecture_id" required>
                                    <option disabled style='display:none;' @if (empty($user->prefecture_id)) selected @endif>選択してください</option>
                                    @foreach($prefectures as $pref)
                                    <option value="{{ $pref->id }}" @if (isset($user->prefecture_id) && ($user->prefecture_id === $pref->id)) selected @endif>{{ $pref->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}
                                <small class="text-danger">※必須</small>
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Email Address') }}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}
                                <small class="text-danger">※必須</small>
                            </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}
                                <small class="text-danger">※必須</small>
                            </label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
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