@extends('panel.layouts.app')

@section('title', 'Посты')

@section('content')
    <h1 class="panel-title">Посты</h1>

    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif



    <div class="content">
        <div class="content-top">
            <form action="{{route('panel.posts.search')}}" method="get" class="search-form">

                <input name="search" class="search-form__input input" placeholder="Поиск по постам" value="{{$search ?? ''}}"/>
                <button class="search-form__btn">
                    <img src="{{asset('panel-assets/img/icons/search-icon.svg')}}" alt="" class="search-form__icon">
                </button>
            </form>

           <div>сортировать <a href="">по а до я</a> <a href="">по я до а</a> <a href="">сначло старые</a> <a href="">сначло новые</a></div>

            <a href="{{route('panel.posts.create')}}" class="btn btn--yellow">Создать пост</a>
        </div>


        <div class="list">
{{--            <div class="list-head">--}}
{{--                <p class="list-item__title">Название</p>--}}

{{--                --}}
{{--            </div>--}}
            @forelse($postList as $post)
            <div class="list-item">
                <p class="list-item__title">
                    <span class="list-item__name">{{$post['title']}}</span>
                </p>
                <a href="{{route('post.show', $post['id'])}}" target="_blank" class="list-item__btn" title="Открыть на сайте">
                    <img src="{{asset('panel-assets/img/icons/link-icon.svg')}}" class="list-item__icon" alt="" >
                </a>
                <a href="{{route('panel.posts.edit', $post['id'])}}" class="list-item__btn" title="Редоктировать">
                    <img src="{{asset('panel-assets/img/icons/edit-icon.svg')}}" class="list-item__icon" alt="">
                </a>
                <form action="{{route('panel.posts.delete', $post['id'])}}" method="post" title="Удалить">
                    @csrf
                    @method('DELETE')
                    <button  type="submit" class="list-item__btn">
                        <img src="{{asset('panel-assets/img/icons/delete-icon.svg')}}" class="list-item__icon" alt="">
                    </button>
                </form>
            </div>
            @empty

             <p class="list__empty">Постов не найдено.</p>

            @endforelse



    </div>
        <div class="list__pagination">
            <div class="pagination">
                <a href="" class="pagination-item active">1</a>
                <a href="" class="pagination-item">2</a>
                <a href="" class="pagination-item">3</a>
                <a href="" class="pagination-item">4</a>
                <a href="" class="pagination-item">5</a>
            </div>
        </div>
        </div>
    </div>
@endsection
