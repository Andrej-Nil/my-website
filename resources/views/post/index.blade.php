@extends('layouts.app')

@section('title', 'Список постов')

@section('content')
    <div class="container">
        <h1 class="page-title">Посты flvbyrf</h1>

        <div class="grid col-4">
            @include('post.post-card')
            @include('post.post-card')
            @include('post.post-card')
            @include('post.post-card')
        </div>

    </div>
@endsection
