@extends('layouts.app')

@section('title', 'Пост' . $post['title'])

@section('content')
    <div class="container">
        <h1 class="page-title">{{$post['title']}}</h1>
        <div class="breadcrumbs">
            <a href="{{route('home')}}" class="breadcrumbs__link">Главная</a>
            <span class="breadcrumbs__slash">/</span>
            <a href="{{route('post.index')}}" class="breadcrumbs__link">Посты</a>
            <span class="breadcrumbs__slash">/</span>
            <a class="breadcrumbs__link">{{$post['title']}}</a>
        </div>
    </div>
@endsection
