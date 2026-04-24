@extends('panel.layouts.app')

@section('title', 'Информация о сайте')

@section('content')
    <h1 class="panel-title">Информация о сайте</h1>

    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif

    <div class="content">
        <div class="content-top">
            <form action="{{route('panel.pageDescriptions')}}" method="get" class="search-form">

                <input name="search" class="search-form__input input" placeholder="Поиск по постам" value="{{$search}}"/>
                <button class="search-form__btn">
                    <img src="{{asset('panel-assets/img/icons/search-icon.svg')}}" alt="" class="search-form__icon">
                </button>
            </form>

            <div data-sorting class="sorting">
                <span class="sorting__label">Сортировка</span>

                <div class="sorting__select">
                    <span data-sorting-btn class="sorting__current">{{$currentSortTitle}}</span>
                    <div data-sorting-list class="sorting__list">
                        <a href="{{route('panel.pageDescriptions', ['search' => $search])}}" class="sorting__link">По умолчанию</a>
                        <a href="{{route('panel.pageDescriptions', ['sort' => 'a-up', 'search' => $search])}}" class="sorting__link">От А до Я</a>
                        <a href="{{route('panel.pageDescriptions', ['sort' => 'z-up', 'search' => $search] )}}" class="sorting__link">От Я до А</a>
                        <a href="{{route('panel.pageDescriptions', ['sort' => 'new-up', 'search' => $search] )}}" class="sorting__link">Сначало новые</a>
                        <a href="{{route('panel.pageDescriptions', ['sort' => 'old-up', 'search' => $search] )}}" class="sorting__link">Сначало старые</a>
                    </div>
                </div>
            </div>

            <div class="btn-list">
                <a href="{{route('pageDescriptions')}}" target="_blank"  type="submit" class="btn btn--blue">Ссылка на страницу о сайте</a>
                <a href="{{route('panel.pageDescriptions.create')}}" class="btn btn--yellow">Создать статью</a>
            </div>

        </div>


        <div data-group data-sortable-list data-api="{{route('pageDescriptions.update.sort')}}" class="list sortable-list">
            {{--            <div class="list-head">--}}
            {{--                <p class="list-item__title">Название</p>--}}
            <div data-sortable-loader class="sortable-loader">
                <div class="sortable-loader__inner">
                    <p class="sortable-loader__message">Произошла ошибка. Попробуйте еще раз.</p>
                    <button data-loader-close class="btn btn--yellow">Закрыть</button>
                </div>
            </div>

            @forelse($pageDescriptionList['data'] as $pageDescription)
                <div draggable="true" data-sortable-item="{{$pageDescription['id']}}" class="list-item">
                 <span data-display-switcher="{{$pageDescription['id']}}" data-api="{{route('pageDescriptions.update.display')}}" class="list-item__btn{{$pageDescription['is_display'] ? ' active' : '' }} " title="Скрыть\показать публикацию">
                    <span class="list-item__slash"></span>
                    <img src="{{asset('panel-assets/img/icons/eye.svg')}}"
                         class="list-item__icon list-item__icon--eye"
                         alt="">
                </span>
                    <p class="list-item__title list-item__title--grab">
                        <span class="list-item__name">{{$pageDescription['title']}}</span>
                    </p>

                    <a href="{{route('pageDescriptions.show', $pageDescription['id'])}}" target="_blank" class="list-item__btn" title="Открыть на сайте">
                        <img src="{{asset('panel-assets/img/icons/link-icon.svg')}}" class="list-item__icon" alt="" >
                    </a>


                    <a href="{{route('panel.pageDescriptions.edit', $pageDescription['id'])}}" class="list-item__btn" title="Редактировать">
                        <img src="{{asset('panel-assets/img/icons/edit-icon.svg')}}" class="list-item__icon" alt="">
                    </a>
                    <form action="{{route('panel.pageDescriptions.delete', $pageDescription['id'])}}" method="post" title="Удалить">
                        @csrf
                        @method('DELETE')
                        <button  type="submit" class="list-item__btn">
                            <img src="{{asset('panel-assets/img/icons/delete-icon.svg')}}" class="list-item__icon" alt="">
                        </button>
                    </form>
                </div>
            @empty

                <p class="list__empty">Нет статьей</p>

            @endforelse


        </div>
        @if(count($pageDescriptionList['links']) > 3 )
            @include('panel.components.pagination', ['paginate' => $pageDescriptionList])
        @endif
    </div>
@endsection
