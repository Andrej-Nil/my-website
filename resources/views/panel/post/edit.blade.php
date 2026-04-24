@extends('panel.layouts.app')

@section('title', 'Редастировать пост')

@section('content')
    <div class="content-top">

        <div class="breadcrumbs">
            <a href="{{route('panel.posts')}}" class="breadcrumbs__link">Посты</a>
            <span class="breadcrumbs__slash">\</span>
            <a class="breadcrumbs__link">Редастировать пост</a>
        </div>

        <div class="btn-list">
            <a href="{{route('posts.show', $post['id'])}}" target="_blank" type="submit" class="btn btn--blue">Ссылка на страницу поста</a>
            <a href="{{route('panel.posts.create')}}" class="btn btn--yellow">Создать новый пост</a>
        </div>

    </div>

    <h1 class="panel-title">Редактировать пост</h1>
    @if($errors->any())
        @include('panel.components.error-board', ['message'=>'Ошибка сохранения формы.'])
    @endif
    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif


    <form id="formEdit" action="{{route('panel.posts.update', $post['id'])}}" method="post" class="form">
        @csrf
        @method('PUT')
        <div class="form__body">
            <div class="form-control">
                <label for="title" class="form-control__label">Название</label>
                <div class="form-control__body">
                    <input id="title" type="text" class="form-control__input input" name="title" value="{{$post['title']}}" placeholder="Название поста">
                    @error('title')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <div class="form-control__head">
                    <span class="form-control__label">Фотографии</span>
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
                            @if($post['photo_list'])
                                @foreach($post['photo_list'] as $key=>$photo)
                                    @if(isset($post['photo_list_url'][$key]))
                                        <div data-media-item="{{$photo}}" class="media-file-item">
                                            <input data-media-input="" type="text" name="photo_list[]" value="{{$photo}}" class="media-file-item__input new">
                                            <span data-media-delete="" class="media-file-item__btn top">Удалить</span>
                                            <img src="{{$post['photo_list_url'][$key]}} " alt="" class="media-file-item__content">
                                            <span data-look="{{$post['photo_list_url'][$key]}}" data-look-type="img" class="media-file-item__btn bottom">Просмотр</span>
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
                <label for="postText" class="form-control__label">Текст</label>
                <div class="form-control__body">
                    <textarea id="text" rows="10"  class="input" name="text"  placeholder="Описание">{{$post['text']}}</textarea>
                    @error('text')<p class="form-control__error">{{$message}}</p>@enderror
                </div>

            </div>

            <div class="form-control">
                <span class="form-control__label">Статус публикации</span>
                <div class="form-control__group">
                    <div class="checkbox">
                        <label for="display1" class="form-control__label">Опубликовать</label>
                        <input id="display1" type="radio" class="input" name="is_display" value="1" @checked($post['is_display'] == 1)>
                    </div>
                    {{--                @dd(old('is_display'))--}}
                    <div class="checkbox">
                        <label for="display2" class="form-control__label">Скрыть</label>
                        <input id="display2" type="radio" class="input" name="is_display" value="0" @checked($post['is_display'] == 0)>
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
    <form id="delete"  action="{{route('panel.posts.delete', $post['id'])}}" method="post">
        @csrf
        @method('DELETE')
    </form>
@endsection
