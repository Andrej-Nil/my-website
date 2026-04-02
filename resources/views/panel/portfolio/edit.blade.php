@extends('panel.layouts.app')

@section('title', 'Редоктирование работы')

@section('content')
    <h1 class="panel-title">Добавление работы</h1>
    @if($errors->any())
        @include('panel.components.error-board', ['message'=>'Ошибка отправки формы.'])
    @endif
    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif

    <form id="formEdit" action="{{route('panel.portfolios.update', $portfolio['id'])}}" enctype="multipart/form-data" method="post" class="form">
        @csrf
        @method('PUT')
        <div class="form__body">
            <div class="form-control">
                <label for="title" class="form-control__label">Название</label>
                <div class="form-control__body">
                    <input id="title" type="text" class="form-control__input input" name="title" value="{{$portfolio['title']}}" placeholder="Название">
                    @error('title')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="link" class="form-control__label">Ссылка</label>
                <div class="form-control__body">
                    <input id="link" type="text" class="form-control__input input" name="link" value="{{$portfolio['link']}}" placeholder="Ссылка">
                    @error('link')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <div class="form-control__head">
                    <span class="form-control__label">Главное фото</span>
                    <p class="form-control__note">Загрузить изображение в формате jpg, jpeg, png</p>
                </div>
                <div data-upload-media-file="one" data-name="photo" class="media-file">

                    <div class="media-file__body">
                        <label class="media-file__btn download-btn">
                            <input data-media-add type="file" class="download-btn__input">
                            <img class="download-btn__icon" src="{{asset('panel-assets/img/icons/download-icon.svg')}}" alt="">
                            <span class="download-btn__label">Загрузить фото</span>
                        </label>
                        <div data-media-list class="media-file__list">
                            @if($portfolio['photo'])
                                <div data-media-item="{{$portfolio['photo']}}" class="media-file-item">
                                    <input data-media-input type="text" name="photo" value="{{$portfolio['photo']}}" class="media-file-item__input">
                                    <span data-media-delete class="media-file-item__btn top">Удалить</span>
                                    <img src="{{$portfolio['photo_url']}}" alt="" class="media-file-item__content">
                                    <span data-look="{{$portfolio['photo_url']}}" data-look-type="img" class="media-file-item__btn bottom">Просмотр</span>
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
                    <textarea id="text" rows="10" class="input" name="text" placeholder="Описание">{{$portfolio['text']}}</textarea>
                    @error('text')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <span class="form-control__label">Статус публикации</span>
                <div class="form-control__group">
                    <div class="checkbox">
                        <label for="display1" class="form-control__label">Опубликовать</label>
                        <input id="display1" type="radio" class="input" name="is_display" value="1" @checked($portfolio['is_display'] == 1)>
                    </div>
                    <div class="checkbox">
                        <label for="display2" class="form-control__label">Скрыть</label>
                        <input id="display2" type="radio" class="input" name="is_display" value="0" @checked($portfolio['is_display'] == 0)>
                    </div>

                </div>
            </div>
        </div>

        <div class="form__bottom">
            <button type="submit" form="delete" class="btn btn--red">Удалить</button>
            <button type="submit" class="btn btn--yellow">Сохранить</button>
        </div>
    </form>
    <form id="delete"  action="{{route('panel.portfolios.delete', $portfolio['id'])}}" method="post">
        @csrf
        @method('DELETE')
    </form>

@endsection
