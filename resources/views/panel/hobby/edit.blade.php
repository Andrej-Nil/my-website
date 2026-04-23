@extends('panel.layouts.app')

@section('title', 'Редактировать хобби')

@section('content')
    <div class="content-top">
        <div class="breadcrumbs">
            <a href="{{route('panel.hobbies')}}" class="breadcrumbs__link">Хобби</a>
            <span class="breadcrumbs__slash">\</span>
            <a class="breadcrumbs__link">Редактировать хобби</a>
        </div>

        <a href="{{route('hobbies')}}" class="btn btn--blue">Ссылка на страницу хобби</a>
        <a href="{{route('panel.hobbies.create')}}" class="btn btn--yellow">Добавить хобби</a>
    </div>
    <h1 class="panel-title">Редактировать хобби</h1>
    @if($errors->any())
        @include('panel.components.error-board', ['message'=>'Ошибка сохранения формы.'])
    @endif
    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif

    <form id="formEdit" data-api="{{route('hobby.api.update', $hobby['id'])}}"  action="{{route('panel.hobbies.update', $hobby['id'])}}" method="post" class="form">
        @csrf
        @method('PUT')
        <div class="form__body">
            <div class="form-control">
                <label for="title" class="form-control__label">Название</label>
                <div class="form-control__body">
                    <input id="title" type="text" class="form-control__input input" name="title" value="{{$hobby['title']}}" placeholder="Название поста">
                    @error('title')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <div class="form-control__head">
                    <span class="form-control__label">Главное фото</span>
                    <p class="form-control__note">Загрузить изображение в формате jpg, jpeg, png</p>
                </div>
                <div data-upload-media-file="one" data-name="main_photo" class="media-file">

                    <div class="media-file__body">
                        <label class="media-file__btn download-btn">
                            <input data-media-add type="file" class="download-btn__input">
                            <img class="download-btn__icon" src="{{asset('panel-assets/img/icons/download-icon.svg')}}" alt="">
                            <span class="download-btn__label">Загрузить фото</span>
                        </label>
                        <div data-media-list class="media-file__list">
                            @if($hobby['main_photo'])
                                <div data-media-item="{{$hobby['main_photo']}}" class="media-file-item">
                                    <input data-media-input="" type="text" name="main_photo" value="{{$hobby['main_photo']}}" class="media-file-item__input">
                                    <span data-media-delete="" class="media-file-item__btn top">Удалить</span>
                                    <img src="{{$hobby['main_photo_url']}}" alt="" class="media-file-item__content">
                                    <span data-look="{{$hobby['main_photo_url']}}" data-look-type="img" class="media-file-item__btn bottom">Просмотр</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <p data-media-error class="media-file__error"></p>
                </div>
            </div>

            <div class="form-control">
                <div class="form-control__head">
                    <span class="form-control__label">Фоновое фото</span>
                    <p class="form-control__note">Загрузить изображение в формате jpg, jpeg, png</p>
                </div>
                <div data-upload-media-file="one" data-name="bg_photo" class="media-file">
                    <div class="media-file__body">
                        <label class="media-file__btn download-btn">
                            <input data-media-add type="file" class="download-btn__input">
                            <img class="download-btn__icon" src="{{asset('panel-assets/img/icons/download-icon.svg')}}" alt="">
                            <span class="download-btn__label">Загрузить фото</span>
                        </label>
                        <div data-media-list class="media-file__list">
                            @if($hobby['bg_photo'])
                                <div data-media-item="{{$hobby['bg_photo']}}" class="media-file-item">
                                    <input data-media-input="" type="text" name="bg_photo" value="{{$hobby['bg_photo']}}" class="media-file-item__input">
                                    <span data-media-delete="" class="media-file-item__btn top">Удалить</span>
                                    <img src="{{$hobby['bg_photo_url']}}" alt="" class="media-file-item__content">
                                    <span data-look="{{$hobby['bg_photo_url']}}" data-look-type="img" class="media-file-item__btn bottom">Просмотр</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <p data-media-error class="media-file__error"></p>
                </div>
            </div>

            <div class="form-control">
                <div class="form-control__head">
                    <span class="form-control__label">Миниатюра</span>
                    <p class="form-control__note">Загрузить изображение в формате jpg, jpeg, png</p>
                </div>
                <div data-upload-media-file="one" data-name="mini_photo" class="media-file">
                    <div class="media-file__body">
                        <label class="media-file__btn download-btn">
                            <input data-media-add type="file" class="download-btn__input">
                            <img class="download-btn__icon" src="{{asset('panel-assets/img/icons/download-icon.svg')}}" alt="">
                            <span class="download-btn__label">Загрузить фото</span>
                        </label>
                        <div data-media-list class="media-file__list">
                            @if($hobby['mini_photo'])
                                <div data-media-item="{{$hobby['mini_photo']}}" class="media-file-item">
                                    <input data-media-input="" type="text" name="mini_photo" value="{{$hobby['mini_photo']}}" class="media-file-item__input">
                                    <span data-media-delete="" class="media-file-item__btn top">Удалить</span>
                                    <img src="{{$hobby['mini_photo_url']}}" alt="" class="media-file-item__content">
                                    <span data-look="{{$hobby['mini_photo_url']}}" data-look-type="img" class="media-file-item__btn bottom">Просмотр</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <p data-media-error class="media-file__error"></p>
                </div>
            </div>

            <div class="form-control">
                <label for="text" class="form-control__label">Текст</label>
                <div class="form-control__body">
                    <textarea id="text" rows="10"  class="input" name="text"  placeholder="Описание">{{$hobby['text']}}</textarea>
                    @error('text')<p class="form-control__error">{{$message}}</p>@enderror
                </div>

            </div>

            <div class="form-control">
                <div class="form-control__head">
                    <span class="form-control__label">Галерея</span>
                    <p class="form-control__note">Вы можите загрузить до 4 изображений в формате jpg, jpeg, png</p>
                </div>
                <div data-upload-media-file="multi" data-name="photo_list[]" class="media-file">
                    <div class="media-file__body">
                        <label class="media-file__btn download-btn">
                            <input data-media-add type="file" class="download-btn__input">
                            <img class="download-btn__icon" src="{{asset('panel-assets/img/icons/download-icon.svg')}}" alt="">
                            <span class="download-btn__label">Загрузить фото</span>
                        </label>
                        <div data-media-list class="media-file__list">
                            @if($hobby['photo_list'])
                                @foreach($hobby['photo_list'] as $key=>$photo)
                                @if(isset($hobby['photo_list_url'][$key]))
                                    <div data-media-item="{{$photo}}" class="media-file-item">
                                        <input data-media-input="" type="text" name="photo_list[]" value="{{$photo}}" class="media-file-item__input new">
                                        <span data-media-delete="" class="media-file-item__btn top">Удалить</span>
                                        <img src="{{$hobby['photo_list_url'][$key]}} " alt="" class="media-file-item__content">
                                        <span data-look="{{$hobby['photo_list_url'][$key]}}" data-look-type="img" class="media-file-item__btn bottom">Просмотр</span>
                                    </div>
                                @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <p data-media-error class="media-file__error"></p>
                </div>
            </div>

            <div class="form-control">
                <span class="form-control__label">Статус публикации</span>
                <div class="form-control__group">
                    <div class="checkbox">
                        <label for="display1" class="form-control__label">Опубликовать</label>
                        <input id="display1" type="radio" class="input" name="is_display" value="1" @checked($hobby['is_display'] == 1)>
                    </div>
                    {{--                @dd(old('is_display'))--}}
                    <div class="checkbox">
                        <label for="display2" class="form-control__label">Скрыть</label>
                        <input id="display2" type="radio" class="input" name="is_display" value="0" @checked($hobby['is_display'] == 0)>
                    </div>

                </div>
            </div>
            {{--            <textarea id="postText" rows="10"  class="input" name="title" placeholder="Описание"></textarea>--}}
        </div>
        <div class="form__bottom">

            <button type="submit" form="delete" class="btn btn--red">Удалить</button>
            <button type="submit" class="btn btn--yellow">Сохранить</button>
        </div>

    </form>
    <form id="delete"  action="{{route('panel.hobbies.delete', $hobby['id'])}}" method="post">
        @csrf
        @method('DELETE')
    </form>
@endsection
