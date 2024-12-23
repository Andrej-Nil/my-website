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
            <label for="postTitle" class="form-control__label">Фото</label>
            <input id="postTitle" type="file" class="input" name="file" placeholder="Фото">
        </div>

        <div class="form-control">
            <label for="postText" class="form-control__label">Текст</label>
            <textarea id="postText" rows="10"  class="input" name="title" placeholder="Описание"></textarea>
        </div>

        <div class="form-control">
            <span for="postText" class="form-control__label">Статус публикации</span>
            <div class="form-control__group">
                <div class="checkbox">
                    <label for="display2" class="form-control__label">Опубликовать</label>
                    <input id="display2" type="radio" class="input" name="display" value="1" checked>
                </div>
                <div class="checkbox">
                    <label for="display1" class="form-control__label">Скрыть</label>
                    <input id="display1" type="radio" class="input" name="display" value="0" >
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
