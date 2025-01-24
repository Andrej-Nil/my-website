@extends('panel.layouts.app')

@section('title', 'Создание поста')

@section('content')
    <h1 class="panel-title">Редостирование контакта</h1>
    @if($errors->any())
        @include('panel.components.error-board', ['message'=>'Ошибка отправки формы.'])
    @endif
    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif

    <form action="{{route('panel.contacts.update', $contact['id'])}}" method="post" class="form">
        @csrf
        @method('PUT')
        <div class="form__body">
            <div class="form-control">
                <label for="postTitle" class="form-control__label">Название</label>
                <div class="form-control__body">
                    <input id="postTitle" type="text" class="form-control__input input" name="title" value="{{$contact['title']}}" placeholder="Название поста">
                    @error('title')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <span class="form-control__label">Иконка</span>
                <div data-upload class="upload-file" data-name="photo" data-upload-api="{{route('upload.photo')}} ">
                    <div class="form-control__body">
                        <label class="upload-file-btn">
                            <input data-upload-input type="file" class="upload-file-btn__input">
                            <span class="upload-file-btn__fake">
                            <span class="upload-file-btn__pic">
                                <img class="upload-file-btn__icon" src="{{asset('panel-assets/img/icons/download-icon.svg')}}" alt="">
                            </span>
                            <span class="upload-file-btn__label">Загрузить</span>
                        </span>
                        </label>
                        @error('photo_id')<p class="form-control__error">{{$message}}</p>@enderror
                    </div>
                    <div data-upload-preview class="upload-file-preview">
                        @if($contact['photo'])
                            <div data-upload-photo="{{$contact['photo']['id']}}" class="upload-file-photo">
                                <input type="hidden" name="photo_id" value="{{$contact['photo']['id']}}">
                                <img class="upload-file-photo__img" src="{{$contact['photo']['url']}}" alt=""/>
                                <button type="button" class="btn btn--yellow upload-file-photo__btn upload-file-photo__btn--top">Просмотр</button>
                                <button type="button"  class="btn btn--red upload-file-photo__btn upload-file-photo__btn--bottom">Удалить</button>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <div class="form-control">
                <label for="postTitle" class="form-control__label">Ссылка</label>
                <div class="form-control__body">
                    <input id="contactTitle" type="text" class="form-control__input input" name="link" value="{{$contact['link']}}" placeholder="Ссылка">
                    @error('link')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="postTitle" class="form-control__label">Отображение</label>
                <div class="form-control__body">
                    <input id="contactDisplay" type="text" class="form-control__input input" name="display" value="{{$contact['display']}}" placeholder="Отображение">
                    @error('display')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>


            <div class="form-control">
                <span class="form-control__label">Отображать</span>
                <div class="form-control__group">
                    <div class="checkbox">
                        <label for="display1" class="form-control__label">Да</label>
                        <input id="display1" type="radio" class="input" name="is_display" value="1" @checked($contact['is_display'] == 1)>
                    </div>
                    {{--                @dd(old('is_display'))--}}
                    <div class="checkbox">
                        <label for="display2" class="form-control__label">Нет</label>
                        <input id="display2" type="radio" class="input" name="is_display" value="0" @checked($contact['is_display'] == 0)>
                    </div>

                </div>
            </div>
            {{--                        <textarea id="postText" rows="10"  class="input" name="title" placeholder="Описание"></textarea>--}}
        </div>
        <div class="form__bottom">
            <button type="submit" class="btn btn--yellow">Сохранить изменения</button>
        </div>
    </form>
@endsection
