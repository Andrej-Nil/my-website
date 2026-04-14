@extends('panel.layouts.app')

@section('title', 'Создание поста')

@section('content')
    <div class="content-top">

        <div class="breadcrumbs">
            <a href="{{route('panel.posts')}}" class="breadcrumbs__link">Посты</a>
            <span class="breadcrumbs__slash">\</span>
            <a class="breadcrumbs__link">Создание поста</a>
        </div>
    </div>
    <h1 class="panel-title">Создание поста</h1>
    @if($errors->any())
        @include('panel.components.error-board', ['message'=>'Ошибка отправки формы.'])
    @endif
    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif

    <form id="formCreate" action="{{route('panel.posts.store')}}" enctype="multipart/form-data" method="post" class="form">
        @csrf

        <div class="form__body">
            <div class="form-control">
                <label for="title" class="form-control__label">Название</label>
                <div class="form-control__body">
                    <input id="title" type="text" class="form-control__input input" name="title" value="{{old('title')}}" placeholder="Название поста">
                    @error('title')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <div class="form-control__head">
                    <span class="form-control__label">Фотографии</span>
                    <p class="form-control__note">Вы можите загрузить до 4 изображений в формате jpg, jpeg, png</p>
                </div>
                <div data-media-file="multi" data-total="4" data-format="jpg,jpeg,png" data-name="photo_list[]" class="media-file">
                    <div class="media-file__body">
                        <label class="media-file__btn download-btn">
                            <input data-media-add type="file" class="download-btn__input">
                            <img class="download-btn__icon" src="{{asset('panel-assets/img/icons/download-icon.svg')}}" alt="">
                            <span class="download-btn__label">Загрузить фото</span>
                        </label>
                        <div data-media-list class="media-file__list">

                        </div>
                    </div>
                    <p data-media-error class="media-file__error"></p>
                </div>
            </div>

            <div class="form-control">
                <label for="text" class="form-control__label">Текст</label>
                <div class="form-control__body">
                    <textarea id="text" rows="10"  class="input" name="text"  placeholder="Описание">{{old('text')}}</textarea>
                    @error('text')<p class="form-control__error">{{$message}}</p>@enderror
                </div>

            </div>

            <div class="form-control">
                <span class="form-control__label">Статус публикации</span>
                <div class="form-control__group">
                    <div class="checkbox">
                        <label for="display1" class="form-control__label">Опубликовать</label>
                        <input id="display1" type="radio" class="input" name="is_display" value="1" checked>

                    <div class="checkbox">
                        <label for="display2" class="form-control__label">Скрыть</label>
                        <input id="display2" type="radio" class="input" name="is_display" value="0">
                    </div>

                </div>
            </div>
        </div>
        <div class="form__bottom">
            <button type="submit" class="btn btn--yellow">Создать пост</button>
        </div>
    </form>
@endsection
