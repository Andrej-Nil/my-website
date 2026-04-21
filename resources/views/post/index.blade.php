@extends('layouts.app')

@section('title', 'Посты')
@section('bg', 'dark')
@section('content')
    <div class="container">

        <div class="breadcrumbs breadcrumbs--white">
            <a href="{{route('home')}}" class="breadcrumbs__link">Главная</a>
            <span class="breadcrumbs__slash">/</span>
            <a class="breadcrumbs__link">Посты</a>
        </div>

        <h1 class="page-title page-title--white">Посты</h1>
        @if((Auth::check()))
            <div class="admin-links">
                <a href="{{route('panel.posts')}}" class="admin-links__btn btn">Редактировать посты</a>
            </div>
        @endif
        @if($postList['data'])
            <div class="grid col-4">
                @foreach($postList['data'] as $post)
                    <div data-post="{{$post['id']}}" class="post-card">
                        <div class="post-card__content">
                        <a class="post-card__link" href="{{route('posts.show', $post['id'])}}">
                            <img src="{{$post['photo_list_url'][0]}}" alt="{{$post['title']}}" class="post-card__img">
                            <p class="post-card__title">
                                {{$post['title']}}
                            </p>
                        </a>

                            <div class="post-card__bottom">
                                <div class="post-card__reaction">
                                    <div class="activity-item">
                                        <span data-like class="activity-item__icon reaction pointer {{$post['user_reaction'] == 1 ? 'active' : ''}}"></span>
                                        <span data-like-count class="activity-item__count">{{$post['likes_count']}}</span>
                                    </div>

                                    <div class="post-activity-item">
                                        <span data-dislike class="activity-item__icon reaction dislike pointer {{$post['user_reaction'] == 2 ? 'active' : ''}}"></span>
                                        <span data-dislike-count class="activity-item__count">{{$post['dislikes_count']}}</span>
                                    </div>
                                </div>

                                <div class="post-activity-item">
                                    <img src="{{asset('img/icon/eye.svg')}}" alt="" class="activity-item__icon">
                                    <span class="activity-item__count">{{$post['viewing_count']}}</span>
                                </div>
                            </div>

                            </div>

                    </div>
                @endforeach

            </div>
        @endif
        <div class="pagination">

        </div>

    </div>
@endsection

