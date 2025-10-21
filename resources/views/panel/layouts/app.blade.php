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
                    <a href="{{route('panel.jobs')}}" class="nav-item__link">Опыт</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('panel.posts')}}" class="nav-item__link">Посты</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('panel.works')}}" class="nav-item__link">Примеры работ</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('panel.hobbies')}}" class="nav-item__link">Хобби</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('panel.images')}}" class="nav-item__link">Картинки</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('panel.contacts')}}" class="nav-item__link">Контакты</a>
                </li>

            </ul>
        </div>
        <div class="container">
            <nav class="link-list">
                <a href="{{route('about')}}" class="link-item">Обо мне</a>
                    <span class="link-item__slash">\</span>
                <a href="{{route('post.index')}}" class="link-item">Блог</a>
                    <span class="link-item__slash">\</span>
                <a href="{{route('contact')}}" class="link-item">Контакты</a>

            </nav>
            @yield('content')
        </div>



{{--<nav class="navbar navbar-expand-lg bg-body-tertiary">--}}
{{--    <div class="container-fluid">--}}
{{--        <a class="navbar-brand" href="{{route('home')}}">Site</a>--}}
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
{{--                            <a class="nav-link" href="{{route('panel')}}">Dashboard</a>--}}
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

{{--<main class="main my-3">--}}
{{--    <div class="container">--}}

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
            {{--    </div>--}}
            {{--</main>--}}

    </div>
</div>
<script src="{{asset('panel-assets/js/main.js')}}"></script>
</body>
</html>
