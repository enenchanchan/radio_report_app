<div class="card mt-5">
    <div class="card-body">
        <h2 class="card-title">ユーザー名{{$user->name}}
        </h2>
        <div class="d-flex">
            居住地<p>{{$user->prefecture->name}}</p>
            年齢<p>{{$birthday}}歳</p>
        </div>

    </div>
</div>
</div>