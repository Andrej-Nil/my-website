@extends('layouts.app')

@section('title', 'Пост' . $post['title'])

@section('content')
    <div class="container">

        <div class="breadcrumbs">
            <a href="{{route('home')}}" class="breadcrumbs__link">Главная</a>
            <span class="breadcrumbs__slash">/</span>
            <a href="{{route('post.index')}}" class="breadcrumbs__link">Посты</a>
            <span class="breadcrumbs__slash">/</span>
            <a class="breadcrumbs__link">{{$post['title']}}</a>
        </div>


        <div class="post">
            <h1 class="post__title">{{$post['title']}}</h1>
            <div class="post-image">
                <img class="post-image__img" src="{{$post['photo']['url']}}" alt="">

                <div class="post-image-btn">
                    <span class="post-image-btn__shadow"></span>
                    <div class="post-image-btn__text">Раскрыть изображение</div>
                </div>


            </div>

            <p class="post__text">{{$post['text']}}</p>

        </div>



    </div>
@endsection
