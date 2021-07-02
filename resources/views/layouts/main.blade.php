<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("title")</title>
    <script src="{{mix("js/app.js")}}" defer></script>
    <link rel="stylesheet" href="{{ asset("css/main.css") }}">
</head>
<body>
<div id="app">
    <header>
        <a href="/" class="logo"></a>
        <nav class="left-nav">
            <ul>
                <li>
                    <a href="/">
                        <i class="far fa-grin"></i> キャラクター
                    </a>
                </li>
                <li>
                    <a href="/">
                        <i class="fas fa-pen"></i> イラスト
                    </a>
                </li>
                <li>
                    <a href="/">
                        <i class="fas fa-users"></i> ユーザー
                    </a>
                </li>
            </ul>
        </nav>
        @if(Auth::check())
            <nav class="right-nav-user">
                <ul>
                    <li>
                        <a href="/">
                            <i class="fas fa-user-circle"></i> キャラクター登録
                        </a>
                    </li>
                </ul>
                <div class="user-icon">
                    <button @click="clickUserIcon" v-click-outside="clickOutsideUserIcon">
                        USER
                    </button>
                </div>
            </nav>
            <div class="pop-up-menu" v-show="showContent" v-click-outside="closePopUpMenu">
                <nav>
                    <ul>
                        <li>
                            <span class="icon"><i class="far fa-envelope"></i></span>メッセージ
                        </li>
                        <li>
                            <span class="icon"><i class="far fa-envelope"></i></span>プロフィール
                        </li>
                        <li>
                            <span class="icon"><i class="far fa-envelope"></i></span>お気に入り
                        </li>
                        <li>
                            <span class="icon"><i class="far fa-envelope"></i></span>アカウント設定
                        </li>
                        <li>
                            <span class="icon"><i class="far fa-envelope"></i></span>作品設定
                        </li>
                        <li>
                            <a href="{{route("logout")}}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                <span class="icon"><i class="far fa-envelope"></i></span>ログアウト
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <form id="logout-form" action="{{route("logout")}}" method="POST">
                @csrf
            </form>
        @else
            <nav class="right-nav-guest">
                <ul>
                    <li>
                        <a href="{{route("register")}}">
                            <i class="fas fa-user-plus"></i> 新規登録
                        </a>
                    </li>
                    <li>
                        <a href="{{route("login")}}">
                            <i class="fas fa-sign-in-alt"></i> ログイン
                        </a>
                    </li>
                </ul>
            </nav>

        @endif
    </header>
    <main role="main">
        @yield("main")
    </main>
    <footer>
        <nav>
            <ul>
                <li>
                    適当
                </li>
            </ul>
        </nav>
    </footer>
</div>
</body>
</html>
