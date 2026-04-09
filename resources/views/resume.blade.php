@extends('layouts.app')

@section('title', 'Decs')

@section('content')

    <div class="container">
        <div class="content">
            <div class="breadcrumbs">
                <a href="{{route('home')}}" class="breadcrumbs__link">Главная</a>
                <span class="breadcrumbs__slash">/</span>
                <a class="breadcrumbs__link">Decs</a>
            </div>

            <h1 class="page-title">Резюме</h1>

            <div class="resume">
                <div class="resume__top">
                    <div class="badge">
                        <img src="{{$admin['photo_url']}}" alt="" class="badge__photo">
                        <div class="badge__body">
                            <p class="badge__name">{{$admin['second_name'].' '.$admin['first_name']}}</p>
                            <p class="badge__data">Дата рождения: {{$admin['year_birth_date']}}</p>
                            <p class="badge__post">{{$admin['profession']}}</p>
                        </div>
                    </div>
                </div>

                <div class="resume__body">
                    <div class="resume__main">
                    @if($jobList)
                        <div class="resume-block">
                            <p class="resume-block__title">Опыт работы</p>
                            <div class="resume-block__content">
                                <div data-group class="resume-group display-only-first">
                                    @foreach($jobList as $job)
                                    <div data-group-item class="resume-item">
                                        <div class="resume-item__top">
                                            <p class="resume-item__title">{{$job['title']}}</p>
                                            <p class="resume-item__period">
                                                Начало работы: {{$job['start_date']}}
                                            </p>
                                            <p class="resume-item__period">
                                                Окончание работы: {{$job['is_current'] ? ' по настоящее время' : $job['end_date']}}
                                            </p>
                                            <p class="resume-item__option">
                                                Должность: {{$job['profession']}}
                                            </p>
                                        </div>

                                        <div class="resume-item-desc">
                                            <p class="resume-item-desc__title">Описание:</p>
                                            <p class="resume-item-desc__text">{{$job['text']}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                    @if(count($jobList) > 1)
                                        <button data-group-btn="show" type="button" class="resume-group-btn">
                                            open
                                        </button>
                                        <button data-group-btn="hide" type="button" class="resume-group-btn hide">
                                            close
                                        </button>
                                     @endif
                                </div>
                            </div>

                        </div>
                    @endif

                    @if($schoolList)
                        <div class="resume-block">
                            <p class="resume-block__title">Образование</p>
                            <div class="resume-block__content">
                                <div data-group class="resume-group display-only-first">
                                    @foreach($schoolList as $school)
                                        <div data-group-item class="resume-item">
                                            <div class="resume-item__top">
                                                <p class="resume-item__title">{{$school['title']}}</p>
                                                <p class="resume-item__period">
                                                    Начало учебы: {{$school['start_date']}}
                                                </p>
                                                <p class="resume-item__period">
                                                    Окончание учебы: {{$school['is_current'] ? ' по настоящее время' : $school['end_date']}}
                                                </p>
                                                <p class="resume-item__option">
                                                    Специальность: {{$school['specialization']}}
                                                </p>
                                            </div>

                                            <div class="resume-item-desc">

                                                <div class="resume-item-desc">
                                                    <p class="resume-item-desc__title">Описание:</p>
                                                    <p class="resume-item-desc__text">{{$job['text']}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    @if(count($schoolList) > 1)
                                    <button data-group-btn="show" type="button" class="resume-group-btn">
                                        open
                                    </button>
                                    <button data-group-btn="hide" type="button" class="resume-group-btn hide">
                                        close
                                    </button>

                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    </div>

                    <div class="resume__data">
                        @if($professionalQualities)
                            <div class="resume-block">

                                <p class="resume-block__title">Профессиональные навыки </p>
                                <ul class="resume-list">
                                @foreach($professionalQualities as $quality)

                                        <li class="resume-list-item">
                                            <span class="resume-list-item__label">{{$quality['title']}}</span>
                                        </li>
                                @endforeach
                                </ul>
                            </div>
                        @endif

                            @if($personalQualities)
                                <div class="resume-block">

                                    <p class="resume-block__title">Личные навыки</p>
                                    <ul class="resume-list">
                                        @foreach($personalQualities as $quality)

                                            <li class="resume-list-item">
                                                <span class="resume-list-item__label">{{$quality['title']}}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if($hobbyList)
                                <div class="resume-block">
                                    <p class="resume-block__title">Хобби</p>
                                    <ul class="resume-list">
                                        @foreach($hobbyList as $hobby)
                                            <li class="resume-list-item">
                                                <span class="resume-list-item__label">{{$hobby['title']}}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
