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
                    <div class="post-card">
                        <a class="post-card__link" href="{{route('posts.show', $post['id'])}}">
{{--                            <div class="post-card__content">--}}
                                <img src="{{$post['photo_list_url'][0]}}" alt="{{$post['title']}}" class="post-card__img">

                                <p class="post-card__title">
                                    {{$post['title']}}
                                </p>

{{--                            </div>--}}
                        </a>
                    </div>
                @endforeach

            </div>
        @endif
        <div class="pagination">

        </div>

    </div>
@endsection

