@extends('layouts.app')

@section('title', 'Посты')
@section('bg', 'dark')
@section('content')


    <div class="container container--small">

        <div class="breadcrumbs breadcrumbs--white">
            <a href="{{route('home')}}" class="breadcrumbs__link">Главная</a>
            <span class="breadcrumbs__slash">/</span>
            <a href="{{route('posts')}}" class="breadcrumbs__link">Посты</a>
            <span class="breadcrumbs__slash">/</span>
            <a class="breadcrumbs__link">{{$post['title']}}</a>
        </div>

{{--        @if((Auth::check()))--}}
{{--            <div class="admin-links">--}}
{{--                <a href="{{route('panel.posts.edit', $post['id'])}}" class="admin-links__btn btn">Редактировать пост</a>--}}
{{--            </div>--}}
{{--        @endif--}}

        <div data-post="{{$post['id']}}" class="post">
            <div class="post__top">
                <h1 class="post__title page-title page-title--white">{{$post['title']}}</h1>
                <div class="post-date">
                    <span class="post-date__label">Дата публикации:</span>
                    <span class="post-date__value">{{$post['create_date']}}</span>
                </div>
            </div>
            <div class="post__media">
                @if($post['photo_list_url'])
                    @if(count($post['photo_list_url']) > 1 )

                    @else
                        <img src="{{$post['photo_list_url'][0]}}" alt="{{$post['title']}}" class="post__img">
                    @endif

                @endif
            </div>

            <div class="post__text">
                {{$post['text']}}
            </div>


            <div class="post__bottom">
                <div class="post__reaction">
                    <div class="activity-item">
                        <span data-like class="activity-item__icon reaction pointer {{$reactionUser == 1 ? 'active' : ''}}"></span>
                        <span data-like-count class="activity-item__count">{{$post['likes_count']}}</span>
                    </div>

                    <div class="activity-item">
                        <span data-dislike class="activity-item__icon reaction dislike pointer {{$reactionUser == 2 ? 'active' : ''}}"></span>
                        <span data-dislike-count class="activity-item__count">{{$post['dislikes_count']}}</span>
                    </div>
                </div>

                <div class="activity-item">
                    <img src="{{asset('img/icon/eye.svg')}}" alt="" class="post-activity-item__icon">
                    <span class="activity-item__count">{{$post['viewing_count']}}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
