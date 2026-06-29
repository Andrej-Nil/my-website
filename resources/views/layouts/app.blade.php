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

<div class="app @yield('bg')">

    @include('components.header', ['btn'=>1])

    <div class="wrapper">

        @yield('content')

    </div>

    @include('components.footer')

</div>

<div data-modal="modalCallback" class="modal">
    <div data-modal-close="modalCallback" class="modal__bg"></div>

    <div class="modal__inner">
        <i data-modal-close="modalCallback" class="main-close modal__close"></i>
        <form data-form action="{{route('callback')}}" method="post" class="form">
            @csrf
            <div class="form__inner">
                <p class="form__title">Обратная связь</p>
                <div class="form__content">

                    <div class="form__body">
                        <div class="control">
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
                    <div class="form__bottom">
                        <button type="submit" class="form__submit btn">Отправить</button>
                    </div>

                    <div data-form-loading class="form__loading">
                       <span class="form__spinner">
                           Идет отправка...
                       </span>
                    </div>


                    <div data-form-message class="form__message message">
                        <div class="message__inner">
                            <i data-message-close class="main-close message__close"></i>
                            <div data-message-content class="message__content"></div>
                        </div>
                    </div>
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
