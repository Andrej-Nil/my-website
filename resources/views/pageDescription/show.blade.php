@extends('layouts.app')

@section('title', 'Описание сайта')
@section('bg', 'dark')
@section('content')

    <div class="container container--middle">
        <div class="breadcrumbs breadcrumbs--white">
            <a href="{{route('home')}}" class="breadcrumbs__link">Главная</a>
            <span class="breadcrumbs__slash">/</span>
            <a href="{{route('panel.pageDescriptions')}}" class="breadcrumbs__link">Описание сайта</a>
            <span class="breadcrumbs__slash">/</span>
            <a class="breadcrumbs__link">{{$pageDescription['title']}}</a>
        </div>

        <div class="page-title page-title--white">Описание сайта</div>
        @if((Auth::check()))
            <div class="admin-links">
                <a href="{{route('panel.pageDescriptions.edit', $pageDescription['id'])}}" class="admin-links__btn btn">Редактировать статью</a>
            </div>
        @endif
        <div class="content">
            <div class="content-with-sidebar">
                <div class="sidebar">
                    <p class="sidebar__title">Статьи</p>
                    <div class="sidebar-nav">
                        @foreach($pageDescriptionList as $item)
                         <a href="{{route('pageDescriptions.show', $item['id'])}}" class="sidebar-nav__link {{$pageDescription['id'] === $item['id'] ? 'active' : ''}}">{{$item['title']}}</a>
                        @endforeach
                    </div>
                </div>


                <div class="article">
                    <h1 class="article__title">{{$pageDescription['title']}}</h1>
                    <img class="article__img" src="{{$pageDescription['photo_url']}}" alt="{{$pageDescription['title']}}">
                    <div class="article__text">{{$pageDescription['text']}}</div>
                </div>

            </div>
        </div>
    </div>
@endsection
