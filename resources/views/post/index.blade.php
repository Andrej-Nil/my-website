@extends('layouts.app')

@section('title', 'Список постов')

@section('content')
    <div class="container">
        <h1 class="page-title">Посты</h1>

        <div class="grid col-4">
            @foreach($postList as $post)
                @include('post.post-card')
            @endforeach
        </div>

    </div>
@endsection
