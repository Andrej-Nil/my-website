@extends('panel.layouts.app')

@section('title', 'Создание поста')

@section('content')
    <h1 class="panel-title">Добовление места</h1>
    @if($errors->any())
        @include('panel.components.error-board', ['message'=>'Ошибка отправки формы.'])
    @endif
    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif

    <form action="{{route('panel.jobs.store')}}" method="post" class="form">
        @csrf

        <div class="form__body">
        <div class="form-control">
            <label for="jobsTitle" class="form-control__label">Название</label>
            <div class="form-control__body">
                <input id="jobsTitle" type="text" class="form-control__input input" name="title" value="{{old('title')}}" placeholder="Организация">
                @error('title')<p class="form-control__error">{{$message}}</p>@enderror
            </div>
        </div>

            <div class="form-control">
                <label for="jobsProfession" class="form-control__label">Должность</label>
                <div class="form-control__body">
                    <input id="jobsProfession" type="text" class="form-control__input input" name="profession" value="{{old('profession')}}" placeholder="Должность">
                    @error('profession')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>
            <div class="form-control">
                <label for="jobsStart" class="form-control__label">Начало</label>
                <div class="form-control__body">
                    <input id="jobsStart" type="date" class="form-control__input input" name="start" value="{{old('start')}}">
                    @error('start')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="isCurrentJob" class="form-control__label">По настоящеее время</label>
                <div class="form-control__body">
                    <div class="checkbox">
                        <input  type="hidden" name="is_current_job" value="0">
                        <input id="isCurrentJob" type="checkbox" class="input" name="is_current_job" value="1" @checked(old('is_current_job') == 1)>
                    </div>
                </div>
            </div>

            <div class="form-control">
                <label for="jobsEnd" class="form-control__label">Окончание</label>
                <div class="form-control__body">
                    <input id="jobsEnd" type="date" class="form-control__input input" name="end" value="{{old('end')}}">
                    @error('end')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="jobsText" class="form-control__label">Текст</label>
                <div class="form-control__body">
                    <textarea id="jobsText" rows="10"  class="input" name="text"  placeholder="Описание">{{old('text')}}</textarea>
                    @error('text')<p class="form-control__error">{{$message}}</p>@enderror
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
