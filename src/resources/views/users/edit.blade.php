@extends('layouts.app')
@section('title','ユーザー情報修正')
@section('content')
<h1 class="text-center">{{ __('User Edit') }}</h1>
<div class="card">

    <form method="POST" enctype="multipart/form-data" action=" {{route('users.update',['user'=>$user])}}">

        @method('patch')
        @csrf
        <div class="md-form m-3">
            <div class="form-group mb-3">

                <label for="image" class="">{{ __('image') }}
                </label>
                <input id="image" type="file" class="form-control" name="image" value="{{$user->image ?? old('image') }}">

                @if($user->image !== null)
                <img src="{{asset('storage/' . $user->image)}}" alt="">
                @endif

                @if($errors->has('image'))
                <p class="text-danger">{{ $errors->first('image') }}</p>
                @endif
            </div>



            <div class="form-group mb-3">
                <label for="name" class="">{{ __('name') }}
                </label>
                <input id="name" type="text" class="form-control" name="name" value="{{$user->name ?? old('name') }}" placeholder="{{ __('name') }}">
                @if($errors->has('name'))
                <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="age" class="">{{ __('age') }}</label>
                <input type="date" class="form-control" name="age" value="{{$user->age ?? old('age') }}">
                @if($errors->has('age'))
                <p class="text-danger">{{ $errors->first('age') }}</p>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="prefecture_id" class="">{{__('prefecture')}}</label>
                <select type="text" class="form-control" name="prefecture_id">
                    <option disabled style='display:none;' @if (empty($user->prefecture_id)) selected @endif>選択してください</option>
                    @foreach($prefectures as $pref)
                    <option value="{{ $pref->id }}" @if (isset($user->prefecture_id) && ($user->prefecture_id === $pref->id)) selected @endif>{{ $pref->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('prefecture_id'))
                <p class="text-danger">{{ $errors->first('prefecture_id') }}</p>
                @endif
            </div>

            <div class="form-group mb-3">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        {{ __('User Edit') }}
                    </button>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection