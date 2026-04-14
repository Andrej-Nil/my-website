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

        <h1 class="page-title page-title--white">{{$post['title']}}</h1>

        <div class="post">

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

            </div>

        </div>

    </div>
@endsection
