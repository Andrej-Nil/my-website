@extends('layouts.app')

@section('title', 'Decs')

@section('content')

    <div class="container">
        <div class="breadcrumbs">
            <a href="{{route('home')}}" class="breadcrumbs__link">Главная</a>
            <span class="breadcrumbs__slash">/</span>
            <a class="breadcrumbs__link">Decs</a>
        </div>



        <h1 class="page-title">Decs</h1>

        <div class="resume">


            <div class="resume__top">
                <div class="badge">
                    <img src="{{asset('img/my-photo.jpg')}}" alt="" class="badge__photo">
                    <div class="badge__body">
                        <p class="badge__name">Kfgsdjhds Ksdkjfdsb Rsdbgdfh</p>
                        <p class="badge__data">Kfgsdjhds Ksdkjfdsb 19.11.3464h(64 kjh)</p>
                        <p class="badge__post">Fdshfdshf-sdfdshf</p>
                    </div>
                </div>
            </div>

            <div class="resume__body">
                <div class="resume__main">

                    <div class="resume-block">
                        <p class="resume-block__title">Gdkjfsdjf</p>
                        <div class="resume-block__content">
                            <div data-group class="resume-group display-only-first">
                                @foreach($jobList as $job)
                                <div data-group-item class="resume-group-item">
                                    <div class="resume-group-item__top">
                                        <p class="resume-group-item__title">{{$job['title']}}</p>
                                        <p class="resume-group-item__period">
                                            {{$job['start']}} gj {{$job['is_current_job'] ? 'настоящее время' : $job['end']}}</p>
                                        <p class="resume-group-item__option">{{$job['profession']}}</p>
                                    </div>

                                    <div class="resume-group-item__desc">
                                        {{$job['text']}}
                                    </div>
                                </div>
                                @endforeach
                                <button data-group-btn="show" type="button" class="resume-group-btn">
                                    open
                                </button>
                                <button data-group-btn="hide" type="button" class="resume-group-btn hide">
                                    close
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="resume-block">
                        <p class="resume-block__title">Ggdjf</p>
                        <div class="resume-block__content">
                            <div data-group class="resume-group display-only-first">
                                @foreach($educationList as $education)
                                    <div data-group-item class="resume-group-item">
                                        <div class="resume-group-item__top">
                                            <p class="resume-group-item__title">{{$education['title']}}</p>
                                            <p class="resume-group-item__period">
                                                {{$education['start']}} gj {{$education['is_current_day'] ? 'настоящее время' : $education['end']}}</p>
                                            <p class="resume-group-item__option">{{$education['specialization']}}</p>
                                        </div>

                                        <div class="resume-group-item__desc">
                                            {{$education['text']}}
                                        </div>
                                    </div>
                                @endforeach
                                <button data-group-btn="show" type="button" class="resume-group-btn">
                                    open
                                </button>
                                <button data-group-btn="hide" type="button" class="resume-group-btn hide">
                                    close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="resume__data">
                    <div class="resume-block">

                        <p class="resume-block__title">Gdkjfsdjf</p>

                        <ul class="resume-list">
                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>

                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>

                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>

                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>

                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>
                        </ul>
                    </div>

                    <div class="resume-block">

                        <p class="resume-block__title">Gdkjfsdjf</p>

                        <ul class="resume-list">
                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>

                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>

                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>

                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>

                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>
                        </ul>
                    </div>

                    <div class="resume-block">

                        <p class="resume-block__title">Gdkjfsdjf</p>

                        <ul class="resume-list">
                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>

                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>

                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>

                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>

                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>
                        </ul>
                    </div>

                    <div class="resume-block">

                        <p class="resume-block__title">Gdkjfsdjf</p>

                        <ul class="resume-list">
                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>

                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>

                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>

                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>

                            <li class="resume-list-item">
                                <span class="resume-list-item__label">Название Название:</span>
                                <span class="resume-list-item__value">Значение</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
