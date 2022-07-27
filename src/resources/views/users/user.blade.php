<div class="card mt-5">
    <div class="card-body d-flex justify-content-around">
        <h2 class="card-title">{{$user->name}}</h2>
        @if(isset($user->prefecture)) <p>{{$user->prefecture->name}}在住</p>@endif
        @if(isset($birthday)) <p>{{$birthday}}歳</p>@endif
    </div>

    @if(Auth::id() === $user->id)
    <a href="{{route('users.edit',['user'=> $user])}}" class="text-end me-3 mb-3"><i class="fa-solid fa-user-pen fa-lg"></i></a>
    @endif
</div>