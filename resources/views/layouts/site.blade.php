<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title ?? 'Веб-разработка' }}</title>
        <link rel="shortcat icon" type="image/png" href="{{ asset('favicon.png') }}"/>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('blog.index') }}">Веб-разработка</a>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        ariacontrols="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- ссылки слева -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Мои посты</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('post.create')}}">Создать</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Контакты</a>
                            </li>
                        </ul>
                        <!-- форма поиска -->
                        <form class="d-flex" action="{{ route('post.search')}}">
                            <input
                                class="form-control me-2"
                                type="search" name="search"
                                placeholder="Найти пост..."
                                aria-label="Поиск"
                            >
                            <button
                                class="btn btn-outline-success my-2 my-sm-0"
                                type="submit"
                            >
                                Поиск
                            </button>
                        </form>
                        <!-- ссылки справа -->
                        <ul class="navbar-nav mb-2">
                            @guest
                                    <li class="nav-item"> <!-- ссылка для входа -->
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login')}}</a>
                                    </li>
                                @if (Route::has('register'))
                                    <li class="nav-item"> <!-- ссылка для регистрации -->
                                        <a class="nav-link" href="{{ route('register') }}">{{__('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item">
                                    <a
                                        class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    >
                                        {{ __('Logout') }} <!-- ссылка выхода -->
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible mt-4" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" arialabel="Close"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible mt-4" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" arialabel="Close"> </button>
                </div>
            @endif
            @yield('content')
        </div>
    </body>
</html>
