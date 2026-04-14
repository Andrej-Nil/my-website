@extends('panel.layouts.app')

@section('title', 'Оброзование')

@section('content')
    <h1 class="panel-title">Оброзование</h1>

    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif

    <div class="content">
        <div class="content-top">
            <form action="{{route('panel.schools')}}" method="get" class="search-form">

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
                        <a href="{{route('panel.schools', ['search' => $search])}}" class="sorting__link">По умолчанию</a>
                        <a href="{{route('panel.schools', ['sort' => 'a-up', 'search' => $search])}}" class="sorting__link">От А до Я</a>
                        <a href="{{route('panel.schools', ['sort' => 'z-up', 'search' => $search] )}}" class="sorting__link">От Я до А</a>
                        <a href="{{route('panel.schools', ['sort' => 'new-up', 'search' => $search] )}}" class="sorting__link">Сначало новые</a>
                        <a href="{{route('panel.schools', ['sort' => 'old-up', 'search' => $search] )}}" class="sorting__link">Сначало старые</a>
                    </div>
                </div>
            </div>

            <a href="{{route('panel.schools.create')}}" class="btn btn--yellow">Добавить учреждение</a>
        </div>


        <div data-group data-sortable-list data-api="{{route('school.update.sort')}}" class="list sortable-list">

            <div data-sortable-loader class="sortable-loader">
                <div class="sortable-loader__inner">
                    <p class="sortable-loader__message">Произошла ошибка. Попробуйте еще раз.</p>
                    <button data-loader-close class="btn btn--yellow">Закрыть</button>
                </div>
            </div>
            @forelse($schoolList['data'] as $school)
                <div draggable="true" data-sortable-item="{{$school['id']}}" class="list-item">
                    <span data-display-switcher="{{$school['id']}}" data-api="{{route('school.update.display')}}" class="list-item__btn{{$school['is_display'] ? ' active' : '' }} " title="Редоктировать">
                    <span class="list-item__slash"></span>
                    <img src="{{asset('panel-assets/img/icons/eye.svg')}}"
                         class="list-item__icon list-item__icon--eye"
                         alt="">
                </span>
                    <p class="list-item__title list-item__title--grab">
                        <span class="list-item__name">{{$school['title']}}</span>
                    </p>

                    <a href="{{route('panel.schools.edit', $school['id'])}}" class="list-item__btn" title="Редоктировать">
                        <img src="{{asset('panel-assets/img/icons/edit-icon.svg')}}" class="list-item__icon" alt="">
                    </a>
                    <form action="{{route('panel.schools.delete', $school['id'])}}" method="post" title="Удалить">
                        @csrf
                        @method('DELETE')
                        <button  type="submit" class="list-item__btn">
                            <img src="{{asset('panel-assets/img/icons/delete-icon.svg')}}" class="list-item__icon" alt="">
                        </button>
                    </form>
                </div>
            @empty

                <p class="list__empty">Учереждений не добавлено</p>

            @endforelse

        </div>
        @if(count($schoolList['links']) > 3 )
            @include('panel.components.pagination', ['paginate' => $schoolList])
        @endif
    </div>
@endsection
