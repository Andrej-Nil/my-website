<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>My website @yield('title', 'My website')</title>
</head>
<body class="body">

{{--<nav class="navbar navbar-expand-lg bg-body-tertiary">--}}
{{--    <div class="container-fluid">--}}
{{--        <a class="navbar-brand" href="{{route('home')}}">Logo</a>--}}
{{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--            <ul class="navbar-nav me-auto mb-2 mb-lg-0">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>--}}
{{--                </li>--}}

{{--                @if ( Route::has('login') )--}}
{{--                    @auth--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{route('panel')}}">Panel</a>--}}
{{--                        </li>--}}

{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#">{{auth()->user()->name}}</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{route('logout')}}">Logout</a>--}}
{{--                        </li>--}}
{{--                    @else--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{route('login')}}">Login</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{route('register')}}">Register</a>--}}
{{--                        </li>--}}
{{--                    @endauth--}}
{{--                @endif--}}
{{--            </ul>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}

<div class="app @yield('bg')">

{{--    <header class="header ">--}}
{{--        <div class="header__inner ">--}}
{{--            <nav class="nav">--}}

{{--                <a href="{{route('home')}}" class="nav-item">Главная</a>--}}
{{--                <a href="{{route('resume')}}" class="nav-item">Резюме</a>--}}
{{--                <a href="{{route('about')}}" class="nav-item">Обо мне</a>--}}
{{--                <a href="{{route('post.index')}}" class="nav-item">Блог</a>--}}
{{--                <a href="{{route('contact')}}" class="nav-item">Контакты</a>--}}
{{--                @auth--}}
{{--                    <a href="{{route('panel')}}" class="nav-item">Панель</a>--}}
{{--                    <span class="nav-item">{{auth()->user()->name}}</span>--}}
{{--                @endauth--}}
{{--            </nav>--}}
{{--            <div class="header__contacts">--}}
{{--                <a href="tel:" class="nav-item">+7 897 989 09 09</a>--}}
{{--                <a href="mailto:" class="nav-item">testtesttesttest@test.ru</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </header>--}}


    @include('components.header')

    <div class="wrapper">

{{--        @if($errors->any())--}}
{{--            <div class="alert alert-danger">--}}
{{--                <ul>--}}
{{--                    @foreach($errors->all() as $error)--}}
{{--                        <li>{{$error}}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        @if(session('success'))--}}
{{--            <div class="alert alert-success">--}}
{{--                {{ session('success')}}--}}
{{--            </div>--}}
{{--        @endif--}}

        @yield('content')

    </div>
    @include('components.footer')


</div>


<div id="galleryModal" class="gallery-modal">
    <div data-close class="gallery-modal__back"></div>
        <img data-close src="{{asset('img/icon/close-white.svg')}}" class="gallery-modal__close" />
        <div data-gallery-modal="prev" class="gallery-modal-arrow prev hide">
            <img src="{{asset('img/icon/arrow-left.svg')}}" alt="" class="gallery-modal-arrow__icon">
        </div>
        <div data-gallery-modal="next" class="gallery-modal-arrow next hide">
            <img src="{{asset('img/icon/arrow-right.svg')}}" alt="" class="gallery-modal-arrow__icon">
        </div>
        <div data-content class="gallery-modal__wrap">

        </div>
</div>

<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
