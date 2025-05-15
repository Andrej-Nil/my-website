@extends('panel.layouts.app')

@section('title', 'Посты')

@section('content')
    <h1 class="panel-title">Хобби</h1>

    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif



    <div class="content">
        <div class="content-top">
            <form action="" method="get" class="search-form">

                <input name="search" class="search-form__input input" placeholder="Поиск по постам" value=""/>
                <button class="search-form__btn">
                    <img src="{{asset('panel-assets/img/icons/search-icon.svg')}}" alt="" class="search-form__icon">
                </button>
            </form>

            <div>сортировать <a href="">по а до я</a> <a href="">по я до а</a> <a href="">сначло старые</a> <a href="">сначло новые</a></div>

            <a href="{{route('panel.hobbies.create')}}" class="btn btn--yellow">Добавить хобби</a>
        </div>


        <div class="list">
            {{--            <div class="list-head">--}}
            {{--                <p class="list-item__title">Название</p>--}}

            {{--                --}}
            {{--            </div>--}}
            @forelse($hobbyList as $hobbyList)
                <div class="list-item">
                    <p class="list-item__title">
                        <span class="list-item__name">{{$hobby['title']}}</span>
                    </p>
                    <a href="{{route('post.show', $hobby['id'])}}" target="_blank" class="list-item__btn" title="Открыть на сайте">
                        <img src="{{asset('panel-assets/img/icons/link-icon.svg')}}" class="list-item__icon" alt="" >
                    </a>
                    <a href="{{route('panel.posts.edit', $hobby['id'])}}" class="list-item__btn" title="Редоктировать">
                        <img src="{{asset('panel-assets/img/icons/edit-icon.svg')}}" class="list-item__icon" alt="">
                    </a>
                    <form action="{{route('panel.posts.delete', $hobby['id'])}}" method="post" title="Удалить">
                        @csrf
                        @method('DELETE')
                        <button  type="submit" class="list-item__btn">
                            <img src="{{asset('panel-assets/img/icons/delete-icon.svg')}}" class="list-item__icon" alt="">
                        </button>
                    </form>
                </div>
            @empty

                <p class="list__empty">Хобби не найдено.</p>

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
