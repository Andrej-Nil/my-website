@extends('panel.layouts.app')

@section('title', 'Создание поста')

@section('content')
    <h1 class="panel-title">Добавление хобби</h1>
    @if($errors->any())
        @include('panel.components.error-board', ['message'=>'Ошибка отправки формы.'])
    @endif
    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif

    <form id="formCreate" action="{{route('panel.userInfos.store')}}" enctype="multipart/form-data" method="post" class="form">
        @csrf
        <div class="form__body">

            <div class="form-control">
                <div class="form-control__head">
                    <span class="form-control__label">Фото</span>
                    <p class="form-control__note">Загрузить изображение в формате jpg, jpeg, png</p>
                </div>
                <div data-media-file="one" data-format="jpg,jpeg,png" data-name="photo" class="media-file">

                    <div class="media-file__body">
                        <label class="media-file__btn download-btn">
                            <input data-media-add type="file" class="download-btn__input">
                            <img class="download-btn__icon" src="{{asset('panel-assets/img/icons/download-icon.svg')}}" alt="">
                            <span class="download-btn__label">Загрузить фото</span>
                        </label>
                        <div data-media-list class="media-file__list"></div>
                    </div>
                    <p data-media-error class="media-file__error"></p>
                </div>
            </div>

            <div class="form-control">
                <label for="firstName" class="form-control__label">Имя</label>
                <div class="form-control__body">
                    <input id="firstName" type="text" class="form-control__input input" name="first_name" value="{{old('first_name')}}" placeholder="Имя">
                    @error('first_name')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="secondName" class="form-control__label">Фамилия</label>
                <div class="form-control__body">
                    <input id="secondName" type="text" class="form-control__input input" name="second_name" value="{{old('second_name')}}" placeholder="Фамилия">
                    @error('second_name')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="yearBirth" class="form-control__label">Дата Рождения</label>
                <div class="form-control__body">
                    <input id="yearBirth" type="date" class="form-control__input input" name="year_birth" value="{{old('year_birth')}}">
                    @error('year_birth')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="profession" class="form-control__label">Профессия</label>
                <div class="form-control__body">
                    <input id="profession" type="text" class="form-control__input input" name="profession" value="{{old('profession')}}" placeholder="Профессия">
                    @error('profession')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="city" class="form-control__label">Город</label>
                <div class="form-control__body">
                    <input id="city" type="text" class="form-control__input input" name="city" value="{{old('city')}}" placeholder="Город">
                    @error('city')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="about" class="form-control__label">О себе</label>
                <div class="form-control__body">
                    <textarea id="about" rows="10"  class="input" name="about" placeholder="Описание">{{old('about')}}</textarea>
                    @error('about')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="phone" class="form-control__label">Телефон</label>
                <div class="form-control__body">
                    <input id="phone" type="text" class="form-control__input input" name="phone" value="{{old('phone')}}" placeholder="Телефон">
                    @error('phone')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="mail" class="form-control__label">Эл. почта</label>
                <div class="form-control__body">
                    <input id="mail" type="text" class="form-control__input input" name="mail" value="{{old('mail')}}" placeholder="Эл. почта">
                    @error('mail')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="telegram" class="form-control__label">Телеграм</label>
                <div class="form-control__body">
                    <input id="telegram" type="text" class="form-control__input input" name="telegram" value="{{old('telegram')}}" placeholder="Телеграм">
                    @error('telegram')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="whatsapp" class="form-control__label">WhatsApp</label>
                <div class="form-control__body">
                    <input id="whatsapp" type="text" class="form-control__input input" name="whatsapp" value="{{old('whatsapp')}}" placeholder="WhatsApp">
                    @error('whatsapp')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="vk" class="form-control__label">Вконтакте</label>
                <div class="form-control__body">
                    <input id="vk" type="text" class="form-control__input input" name="vk" value="{{old('vk')}}" placeholder="Вконтакте">
                    @error('vk')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

        </div>

        {{--        <div class="form-control">--}}
        {{--            <span class="form-control__label">Медифайл</span>--}}
        {{--            <div data-media-file data-name="name[]" data-count="1" class="media-file">--}}
        {{--                    <div class="media-file__body">--}}
        {{--                        <label class="media-file__btn download-btn">--}}
        {{--                           <input data-media-add multiple type="file" class="download-btn__input">--}}
        {{--                           <img class="download-btn__icon" src="{{asset('panel-assets/img/icons/download-icon.svg')}}" alt="">--}}
        {{--                           <span class="download-btn__label">Загрузить фото</span>--}}
        {{--                        </label>--}}
        {{--                        <div data-media-list class="media-file__list">--}}

        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--        </div>--}}

        <div class="form__bottom">
            <button type="submit" class="btn btn--yellow">Добавить данные</button>
        </div>
    </form>
@endsection
