<!doctype html>
<html>
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

<div data-modal="modalCallback" class="modal">
    <div data-modal-close="modalCallback" class="modal__bg"></div>
    <div class="modal__inner">
        <div id="frameLight" class="frame-light">
            <span class="frame-light__blink"></span>
        </div>

        <div id="mainFrameMessage" class="main-frame-message">
            <div class="main-frame-message__inner">
                <i data-frame-tab-close class="main-close main-form-message__close"></i>
                <div data-message-inner class="main-frame-message__content"></div>
            </div>
        </div>

        <span data-modal-close="modalCallback" class="modal__close main-close"></span>
        <form id="mainForm" action="{{route('callback')}}" method="post" class="main-form">
            @csrf
            <div class="main-form__inner">
                <p class="main-form__title">Обратная связь</p>
                <div class="main-form__body">
                    <div  class="control">
                        <label for="mainFormName" class="control__label">Ваше имя</label>
                        <input data-input type="text" id="mainFormName" name="name" class="control__input input" placeholder="Ваше имя">
                        <div data-control-errors="name" class="control__errors"></div>
                    </div>

                    <div class="control">
                        <label for="mainFormPhone" class="control__label">Номер телефона</label>
                        <input data-input type="text" id="mainFormPhone" name="phone" class="control__input input" placeholder="Номер телефона">
                        <div data-control-errors="phone" class="control__errors"></div>
                    </div>

                    <div class="control">
                        <label for="mainFormMail" class="control__label">Почта</label>
                        <input data-input type="text" id="mainFormMail" name="email" class="control__input input" placeholder="Почта">
                        <div data-control-errors="email" class="control__errors">

                        </div>
                    </div>

                    <div class="control">
                        <label for="mainFormMessage" class="control__label">Коментарий</label>
                        <textarea data-input id="mainFormMessage" name="comment" class="control__input input" rows="2" placeholder="Коментарий"></textarea>
                        <div data-control-errors="comment" class="control__errors"></div>

                    </div>
                </div>
                <div class="main-form__bottom">
                    <button type="submit" class="main-form__submit btn">Отправить</button>
                </div>
            </div>
        </form>
    </div>
</div>


<div id="galleryModal" class="gallery-modal">
    <div data-close class="gallery-modal__back"></div>
    <img data-close src="{{asset('img/icon/close-white.svg')}}" alt="" class="gallery-modal__close" />
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
