@extends('panel.layouts.app')

@section('title', 'Редактирование места работы')

@section('content')
    <div class="content-top">
        <div class="breadcrumbs">
            <a href="{{route('panel.jobs')}}" class="breadcrumbs__link">Опыт работы</a>
            <span class="breadcrumbs__slash">\</span>
            <a class="breadcrumbs__link">Редактирование места работы</a>
        </div>

        <div class="btn-list">
            <a href="{{route('resume')}}" target="_blank"  type="submit" class="btn btn--blue">Ссылка на страницу резюме</a>
            <a href="{{route('panel.jobs.create')}}" class="btn btn--yellow">Добавить место работы</a>
        </div>

    </div>
    <h1 class="panel-title">Редактирование места работы</h1>
    @if($errors->any())
        @include('panel.components.error-board', ['message'=>'Ошибка отправки формы.'])
    @endif
    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif

    <form action="{{route('panel.jobs.update', $job['id'])}}" method="post" class="form">
        @csrf
        @method('PUT')
        <div class="form__body">
            <div class="form-control">
                <label for="title" class="form-control__label">Название</label>
                <div class="form-control__body">
                    <input id="title" type="text" class="form-control__input input" name="title" value="{{$job['title']}}" placeholder="Организация">
                    @error('title')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="profession" class="form-control__label">Должность</label>
                <div class="form-control__body">
                    <input id="profession" type="text" class="form-control__input input" name="profession" value="{{$job['profession']}}" placeholder="Должность">
                    @error('profession')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>
            <div class="form-control">
                <label for="start" class="form-control__label">Начало</label>
                <div class="form-control__body">
                    <input id="start" type="date" class="form-control__input input" name="start" value="{{$job['start']}}">
                    @error('start')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="isCurrent" class="form-control__label">По настоящеее время</label>
                <div class="form-control__body">
                    <div class="checkbox">
                        <input type="hidden" name="is_current" value="0">
                        <input data-blocking-input="end" id="isCurrent" type="checkbox" class="input" name="is_current" value="1" @checked($job['is_current'])>
                        @error('is_current')<p class="form-control__error">{{$message}}</p>@enderror
                    </div>
                </div>
            </div>

            <div class="form-control">
                <label for="end" class="form-control__label">Окончание</label>
                <div class="form-control__body">

                    <input id="end" type="date" class="form-control__input input" name="end"
                        value="{{$job['is_current'] ? '' : $job['end'] }}"
                        @disabled($job['is_current'] == 1)
                    >
                    @error('end')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="text" class="form-control__label">Текст</label>
                <div class="form-control__body">
                    <textarea id="text" rows="10"  class="input" name="text"  placeholder="Описание">{{$job['text']}}</textarea>
                    @error('text')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <span class="form-control__label">Статус публикации</span>
                <div class="form-control__group">
                    <div class="checkbox">
                        <label for="display1" class="form-control__label">Опубликовать</label>
                        <input id="display1" type="radio" class="input" name="is_display" value="1"  @checked($job['is_display'] == 1)>
                    </div>

                    <div class="checkbox">
                        <label for="display2" class="form-control__label">Скрыть</label>
                        <input id="display2" type="radio" class="input" name="is_display" value="0"  @checked($job['is_display'] == 0)>
                    </div>

                </div>
            </div>

        </div>
        <div class="form__bottom">
            <button type="submit" form="delete" class="btn btn--red">Удалить</button>
            <button type="submit" class="btn btn--yellow">Сохранить</button>
        </div>


    </form>
    <form id="delete" action="{{route('panel.jobs.delete', $job['id'])}}" method="post">
        @csrf
        @method('DELETE')
    </form>

@endsection
