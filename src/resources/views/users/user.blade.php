<div class="card mt-5 border border-dark">
    <div class="card-body d-flex justify-content-around align-items-center">

        @if($user->image !== null)
        <img class="rounded-circle" src="{{asset('storage/' . $user->image)}}">
        @else
        <i class="fa-solid fa-circle-user fa-4x"></i>
        @endif

        <h3>{{$user->name}}</h3>

        @if(isset($user->prefecture))
        <h3>{{$user->prefecture->name}}在住</h3>
        @endif

        @if(isset($birthday))
        <h3>{{$birthday}}歳</h3>
        @endif

    </div>
    @if(Auth::id() === $user->id)
    <div class="card-footer text-end">
        <a href="{{route('users.edit',['user'=> $user])}}" class="text-end me-3 mb-3"><i class="fa-solid fa-user-pen fa-lg"></i></a>
    </div>
    @endif

</div>