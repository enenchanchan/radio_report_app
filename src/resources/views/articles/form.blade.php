@csrf
<div class="md-form">
    <label for="">番組名</label>
    <input type="text" name="radio_id" class=" form-control" required value="{{old('title')}}">
</div>

<div class="form-group">
    <label for="">放送日時</label>
    <input type="date" name="radio_date" required class="form-control" placeholder="放送日" value="{{$article->radio_date ?? old('date')}}">
</div>
<div class="form-group">
    <label for=""></label>
    <textarea name="body" rows="16" id="" placeholder="内容" class="form-control"> {{old('body')}}</textarea>
</div>
<div class="form-group">
    <label for="">URL</label>
    <input type="url" name="link" class="form-control">
</div>