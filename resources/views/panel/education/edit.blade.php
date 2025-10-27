@extends('panel.layouts.app')

@section('title', 'Редотирование места обучения')

@section('content')
    <h1 class="panel-title">Редотирование места обучения</h1>
    @if($errors->any())
        @include('panel.components.error-board', ['message'=>'Ошибка отправки формы.'])
    @endif
    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif

    <form action="{{route('panel.educations.update', $education['id'])}}" method="post" class="form">
        @csrf
        @method('PUT')
        <div class="form__body">
            <div class="form-control">
                <label for="title" class="form-control__label">Название</label>
                <div class="form-control__body">
                    <input id="title" type="text" class="form-control__input input" name="title" value="{{$education['title']}}" placeholder="Организация">
                    @error('title')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="specialization" class="form-control__label">Должность</label>
                <div class="form-control__body">
                    <input id="specialization" type="text" class="form-control__input input" name="profession" value="{{$education['specialization']}}" placeholder="Должность">
                    @error('specialization')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>
            <div class="form-control">
                <label for="start" class="form-control__label">Начало</label>
                <div class="form-control__body">
                    <input id="start" type="date" class="form-control__input input" name="start" value="{{$education['start']}}">
                    @error('start')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="current" class="form-control__label">По настоящеее время</label>
                <div class="form-control__body">
                    <div class="checkbox">
                        <input type="hidden" name="is_current_day" value="0">
                        <input id="current" type="checkbox" class="input" name="is_current_day" value="1" @checked($education['is_current_day'])>
                    </div>
                </div>
            </div>

            <div class="form-control">
                <label for="end" class="form-control__label">Окончание</label>
                <div class="form-control__body">
                    <input id="end" type="date" class="form-control__input input" name="end" value="{{$education['end']}}">
                    @error('end')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="jobsText" class="form-control__label">Текст</label>
                <div class="form-control__body">
                    <textarea id="jobsText" rows="10"  class="input" name="text"  placeholder="Описание">{{$education['text']}}</textarea>
                    @error('text')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <span class="form-control__label">Статус публикации</span>
                <div class="form-control__group">
                    <div class="checkbox">
                        <label for="display1" class="form-control__label">Опубликовать</label>
                        <input id="display1" type="radio" class="input" name="is_display" value="1"  @checked($education['is_display'] == 1)>
                    </div>

                    <div class="checkbox">
                        <label for="display2" class="form-control__label">Скрыть</label>
                        <input id="display2" type="radio" class="input" name="is_display" value="0"  @checked($education['is_display'] == 0)>
                    </div>

                </div>
            </div>
        </div>
        <div class="form__bottom">
            <button type="submit" form="deletePost" class="btn btn--red">Удалить</button>
            <button type="submit" class="btn btn--yellow">Сохранить</button>

        </div>


    </form>
    <form id="deletePost"  action="{{route('panel.educations.delete', $education['id'])}}" method="post">
        @csrf
        @method('DELETE')
    </form>

@endsection
