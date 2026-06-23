<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{asset('css/main-page.css')}}">
    <title>My website - @yield('title')</title>
</head>

<body>
<div class="main">
    @include('components.header')

    @yield('content')

    @include('components.footer')
</div>

<div class="mobile-menu">
    <div class="mobile-menu__list">
        <a href="{{route('home')}}" class="mobile-menu-item">
            <img src="{{asset('img/icon/home.svg')}}" alt="" class="mobile-menu-item__icon">
            <span class="mobile-menu-item__title">Главная</span>
        </a>

        <a href="{{route('resume')}}" class="mobile-menu-item">
            <img src="{{asset('img/icon/user.svg')}}" alt="" class="mobile-menu-item__icon">
            <span class="mobile-menu-item__title">Резюме</span>
        </a>

        <a href="{{route('portfolios')}}" class="mobile-menu-item">
            <img src="{{asset('img/icon/directory.svg')}}" alt="" class="mobile-menu-item__icon">
            <span class="mobile-menu-item__title">Портфолио</span>
        </a>

        <span class="mobile-menu-item"></span>

        <div data-main-nav-open class="mobile-menu-item">
            <img src="{{asset('img/icon/menu-nav.svg')}}" alt="" class="mobile-menu-item__icon">
            <span class="mobile-menu-item__title">Меню</span>
        </div>
    </div>
</div>


<div class="modal">
    <div class="modal__bg"></div>
    <div class="modal__inner">
        <form id="modalCallbackForm" action="{{route('callback')}}" method="post" class="main-form">
            <input type="hidden" name="_token" value="0xcZ5pQsLEJ7ClBPc4Dx3ti4k4HY0C0TH8ZAamRC" autocomplete="off">                               <div class="main-form__inner">
                <p class="main-form__title">Обратная связь</p>
                <div class="main-form__body">
                    <div class="control">
                        <label for="modalCallbackFormName" class="control__label">Ваше имя</label>
                        <input data-input="" type="text" id="modalCallbackFormName" name="name" class="control__input input" placeholder="Ваше имя">
                        <div data-control-errors="name" class="control__errors"></div>
                    </div>

                    <div class="control">
                        <label for="modalCallbackFormPhone" class="control__label">Номер телефона</label>
                        <input data-input="" type="text" id="modalCallbackFormPhone" name="phone" class="control__input input" placeholder="Номер телефона">
                        <div data-control-errors="phone" class="control__errors"></div>
                    </div>

                    <div class="control">
                        <label for="modalCallbackFormMail" class="control__label">Почта</label>
                        <input data-input="" type="text" id="modalCallbackFormMail" name="email" class="control__input input" placeholder="Почта">
                        <div data-control-errors="email" class="control__errors">

                        </div>
                    </div>

                    <div class="control">
                        <label for="modalCallbackFormMessage" class="control__label">Коментарий</label>
                        <textarea data-input="" id="modalCallbackFormMessage" name="comment" class="control__input input" rows="2" placeholder="Коментарий"></textarea>
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

<script src="{{asset('js/main.js')}}"></script>
</body>


</html>
