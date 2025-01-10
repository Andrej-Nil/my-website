@extends('layouts.app')

@section('title', 'Список постов')

@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <a href="{{route('home')}}" class="breadcrumbs__link">Главная</a>
            <span class="breadcrumbs__slash">/</span>
            <a class="breadcrumbs__link">Посты</a>
        </div>

        <h1 class="page-title">Посты</h1>


        @if($postList)
        <div class="grid col-4">
            @foreach($postList as $post)
                @include('post.post-card')
            @endforeach
        </div>
        @else
            <div class="page-message">
                <div class="page-message__inner">
                    <p class="page-message__title">Ничего нет.</p>
                    <img class="page-message__img" src="{{asset('img/icon/box.png')}}" alt="">
                    <p class="page-message__text">Похоже автор еще не добвалил постов.</p>
                </div>
            </div>
        @endif

    </div>
@endsection
