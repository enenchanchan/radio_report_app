<ul class="nav nav-tabs nav-fill mt-3 mb-1 border border-dark bg-white ">
    <li class="nav-item border">
        <a href="{{route('users.show',['user'=>$user->id])}}" class="nav-link {{$article_tab ? 'active':''}}">投稿一覧</a>
    </li>
    <li class="nav-item border ">
        <a href="{{route('users.favorites',['user'=>$user->id])}}" class="nav-link {{$favorite_tab ? 'active':''}}">お気に入り番組一覧</a>
    </li>
</ul>