<div class="card mt-5">
    <div class="card-body d-flex justify-content-around">
        <h2 class="card-title">{{$user->name}}</h2>
        @if(isset($user->prefecture)) <p>{{$user->prefecture->name}}在住</p>@endif
        @if(isset($$birthday)) <p>{{$birthday}}歳</p>@endif
    </div>
</div>