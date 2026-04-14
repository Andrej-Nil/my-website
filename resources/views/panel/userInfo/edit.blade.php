@extends('panel.layouts.app')

@section('title', 'Редактирование информации')

@section('content')
    <h1 class="panel-title">Редактирование информации</h1>
    @if($errors->any())
        @include('panel.components.error-board', ['message'=>'Ошибка отправки формы.'])
    @endif
    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif

    <form id="formEdit" data-api="{{route('userInfos.api.update', $userInfo['id'])}}" action="{{route('panel.userInfos.update', $userInfo['id'])}}" enctype="multipart/form-data" method="post" class="form">
        @csrf
        @method('PUT')
        <div class="form__body">

            <div class="form-control">
                <div class="form-control__head">
                    <span class="form-control__label">Фото</span>
                    <p class="form-control__note">Загрузить изображение в формате jpg, jpeg, png</p>
                </div>
                <div data-upload-media-file="one" data-format="jpg,jpeg,png" data-name="photo" class="media-file">

                    <div class="media-file__body">
                        <label class="media-file__btn download-btn">
                            <input data-media-add type="file" class="download-btn__input">
                            <img class="download-btn__icon" src="{{asset('panel-assets/img/icons/download-icon.svg')}}" alt="">
                            <span class="download-btn__label">Загрузить фото</span>
                        </label>
                        <div data-media-list class="media-file__list">
                            @if($userInfo['photo'])
                                <div data-media-item="{{$userInfo['photo']}}" class="media-file-item">
                                    <input data-media-input="" type="text" name="photo" value="{{$userInfo['photo']}}" class="media-file-item__input">
                                    <span data-media-delete="" class="media-file-item__btn top">Удалить</span>
                                    <img src="{{$userInfo['photo_url']}}" alt="" class="media-file-item__content">
                                    <span data-look="{{$userInfo['photo_url']}}" data-look-type="img" class="media-file-item__btn bottom">Просмотр</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <p data-media-error class="media-file__error"></p>
                </div>
            </div>

            <div class="form-control">
                <label for="firstName" class="form-control__label">Имя</label>
                <div class="form-control__body">
                    <input id="firstName" type="text" class="form-control__input input" name="first_name" value="{{$userInfo['first_name']}}" placeholder="Имя">
                    @error('first_name')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="secondName" class="form-control__label">Фамилия</label>
                <div class="form-control__body">
                    <input id="secondName" type="text" class="form-control__input input" name="second_name" value="{{$userInfo['second_name']}}" placeholder="Фамилия">
                    @error('second_name')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="profession" class="form-control__label">Профессия</label>
                <div class="form-control__body">
                    <input id="profession" type="text" class="form-control__input input" name="profession" value="{{$userInfo['profession']}}" placeholder="Профессия">
                    @error('profession')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="yearBirth" class="form-control__label">Дата Рождения</label>
                <div class="form-control__body">
                    <input id="yearBirth" type="date" class="form-control__input input" name="year_birth" value="{{$userInfo['year_birth']}}">
                    @error('year_birth')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="city" class="form-control__label">Город</label>
                <div class="form-control__body">
                    <input id="city" type="text" class="form-control__input input" name="city" value="{{$userInfo['city']}}" placeholder="Город">
                    @error('city')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="about" class="form-control__label">О себе</label>
                <div class="form-control__body">
                    <textarea id="about" rows="10"  class="input" name="about" placeholder="Описание">{{$userInfo['about']}}</textarea>
                    @error('about')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="phone" class="form-control__label">Телефон</label>
                <div class="form-control__body">
                    <input id="phone" type="text" class="form-control__input input" name="phone" value="{{$userInfo['phone']}}" placeholder="Телефон">
                    @error('phone')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="mail" class="form-control__label">Эл. почта</label>
                <div class="form-control__body">
                    <input id="mail" type="text" class="form-control__input input" name="mail" value="{{$userInfo['mail']}}" placeholder="Эл. почта">
                    @error('mail')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="telegram" class="form-control__label">Телеграм</label>
                <div class="form-control__body">
                    <input id="telegram" type="text" class="form-control__input input" name="telegram" value="{{$userInfo['telegram']}}" placeholder="Телеграм">
                    @error('telegram')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="whatsapp" class="form-control__label">WhatsApp</label>
                <div class="form-control__body">
                    <input id="whatsapp" type="text" class="form-control__input input" name="whatsapp" value="{{$userInfo['whatsapp']}}" placeholder="WhatsApp">
                    @error('whatsapp')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="vk" class="form-control__label">Вконтакте</label>
                <div class="form-control__body">
                    <input id="vk" type="text" class="form-control__input input" name="vk" value="{{$userInfo['vk']}}" placeholder="Вконтакте">
                    @error('vk')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

        </div>

        <div class="form__bottom">
            <button type="submit" class="btn btn--yellow">Обновить данные</button>
        </div>
    </form>
@endsection
