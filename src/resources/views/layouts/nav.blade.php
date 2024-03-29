<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-warning">
        <div class="container">
            @if(Auth::check())
            <a href="/articles" class='navbar-brand'> <i class="fa-solid fa-radio"></i> radirepo <i class="fa-solid fa-file-pen"></i></a>
            @else
            <a href="/" class='navbar-brand'> <i class="fa-solid fa-radio"></i> radirepo <i class="fa-solid fa-file-pen"></i></a>
            @endif

            <div class="text-end">
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse text-end" id="navbarNav">
                    <ul class="navbar-nav d-flex">
                        @guest
                        <li class="nav-item"><a href="{{route('register')}}" class="nav-link">新規登録</a></li>
                        <li class="nav-item"><a href="{{route('login')}}" class="nav-link">ログイン</a></li>
                        <li class="nav-item"><a href="{{route('radios.index')}}" class="nav-link">登録番組一覧</a></li>
                        @endguest
                        @auth
                        <li class="nav-item"><a href="{{route('articles.create')}}" class="nav-link">視聴メモ投稿</a></li>
                        <li class="nav-item"><a href="{{route('radios.create')}}" class="nav-link">番組新規登録</a></li>
                        <li class="nav-item"><a href="{{route('radios.index')}}" class="nav-link">登録番組一覧</a></li>
                        <li class="nav-item"><a href="{{route('users.show',['user' => Auth::user()->id])}}" class="nav-link">マイページ</a></li>
                        <li class="nav-item">
                            <a href="" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> ログアウト</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>