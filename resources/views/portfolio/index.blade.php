@extends('layouts.app')

@section('title', 'Полтфолио')
@section('bg', 'dark')
@section('content')
    <div class="container">
{{--        <div class="top-page top-page--center">--}}
{{--            <h1 class="page-title page-title--white">Decs</h1>--}}
{{--        </div>--}}

        <div class="breadcrumbs breadcrumbs--white">
            <a href="{{route('home')}}" class="breadcrumbs__link">Главная</a>
            <span class="breadcrumbs__slash">/</span>
            <a class="breadcrumbs__link">Портфолио</a>
        </div>

        <h1 class="page-title page-title--white">Портфолио</h1>

            <div class="portfolio">
                @if($portfolioList['data'])
                <div class="portfolio__list">
                    @foreach($portfolioList['data'] as $portfolio)
                        <div class="portfolio-card">
                            <div class="portfolio-card__inner">
                                <img src="{{$portfolio['photo_url']}}" alt="{{$portfolio['title']}}" class="portfolio-card__img">

                                <div class="portfolio-card__content">
                                    <p class="portfolio-card__title">{{$portfolio['title']}}</p>
                                    <p class="portfolio-card__text">{{$portfolio['text_short']}}</p>
                                    <div class="portfolio-card__bottom">
                                        <a href="{{route('portfolio.show', $portfolio['id'])}}" class="portfolio-card__btn btn">Подробнее</a>
                                        <a href="{{$portfolio['link']}}" target="_blank" class="portfolio-card__btn btn">Ссылка</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
                @else
                <p class="portfolio__message">
                    Нет пример работ
                </p>
                @endif
            </div>

        <div class="pagination">

        </div>

    </div>
@endsection



