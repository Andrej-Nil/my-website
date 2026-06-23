@extends('layouts.app')

@section('title', 'Мои увлечения')
@section('bg', 'dark')
@section('content')

        <div id="hobbyPage" class="hobby-page">
            @if((Auth::check()))
                <div class="admin-links admin-links--absolute">
                    <a href="{{route('panel.hobbies')}}" class="admin-links__btn btn">Редактировать хобби</a>
                </div>
            @endif
            <div class="hobby-page__content">

                @foreach($hobbyList as $key => $hobby)
                <div data-hobby-tab="{{$key}}" class="hobby-item hide">
                    <div class="hobby-item__inner container">
                        @if($hobby['main_photo_url'])
                            <img src="{{$hobby['main_photo_url']}}" alt="" class="hobby-item__image">
                        @endif
                        <div class="hobby-item__desc">
                            <p class="hobby-item__title">{{$hobby['title']}}</p>
                            <p class="hobby-item__text"> {{$hobby['text']}}</p>
                            @if($hobby['photo_list_url'])
                                <div data-gallery class="hobby-item__gallery">
                                    @foreach($hobby['photo_list_url'] as $photoUrl)
                                    <img data-gallery-item="img" data-url="{{$photoUrl}}" src="{{$photoUrl}}" alt="" class="hobby-item__photo">
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    @if($hobby['bg_photo_url'])
                        <img src="{{$hobby['bg_photo_url']}}" alt="" class="hobby-item__bg">
                    @endif
                </div>
                @endforeach

            </div>
                @if(count($hobbyList))
                <div id="hobbyNav" class="hobby-nav">
                    <div data-hobby-nav-close class="hobby-nav__substrate"></div>
                    <div class="hobby-nav__list">
                        <span data-hobby-nav-close class="hobby-nav__close"></span>
                        @foreach($hobbyList as $key => $hobby)
                            <div data-hobby-dot="{{$key}}" class="hobby-nav-item">
                                @if($hobby['bg_photo_url'])
                                    <img src="{{$hobby['mini_photo_url']}}" alt="" class="hobby-nav-item__img"/>
                                @else
                                    <img src="{{asset('img/thumbnail.webp')}}" alt="" class="hobby-nav-item__img"/>
                                @endif
                                <p class="hobby-nav-item__title">{{$hobby['title']}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

            <div data-hobby-nav-open class="hobby-btn">Все хобби</div>
        </div>
@endsection
