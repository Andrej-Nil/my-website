@extends('panel.layouts.app')

@section('title', 'Оброзование')

@section('content')
    <h1 class="panel-title">Оброзование</h1>

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

            {{--            <div>сортировать <a href="">по а до я</a> <a href="">по я до а</a> <a href="">сначло старые</a> <a href="">сначло новые</a></div>--}}

            <a href="{{route('panel.educations.create')}}" class="btn btn--yellow">Добавить место обучения</a>
        </div>


        <div class="list">

            @forelse($educationList as $education)
                <div draggable="true" data-sortable-item="{{$education['id']}}" class="list-item">
                 <span class="list-item__btn without-action" title="Редоктировать">
                    @if(!$education['is_display'])
                         <span class="list-item__slash"></span>
                     @endif

                    <img src="{{asset('panel-assets/img/icons/eye.svg')}}" class="list-item__icon" alt="">
                </span>
                    <p class="list-item__title">
                        <span class="list-item__name">{{$education['title']}}</span>
                    </p>
                    {{--                <a href="" target="_blank" class="list-item__btn" title="Открыть на сайте">--}}
                    {{--                    <img src="{{asset('panel-assets/img/icons/link-icon.svg')}}" class="list-item__icon" alt="" >--}}
                    {{--                </a>--}}


                    <a href="{{route('panel.educations.edit', $education['id'])}}" class="list-item__btn" title="Редоктировать">
                        <img src="{{asset('panel-assets/img/icons/edit-icon.svg')}}" class="list-item__icon" alt="">
                    </a>
                    <form action="{{route('panel.educations.delete', $education['id'])}}" method="post" title="Удалить">
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
