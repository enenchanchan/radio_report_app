<div class="card mt-5">
    <div class="card-body">
        <div class="d-flex flex-row">
            <h2 class="card-title">ユーザー名
                <p>{{$user->name}}</p>
            </h2>
            <div class="card-body">
                居住地<p>{{$user->prefecture->name}}</p>
            </div>
            <div class="card-body">
                年齢<p>{{$birthday}}歳</p>
            </div>
        </div>
    </div>
</div>