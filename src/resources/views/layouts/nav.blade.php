<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
        <div class="container">
            <a href="" class='navbar-brand'>radirepo</a>
            <ul class="navbar-nav d-flex">
                @guest
                <li class="nav-item"><a href="{{route('register')}}" class="nav-link">新規登録</a></li>
                <li class="nav-item"><a href="{{route('login')}}" class="nav-link">ログイン</a></li>
                @endguest
                @auth
                <li class="nav-item"><a href="" class="nav-link">投稿する</a></li>
                <li class="nav-item"><a href="" class="nav-link">マイページ</a></li>
                <li class="nav-item">
                    <a href="" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> ログアウト</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endauth
            </ul>
        </div>
    </nav>
</header>