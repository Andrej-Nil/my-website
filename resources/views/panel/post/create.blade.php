@extends('panel.layouts.app')

@section('title', 'Создание поста')

@section('content')
    <h1 class="panel-title">Создание поста</h1>

    <form action="{{route('panel.posts.store')}}" method="post" class="form">
        @csrf
        <div class="form__body">
        <div class="form-control">
            <label for="postTitle" class="form-control__label">Название</label>
            <input id="postTitle" type="text" class="input" name="title" placeholder="Название поста">
        </div>

        <div class="form-control">
            <span class="form-control__label">Фото</span>
            <div data-upload class="upload-file" data-name="photo" data-upload-api="{{route('upload.photo')}} ">

                <label class="upload-file-btn">
                    <input data-upload-input type="file" class="upload-file-btn__input">
                    <span class="upload-file-btn__fake">
                        <span class="upload-file-btn__pic">
                            <img class="upload-file-btn__icon" src="{{asset('panel-assets/img/icons/download-icon.svg')}}" alt="">
                        </span>
                        <span class="upload-file-btn__label">Загрузить фото</span>
                    </span>
                </label>

                <div data-upload-preview class="upload-file-preview">
{{--                    <div data-upload-loader class="upload-file__loader">--}}
{{--                        @include('panel.components.spinner')--}}
{{--                    </div>--}}
{{--                    <div data-upload-photo class="upload-file-photo">--}}
{{--                        <img class="upload-file-photo__img" src="https://avatars.mds.yandex.net/i?id=1e0670b06696c56241f290174efa2385_sr-5858835-images-thumbs&n=13"/>--}}
{{--                        <button type="button" class="btn btn--yellow upload-file-photo__btn upload-file-photo__btn--top">Просмотр</button>--}}
{{--                        <button type="button"  class="btn btn--red upload-file-photo__btn upload-file-photo__btn--bottom">Удалить</button>--}}
{{--                    </div>--}}
                </div>
{{--                <input id="postTitle" type="file" class="input" name="file" placeholder="Фото">--}}
            </div>

        </div>

        <div class="form-control">
            <label for="postText" class="form-control__label">Текст</label>
            <textarea id="postText" rows="10"  class="input" name="text" placeholder="Описание"></textarea>
        </div>

        <div class="form-control">
            <span for="postText" class="form-control__label">Статус публикации</span>
            <div class="form-control__group">
                <div class="checkbox">
                    <label for="display1" class="form-control__label">Опубликовать</label>
                    <input id="display1" type="radio" class="input" name="is_display" value="1" checked>
                </div>
                <div class="checkbox">
                    <label for="display2" class="form-control__label">Скрыть</label>
                    <input id="display2" type="radio" class="input" name="is_display" value="0" >
                </div>

            </div>
        </div>
{{--            <textarea id="postText" rows="10"  class="input" name="title" placeholder="Описание"></textarea>--}}
        </div>
        <div class="form__bottom">
            <button type="submit" class="btn btn--yellow">Создать пост</button>
        </div>
    </form>
@endsection
