@extends('panel.layouts.app')

@section('title', 'Примеры работ')

@section('content')
    <h1 class="panel-title">Работы</h1>

    @if(session()->has('success'))
        @include('panel.components.success-board')
    @endif



    <div class="content">
        <div class="content-top">
{{--            <form action="{{route('panel.posts.search')}}" method="get" class="search-form">--}}

{{--                <input name="search" class="search-form__input input" placeholder="Поиск по постам" value="{{$search ?? ''}}"/>--}}
{{--                <button class="search-form__btn">--}}
{{--                    <img src="{{asset('panel-assets/img/icons/search-icon.svg')}}" alt="" class="search-form__icon">--}}
{{--                </button>--}}
{{--            </form>--}}

           <div>сортировать <a href="">по а до я</a> <a href="">по я до а</a> <a href="">сначло старые</a> <a href="">сначло новые</a></div>

            <a href="{{route('panel.jobs.create')}}" class="btn btn--yellow">Создать работу</a>
        </div>


        <div data-group data-sortable-list data-api="{{route('jobPlace.update.sort')}}" class="list sortable-list">
{{--            <div class="list-head">--}}
{{--                <p class="list-item__title">Название</p>--}}
                <div data-sortable-loader class="sortable-loader">
                    <div class="sortable-loader__inner">
                        <p class="sortable-loader__message">Произошла ошибка. Попробуйте еще раз.</p>
                        <button data-loader-close class="btn btn--yellow">Закрыть</button>
                    </div>

                </div>

{{--            </div>--}}
            @forelse($jobList as $job)
            <div draggable="true" data-sortable-item="{{$job['id']}}" class="list-item">
                 <span class="list-item__btn without-action" title="Редоктировать">
                    @if(!$job['is_display'])
                         <span class="list-item__slash"></span>
                     @endif

                    <img src="{{asset('panel-assets/img/icons/eye.svg')}}" class="list-item__icon" alt="">
                </span>
                <p class="list-item__title">
                    <span class="list-item__name">{{$job['title']}}</span>
                </p>
{{--                <a href="" target="_blank" class="list-item__btn" title="Открыть на сайте">--}}
{{--                    <img src="{{asset('panel-assets/img/icons/link-icon.svg')}}" class="list-item__icon" alt="" >--}}
{{--                </a>--}}


                <a href="{{route('panel.jobs.edit', $job['id'])}}" class="list-item__btn" title="Редоктировать">
                    <img src="{{asset('panel-assets/img/icons/edit-icon.svg')}}" class="list-item__icon" alt="">
                </a>
                <form action="{{route('panel.jobs.delete', $job['id'])}}" method="post" title="Удалить">
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



{{--    </div>--}}
{{--        <div class="list__pagination">--}}
{{--            <div class="pagination">--}}
{{--                <a href="" class="pagination-item active">1</a>--}}
{{--                <a href="" class="pagination-item">2</a>--}}
{{--                <a href="" class="pagination-item">3</a>--}}
{{--                <a href="" class="pagination-item">4</a>--}}
{{--                <a href="" class="pagination-item">5</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        </div>--}}
    </div>
@endsection
