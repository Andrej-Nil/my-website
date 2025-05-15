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

    <form action="{{route('panel.hobbies.store')}}" method="post" class="form">
        @csrf

        <div class="form__body">
        <div class="form-control">
            <label for="postTitle" class="form-control__label">Название</label>
            <div class="form-control__body">
                <input id="postTitle" type="text" class="form-control__input input" name="title" value="{{old('title')}}" placeholder="Название поста">
                @error('title')<p class="form-control__error">{{$message}}</p>@enderror
            </div>
        </div>

        <div class="form-control">
            <span class="form-control__label">Главное фото</span>
            <div data-upload class="upload-file" data-name="photo" data-upload-api="{{route('upload.photo')}}">
                <div class="form-control__body">
                    <label class="upload-file-btn">
                        <input data-upload-input type="file" class="upload-file-btn__input">
                        <span class="upload-file-btn__fake">
                            <span class="upload-file-btn__pic">
                                <img class="upload-file-btn__icon" src="{{asset('panel-assets/img/icons/download-icon.svg')}}" alt="">
                            </span>
                            <span class="upload-file-btn__label">Загрузить фото</span>
                        </span>
                    </label>
                    @error('photo_id')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
                <div data-upload-preview class="upload-file-preview"></div>
            </div>

        </div>

        <div class="form-control">
            <label for="postText" class="form-control__label">Текст</label>
            <div class="form-control__body">
                <textarea id="postText" rows="10"  class="input" name="text"  placeholder="Описание">{{old('text')}}</textarea>
                @error('text')<p class="form-control__error">{{$message}}</p>@enderror
            </div>

        </div>

        <div class="form-control">
                <span class="form-control__label">Дополнительные фото</span>
                <div data-upload class="upload-file" data-name="photo-list" data-upload-api="{{route('upload.photo')}}">
                    <div class="form-control__body">
                        <label class="upload-file-btn">
                            <input data-upload-input type="file" class="upload-file-btn__input">
                            <span class="upload-file-btn__fake">
                            <span class="upload-file-btn__pic">
                                <img class="upload-file-btn__icon" src="{{asset('panel-assets/img/icons/download-icon.svg')}}" alt="">
                            </span>
                            <span class="upload-file-btn__label">Загрузить фото</span>
                        </span>
                        </label>
                        @error('photo_id')<p class="form-control__error">{{$message}}</p>@enderror
                    </div>
                    <div data-upload-preview class="upload-file-preview"></div>
                </div>

            </div>

        <div class="form-control">
            <span class="form-control__label">Статус публикации</span>
            <div class="form-control__group">
                <div class="checkbox">
                    <label for="display1" class="form-control__label">Опубликовать</label>
                    <input id="display1" type="radio" class="input" name="is_display" value="1" checked>
                </div>
{{--                @dd(old('is_display'))--}}
                <div class="checkbox">
                    <label for="display2" class="form-control__label">Скрыть</label>
                    <input id="display2" type="radio" class="input" name="is_display" value="0">
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
