<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.jade.min.css" />
    <title>Blog - @yield('title')</title>
</head>

<body>

    <main class="container">
        <nav>
            <ul>
                <li><strong><a href="{{route('post.index')}}">Blog</a></strong></li>
            </ul>
            <ul>
                @if (Auth::check())
                    <li>
                        {{ auth()->user()->name }}
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <input type="submit" value="Sair">
                        </form>
                    </li>
                @else
                    <li>
                        @yield('li-1')
                    </li>
                    <li>
                        @yield('li-2')
                    </li>
                @endif
            </ul>
        </nav>
        @yield('content')
    </main>
</body>

</html>
