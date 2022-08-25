<div class="md-form m-3">

    @if($errors->any())
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    @endif

    <div class="text-center mb-3">
        @if(isset($radio->image))
        <img src="{{asset('storage/' . $radio->image)}}" alt="番組画像">
        @endif
    </div>

    <div class="form-group mb-3">
        <label for="">番組名 <small class="text-danger">※必須</small></label>
        <input type="text" name="radio_title" class="form-control" value="{{$radio->radio_title ?? old('title')}}">
    </div>

    <div class="form-group mb-3">
        <label for="radio_date">放送曜日 <small class="text-danger">※必須</small></label>
        <select type="text" name="radio_date" class="form-control w-50">
            <option style='display:none;' @if (empty($radio->radio_date)) selected @endif>選択してください</option>
            @foreach(Config::get('dayofweek.day_of_week') as $dow =>$day)
            <option value="{{$day}}" @if ($radio->radio_date === $day) selected @endif>{{$day}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="">開始時間 <small class="text-danger">※必須</small></label>
        <input type="time" name="start_time" id="" class="form-control w-50" value="{{$radio->start_time ?? old('start_time')}}">
    </div>
    <div class="form-group mb-3">
        <label for="">終了時間</label>
        <input type="time" name="end_time" id="" class="form-control w-50" value="{{$radio->end_time ?? old('end_time')}}">
    </div>

    <div class="form-group mb-3">
        <label for="">放送局 <small class="text-danger">※必須</small></label>
        <input type="text" name="broadcaster" rows="16" class="form-control" value="{{$radio->broadcaster ?? old('body')}}">
    </div>
    <div class="form-group mb-3">
        <label for="">番組情報</label>
        <textarea type="text" name="radio_about" rows="16" id="" placeholder="内容" class="form-control"> {{$radio->radio_about ?? old('body')}}</textarea>
    </div>

    <div class="form-group mb-3">
        <label for="">番組画像</label>
        <input type="file" name="image" id="" class="form-control" value="{{$radio->image ?? old('image')}}">
    </div>



</div>