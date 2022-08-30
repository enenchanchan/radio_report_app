<div class="md-form m-3">
    <div class="form-group mb-3">
        <label for="radio-list">番組名<small class="text-danger">※必須</small></label>
        <select name="radio_id" class="form-control select js-states">
            <option class="d-none" @if(empty($article->radio_id)) selected @endif ></option>
            @foreach($radios as $radio)
            <option value="{{$radio->id}}" @if($article->radio_id === $radio->id) selected @endif>
                {{$radio->radio_title}}
            </option>
            @endforeach
        </select>
        @if($errors->has('radio_id'))
        <p class="text-danger">{{ $errors->first('radio_id') }}</p>
        @endif
    </div>

    <div class="form-group mb-3">
        <label for="">放送日時<small class="text-danger">※必須</small></label>
        <input type="date" name="radio_date" class="form-control" placeholder="放送日" value="{{$article->radio_date ?? old('radio_date')}}">
        @if($errors->has('radio_date'))
        <p class="text-danger">{{ $errors->first('radio_date') }}</p>
        @endif
    </div>

    <div class="form-group mb-3">
        <label for="">コメント<small class="text-danger">※必須</small></label>
        <textarea name="body" rows="16" placeholder="内容" class="form-control"> {{$article->body ?? old('body')}}</textarea>
        @if($errors->has('body'))
        <p class="text-danger">{{ $errors->first('body') }}</p>
        @endif
    </div>

    <div class="form-group mb-3">
        <label for="">URL</label>
        <input type="url" name="link" class="form-control" value="{{$article->link ?? old('link')}}">
        @if($errors->has('link'))
        <p class="text-danger">{{ $errors->first('link') }}</p>
        @endif
    </div>

</div>