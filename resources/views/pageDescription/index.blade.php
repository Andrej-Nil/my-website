@extends('layouts.app')

@section('title', 'Мои увлечения')
@section('bg', 'dark')
@section('content')

<div class="container">
    <div class="breadcrumbs breadcrumbs--white">
        <a href="{{route('home')}}" class="breadcrumbs__link">Главная</a>
        <span class="breadcrumbs__slash">/</span>
        <a class="breadcrumbs__link">Описание сайта</a>
    </div>

    <div class="page-title page-title--white">Описание сайта</h1>
    @if((Auth::check()))
        <div class="admin-links">
            <a href="{{route('panel.pageDescription')}}" class="admin-links__btn btn">Редактировать статьи</a>
{{--            <a href="{{route('panel.pageDescription.edit')}}" class="admin-links__btn btn">Редактировать посты</a>--}}
        </div>
    @endif
        <div class="content">
        <div class="content-with-sidebar">
            <div class="sidebar">
                <p class="sidebar__title">Статьи</p>

            </div>

            <div class="article">
                <h1 class="page-title page-title--white">Описание сайта</h1>
            </div>


        </div>
    </div>
</div>
@endsection
