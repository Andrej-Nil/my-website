@extends('panel.layouts.app')

@section('title', 'Посты')

@section('content')
    <h1 class="panel-title">Хобби</h1>

    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif



    <div class="content">
        <div class="content-top">
            <form action="{{route('panel.hobbies')}}" method="get" class="search-form">

                <input name="search" class="search-form__input input" placeholder="Поиск по постам" value="{{$search}}"/>
                <button class="search-form__btn">
                    <img src="{{asset('panel-assets/img/icons/search-icon.svg')}}" alt="" class="search-form__icon">
                </button>
            </form>

            <div data-sorting class="sorting">
                <span class="sorting__label">Сортировка</span>

                <div class="sorting__select">
{{--                    <span data-sorting-btn class="sorting__current">{{$currentSortTitle}}</span>--}}
                    <span data-sorting-btn class="sorting__current">От А до Я</span>
                    <div data-sorting-list class="sorting__list">
                        <a href="{{route('panel.hobbies', ['sort' => 'a-up', 'search' => $search])}}" class="sorting__link">От А до Я</a>
                        <a href="{{route('panel.hobbies', ['sort' => 'z-up', 'search' => $search] )}}" class="sorting__link">От Я до А</a>
                        <a href="{{route('panel.hobbies', ['sort' => 'new-up', 'search' => $search] )}}" class="sorting__link">Сначало новые</a>
                        <a href="{{route('panel.hobbies', ['sort' => 'old-up', 'search' => $search] )}}" class="sorting__link">Сначало старые</a>
                    </div>
                </div>
            </div>
            <a href="{{route('panel.hobbies.create')}}" class="btn btn--yellow">Добавить хобби</a>
        </div>


        <div class="list">
            {{--            <div class="list-head">--}}
            {{--                <p class="list-item__title">Название</p>--}}

            {{--                --}}
            {{--            </div>--}}
            @forelse($hobbyList['data'] as $hobby)
                <div class="list-item">
                    <p class="list-item__title">
                        <span class="list-item__name">{{$hobby['title']}}</span>
                    </p>
{{--                    <a href="{{route('post.show', $hobby['id'])}}" target="_blank" class="list-item__btn" title="Открыть на сайте">--}}
{{--                        <img src="{{asset('panel-assets/img/icons/link-icon.svg')}}" class="list-item__icon" alt="" >--}}
{{--                    </a>--}}
                    <a href="{{route('panel.hobbies.edit', $hobby['id'])}}" class="list-item__btn" title="Редоктировать">
                        <img src="{{asset('panel-assets/img/icons/edit-icon.svg')}}" class="list-item__icon" alt="">
                    </a>
                    <form action="{{route('panel.hobbies.delete', $hobby['id'])}}" method="post" title="Удалить">
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
        @if(count($hobbyList['links']) > 3 )
            @include('panel.components.pagination', ['paginate' => $hobbyList])
        @endif
    </div>
@endsection
