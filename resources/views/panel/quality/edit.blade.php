@extends('panel.layouts.app')

@section('title', 'Редотирование качества')

@section('content')
    <h1 class="panel-title">Редотирование места обучения</h1>
    @if($errors->any())
        @include('panel.components.error-board', ['message'=>'Ошибка отправки формы.'])
    @endif
    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif

    <form action="{{route('panel.qualities.update', $quality['id'])}}" method="post" class="form">
        @csrf
        @method('PUT')
        <div class="form__body">
            <div class="form-control">
                <label for="title" class="form-control__label">Название</label>
                <div class="form-control__body">
                    <input id="title" type="text" class="form-control__input input" name="title" value="{{$quality['title']}}" placeholder="Организация">
                    @error('title')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>


            <div class="form-control">
                <span class="form-control__label">Тип</span>
                <div class="form-control__group">
                    <div class="checkbox">
                        <label for="type0" class="form-control__label">Личные</label>
                        <input id="type0" type="radio" class="input" name="type" value="1"  @checked($quality['type'] == 1)>
                    </div>

                    <div class="checkbox">
                        <label for="type1" class="form-control__label">Профессиональные</label>
                        <input id="type1" type="radio" class="input" name="type" value="2" @checked($quality['type'] == 2)>
                    </div>

                </div>
            </div>

            <div class="form-control">
                <span class="form-control__label">Статус публикации</span>
                <div class="form-control__group">
                    <div class="checkbox">
                        <label for="display1" class="form-control__label">Опубликовать</label>
                        <input id="display1" type="radio" class="input" name="is_display" value="1" @checked($quality['is_display'] == 1)>
                    </div>

                    <div class="checkbox">
                        <label for="display2" class="form-control__label">Скрыть</label>
                        <input id="display2" type="radio" class="input" name="is_display" value="0" @checked($quality['is_display'] == 0)>
                    </div>
                </div>
            </div>

        </div>
        <div class="form__bottom">
            <button type="submit" form="delete" class="btn btn--red">Удалить</button>
            <button type="submit" class="btn btn--yellow">Сохранить</button>
        </div>

    </form>
    <form id="delete"  action="{{route('panel.qualities.delete', $quality['id'])}}" method="post">
        @csrf
        @method('DELETE')
    </form>

@endsection
