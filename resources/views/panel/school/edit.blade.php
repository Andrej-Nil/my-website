@extends('panel.layouts.app')

@section('title', 'Редатирование учереждения')

@section('content')
    <div class="content-top">
        <div class="breadcrumbs">
            <a href="{{route('panel.schools')}}" class="breadcrumbs-link">
                <span class="breadcrumbs-link__label">Образование</span>
                <span class="breadcrumbs-link__slash">\</span>
            </a>
            <a class="breadcrumbs-link">
                <span class="breadcrumbs-link__label">Редатировать учреждение</span>
            </a>
        </div>



        <div class="content-top__links">
            <a href="{{route('resume')}}" target="_blank" class="content-top__btn btn btn--blue">Просмотр резюме</a>
            <a href="{{route('panel.schools.create')}}" class="content-top__btn btn btn--yellow">Добавить учреждение</a>
        </div>

    </div>
    <h1 class="panel-title">Редатировать учереждения</h1>
    @if($errors->any())
        @include('panel.components.error-board', ['message'=>'Ошибка отправки формы.'])
    @endif
    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif

    <form action="{{route('panel.schools.update', $school['id'])}}" method="post" class="form">
        @csrf
        @method('PUT')
        <div class="form__body">
            <div class="form-control">
                <label for="title" class="form-control__label">Название</label>
                <div class="form-control__body">
                    <input id="title" type="text" class="form-control__input input" name="title" value="{{$school['title']}}" placeholder="Организация">
                    @error('title')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="specialization" class="form-control__label">Должность</label>
                <div class="form-control__body">
                    <input id="specialization" type="text" class="form-control__input input" name="specialization" value="{{$school['specialization']}}" placeholder="Должность">
                    @error('specialization')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>
            <div class="form-control">
                <label for="start" class="form-control__label">Начало</label>
                <div class="form-control__body">
                    <input id="start" type="date" class="form-control__input input" name="start" value="{{$school['start']}}">
                    @error('start')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="isCurrent" class="form-control__label">По настоящеее время</label>
                <div class="form-control__body">
                    <div class="checkbox">
                        <input type="hidden" name="is_current" value="0">
                        <input data-blocking-input="end" id="isCurrent" type="checkbox" class="input" name="is_current" value="1" @checked($school['is_current'])>
                        @error('is_current')<p class="form-control__error">{{$message}}</p>@enderror
                    </div>
                </div>
            </div>

            <div class="form-control">
                <label for="end" class="form-control__label">Окончание</label>
                <div class="form-control__body">

                    <input id="end" type="date" class="form-control__input input" name="end"
                           value="{{$school['is_current'] ? '' : $school['end'] }}"
                        @disabled($school['is_current'] == 1)
                    >
                    @error('end')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="text" class="form-control__label">Текст</label>
                <div class="form-control__body">
                    <textarea id="text" rows="10"  class="form-control__input input" name="text"  placeholder="Описание">{{$school['text']}}</textarea>
                    @error('text')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <span class="form-control__label">Статус публикации</span>
                <div class="form-control__group">
                    <div class="checkbox">
                        <label for="display1" class="checkbox__label">Опубликовать</label>
                        <input id="display1" type="radio" class="input" name="is_display" value="1"  @checked($school['is_display'] == 1)>
                    </div>

                    <div class="checkbox">
                        <label for="display2" class="checkbox__label">Скрыть</label>
                        <input id="display2" type="radio" class="input" name="is_display" value="0"  @checked($school['is_display'] == 0)>
                    </div>
                </div>
            </div>
        </div>
        <div class="form__bottom">
            <button type="submit" form="delete" class="btn btn--red">Удалить</button>
            <button type="submit" class="btn btn--yellow">Сохранить</button>
        </div>
    </form>
    <form id="delete"  action="{{route('panel.schools.delete', $school['id'])}}" method="post">
        @csrf
        @method('DELETE')
    </form>

@endsection
