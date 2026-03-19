@extends('panel.layouts.app')

@section('title', 'Оброзование')

@section('content')
    <h1 class="panel-title">Добавить учреждение</h1>
    @if($errors->any())
        @include('panel.components.error-board', ['message'=>'Ошибка отправки формы.'])
    @endif
    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif

    <form action="{{route('panel.qualities.store')}}" method="post" class="form">
        @csrf
        <div class="form__body">
            <div class="form-control">
                <label for="title" class="form-control__label">Название</label>
                <div class="form-control__body">
                    <input id="title" type="text" class="form-control__input input" name="title" value="{{old('title')}}" placeholder="Названия учреждение">
                    @error('title')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <span class="form-control__label">Тип</span>
                <div class="form-control__group">
                    <div class="checkbox">
                        <label for="type1" class="form-control__label">Профессиональные</label>
                        <input id="type1" type="radio" class="input" name="type" value="1" >
                    </div>

                    <div class="checkbox">
                        <label for="type0" class="form-control__label">Личные</label>
                        <input id="type0" type="radio" class="input" name="type" value="2" checked>
                    </div>
                </div>
            </div>

            <div class="form-control">
                <span class="form-control__label">Статус публикации</span>
                <div class="form-control__group">
                    <div class="checkbox">
                        <label for="display1" class="form-control__label">Опубликовать</label>
                        <input id="display1" type="radio" class="input" name="is_display" value="1" checked>
                    </div>

                    <div class="checkbox">
                        <label for="display2" class="form-control__label">Скрыть</label>
                        <input id="display2" type="radio" class="input" name="is_display" value="0">
                    </div>
                </div>
            </div>
        </div>


        <div class="form__bottom">
            <button type="submit" class="btn btn--yellow">Добавить</button>
        </div>
    </form>
@endsection
