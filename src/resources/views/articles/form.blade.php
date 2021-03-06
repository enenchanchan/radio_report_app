<div class="md-form">
    <div class="form-group mb-3">
        <label for="radio-list">番組名</label>
        <select name="radio_id" class="form-control select js-states" required @if(isset($article->radio_id)) disabled @endif>
            <option class="d-none" @if(empty($article->radio_id)) selected @endif ></option>
            @foreach($radios as $radio)
            <option value="{{$radio->id}}" @if($article->radio_id === $radio->id) selected @endif>
                {{$radio->radio_title}}
            </option>
            @endforeach
        </select>
        </datalist>
    </div>

    <div class="form-group mb-3">
        <label for="">放送日時</label>
        <input type="date" name="radio_date" required class="form-control" placeholder="放送日" value="{{$article->radio_date ?? old('radio_date')}}">
    </div>
    <div class="form-group mb-3">
        <label for="">コメント</label>
        <textarea name="body" rows="16" placeholder="内容" class="form-control"> {{$article->body ?? old('body')}}</textarea>
    </div>
    <div class="form-group mb-3">
        <label for="">URL</label>
        <input type="url" name="link" class="form-control" value="{{$article->link ?? old('link')}}">
    </div>
</div>