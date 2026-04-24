<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{asset('panel-assets/css/style.css')}}">
    <title>@yield('title', 'Panel')</title>
</head>
<body>
<div class="app">

    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar__top">
                <a href="{{route('home')}}" class="site-link"> Посетить сайт >></a>
            </div>

            <ul class="nav">

                <li class="nav-item">
                    <a href="{{route('panel.userInfos.create')}}" class="nav-item__link">Данные</a>
                </li>

                <li class="nav-item nav-item">
                    <p class="nav-item__title">Блок резюме</p>
                    <a href="{{route('panel.jobs')}}" class="nav-item__link nav-item__link--in-block">Опыт работы</a>
                    <a href="{{route('panel.schools')}}" class="nav-item__link nav-item__link--in-block">Образование</a>
                    <a href="{{route('panel.qualities')}}" class="nav-item__link nav-item__link--in-block">Качества</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('panel.portfolios')}}" class="nav-item__link">Портфолио</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('panel.pageDescriptions')}}" class="nav-item__link">Описание стайта</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('panel.hobbies')}}" class="nav-item__link">Хобби</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('panel.posts')}}" class="nav-item__link">Посты</a>
                </li>

            </ul>
        </div>
        <div class="container">
            <nav class="link-list">
                <a href="{{route('home')}}" target="_blank" class="link-item">Главная</a>
                <span class="link-item__slash">\</span>
                <a href="{{route('resume')}}" target="_blank" class="link-item">Резюме</a>
                <span class="link-item__slash">\</span>
                <a href="{{route('pageDescriptions')}}" target="_blank" class="link-item">О сайте</a>
                <span class="link-item__slash">\</span>
                <a href="{{route('portfolios')}}" target="_blank" class="link-item">Портфолио</a>
                <span class="link-item__slash">\</span>
                <a href="{{route('hobbies')}}" target="_blank" class="link-item">Хобби</a>
                <span class="link-item__slash">\</span>
                <a href="{{route('posts')}}" target="_blank" class="link-item">Посты</a>
            </nav>
            @yield('content')
        </div>

    </div>
</div>

<div id="mediaWindow" class="media-window">
    <div data-close class="media-window__bg">
        <span class="media-window__close">
            <span class="cross cross--white"></span>
        </span>
    </div>
    <div id="mediaWindowInner" class="media-window__inner">

    </div>
</div>
<script src="{{asset('panel-assets/js/main.js')}}"></script>
</body>
</html>
