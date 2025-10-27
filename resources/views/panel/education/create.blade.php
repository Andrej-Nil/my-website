@extends('panel.layouts.app')

@section('title', 'Оброзование')

@section('content')
    <h1 class="panel-title">Добавить место учебы</h1>
    @if($errors->any())
        @include('panel.components.error-board', ['message'=>'Ошибка отправки формы.'])
    @endif
    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif

    <form action="{{route('panel.educations.store')}}" method="post" class="form">
        @csrf

        <div class="form__body">
            <div class="form-control">
                <label for="postTitle" class="form-control__label">Название</label>
                <div class="form-control__body">
                    <input id="postTitle" type="text" class="form-control__input input" name="title" value="{{old('title')}}" placeholder="Названия заведения">
                    @error('title')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="specialization" class="form-control__label">Специальность</label>
                <div class="form-control__body">
                    <input id="specialization" type="text" class="form-control__input input" name="specialization" value="{{old('specialization')}}" placeholder="Специальность">
                    @error('specialization')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="start" class="form-control__label">Начало</label>
                <div class="form-control__body">
                    <input id="start" type="date" class="form-control__input input" name="start" value="{{old('start')}}">
                    @error('start')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="isCurrentDay" class="form-control__label">По настоящеее время</label>
                <div class="form-control__body">
                    <div class="checkbox">
                        <input  type="hidden" name="is_current_day" value="0">
                        <input id="isCurrentDay" type="checkbox" class="input" name="is_current_day" value="1" @checked(old('is_current_day') == 1)>
                    </div>
                </div>
            </div>

            <div class="form-control">
                <label for="end" class="form-control__label">Окончание</label>
                <div class="form-control__body">
                    <input id="end" type="date" class="form-control__input input" name="end" value="{{old('end')}}">
                    @error('end')<p class="form-control__error">{{$message}}</p>@enderror
                </div>
            </div>

            <div class="form-control">
                <label for="jobsText" class="form-control__label">Приобретеные</label>
                <div class="form-control__body">
                    <textarea id="jobsText" rows="10"  class="input" name="text"  placeholder="Приобретеные навыки">{{old('text')}}</textarea>
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
