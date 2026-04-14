@extends('layouts.app')

@section('title', 'Полтфолио: ')
@section('bg', 'dark')
@section('content')
    <div class="container">
        <div class="content">

            <div class="breadcrumbs breadcrumbs--white">
                <a href="{{route('home')}}" class="breadcrumbs__link">Главная</a>
                <span class="breadcrumbs__slash">/</span>
                <a href="{{route('portfolios')}}" class="breadcrumbs__link">Портфолио</a>
                <span class="breadcrumbs__slash">/</span>
                <a class="breadcrumbs__link breadcrumbs__link--white">{{$portfolio['title']}}</a>
            </div>

            <div class="portfolio-page">
                <div class="portfolio-page__content">
                    <h1 class="page-title page-title--white">{{$portfolio['title']}}</h1>
                    <p class="portfolio-page__text">{{$portfolio['text']}}</p>
                    <div class="portfolio-page__bottom">
                        <a href="https://www.google.com" target="_blank" class="portfolio-page__btn btn">Ссылка на работу</a>
                    </div>
                </div>
                <img src="{{$portfolio['photo_url']}}" class="portfolio-page__img" alt="{{$portfolio['title']}}"/>
            </div>
        </div>
    </div>
@endsection
