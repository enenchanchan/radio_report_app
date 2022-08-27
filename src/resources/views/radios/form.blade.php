<div class="md-form m-3">

    <div class="text-center mb-3">
        @if(isset($radio->image))
        <img src="{{asset('storage/' . $radio->image)}}" alt="番組画像">
        @endif
    </div>

    <div class="form-group mb-3">
        <label for="">番組名<small class="text-danger">※必須</small></label>
        <input type="text" name="radio_title" class="form-control" value="{{$radio->radio_title ?? old('title')}}">
        @if($errors->has('radio_title'))
        <p class="text-danger">{{ $errors->first('radio_title') }}</p>
        @endif
    </div>

    <div class="form-group mb-3">
        <label for="radio_date">放送曜日<small class="text-danger">※必須</small></label>
        <select type="text" name="radio_date" class="form-control w-50">
            <option style='display:none;' @if (empty($radio->radio_date)) selected @endif>選択してください</option>
            @foreach(Config::get('dayofweek.day_of_week') as $dow =>$day)
            <option value="{{$day}}" @if ($radio->radio_date === $day) selected @endif>{{$day}}</option>
            @endforeach
        </select>
        @if($errors->has('radio_date'))
        <p class="text-danger">{{ $errors->first('radio_date') }}</p>
        @endif
    </div>

    <div class="form-group mb-3">
        <label for="">開始時間<small class="text-danger">※必須</small></label>
        <input type="time" name="start_time" id="" class="form-control w-50" value="{{$radio->start_time ?? old('start_time')}}">
        @if($errors->has('start_time'))
        <p class="text-danger">{{ $errors->first('start_time') }}</p>
        @endif
    </div>
    <div class="form-group mb-3">
        <label for="">終了時間</label>
        <input type="time" name="end_time" id="" class="form-control w-50" value="{{$radio->end_time ?? old('end_time')}}">
        @if($errors->has('end_time'))
        <p class="text-danger">{{ $errors->first('end_time') }}</p>
        @endif
    </div>

    <div class="form-group mb-3">
        <label for="">放送局<small class="text-danger">※必須</small></label>
        <input type="text" name="broadcaster" rows="16" class="form-control" value="{{$radio->broadcaster ?? old('body')}}">
        @if($errors->has('broadcaster'))
        <p class="text-danger">{{ $errors->first('broadcaster') }}</p>
        @endif
    </div>

    <div class="form-group mb-3">
        <label for="">番組情報<small class="text-danger">※必須</small></label>
        <textarea type="text" name="radio_about" rows="16" id="" placeholder="内容" class="form-control"> {{$radio->radio_about ?? old('body')}}</textarea>
        @if($errors->has('radio_about'))
        <p class="text-danger">{{ $errors->first('radio_about') }}</p>
        @endif
    </div>

    <div class="form-group mb-3">
        <label for="">番組画像</label>
        <input type="file" name="image" id="" class="form-control" value="{{$radio->image ?? old('image')}}">
        @if($errors->has('image'))
        <p class="text-danger">{{ $errors->first('image') }}</p>
        @endif
    </div>



</div>