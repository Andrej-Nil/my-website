@extends('layouts.app')

@section('title', 'Обо мне')

@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <a href="{{route('home')}}" class="breadcrumbs__link">Главная</a>
            <span class="breadcrumbs__slash">/</span>
            <a class="breadcrumbs__link">Контакты</a>
        </div>

        <h1 class="page-title">Контакты</h1>


        @if($contactList)
            <div class="contact">
{{--                    @dd($contact)--}}
                <div class="contact-list">
                    @foreach($contactList as $contact)
                    <div class="contact-item">
                        <img src="{{$contact['photo']['url']}}" alt="" class="contact-item__icon">
                        <div class="contact-item__body">
                            <p class="contact-item__label">{{$contact['title']}}</p>
                            <a href="{{$contact['link']}}" class="contact-item__link">{{$contact['display']}}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
{{--            <div class="grid col-4">--}}
{{--                @foreach($postList as $post)--}}
{{--                    @include('post.post-card')--}}
{{--                @endforeach--}}
{{--            </div>--}}
        @else
            <div class="page-message">
                <div class="page-message__inner">
                    <p class="page-message__title">Ничего нет.</p>
                    <img class="page-message__img" src="{{asset('img/icon/box.png')}}" alt="">
                    <p class="page-message__text">Похоже автор еще не добвалил контакты.</p>
                </div>
            </div>
        @endif

    </div>
@endsection
