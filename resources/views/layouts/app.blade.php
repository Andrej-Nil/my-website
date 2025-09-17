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

<div class="app">
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

    <header class="main-header">
        <div class="main-nav">
            <a href="{{route('home')}}" class="main-nav-item">Главное</a>
            <a href="{{route('resume')}}" class="main-nav-item">Вуыс</a>
            <a href="{{route('about')}}" class="main-nav-item">авыаыва ыаывавыа</a>
            <a href="{{route('post.index')}}" class="main-nav-item">Бываывалок</a>
            <a href="{{route('contact')}}" class="main-nav-item">авываыва</a>
            @if(!(\Illuminate\Support\Facades\Auth::check()))
                <a href="{{route('login')}}" class="main-nav-item">Вход</a>
            @else
                <a class="main-nav-item" href="{{route('panel')}}">Панель</a>
                <span  class="main-nav-item">{{auth()->user()->name}}</span>
            @endif
        </div>

        <div class="main-contacts">
            <a href="tel:+7 898 909 90 09" class="main-contact">+7 898 909 90 09</a>
            <a href="mailto:dskjjdfh" class="main-contact">test@test</a>
        </div>
    </header>


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
    <footer class="main-footer">
        dnfbdhjfdfh

        {{--           <div class="signature">--}}
        {{--               <h1 class="signature-name">Кучеров Андрей</h1>--}}
        {{--               <p class="signature-profession">front-end разработчик</p>--}}
        {{--           </div>--}}
    </footer>



</div>

<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
