@extends('panel.layouts.app')

@section('title', 'Посты')

@section('content')
    <h1 class="panel-title">Посты</h1>

    <div class="content">
        <div class="content-top">
            <form action="" method="get" class="search-form">
                @csrf
                <input name="value" class="search-form__input input" placeholder="Поиск по постам"/>
                <button class="search-form__btn">
                    <img src="{{asset('panel-assets/img/icons/search-icon.svg')}}" alt="" class="search-form__icon">
                </button>
            </form>


            <a href="{{route('panel.posts.create')}}" class="btn btn--yellow">Создать пост</a>
        </div>


        <div class="list">
{{--            <div class="list-head">--}}
{{--                <p class="list-item__title">Название</p>--}}

{{--                --}}
{{--            </div>--}}

            <div class="list-item">
                <p class="list-item__title">
                    <span class="list-item__name">Пост 1</span>

                </p>
                <a href="" target="_blank" class="list-item__btn" title="Открыть на сайте">
                    <img src="{{asset('panel-assets/img/icons/link-icon.svg')}}" class="list-item__icon" alt="" >
                </a>
                <a href="" class="list-item__btn" title="Редоктировать">
                    <img src="{{asset('panel-assets/img/icons/edit-icon.svg')}}" class="list-item__icon" alt="">
                </a>
                <form action="" method="post" title="Удалить">
                    @csrf
                    @method('DELETE')
                    <button  type="submit" class="list-item__btn">
                        <img src="{{asset('panel-assets/img/icons/delete-icon.svg')}}" class="list-item__icon" alt="">
                    </button>
                </form>
                </div>

            <div class="list-item">
                <p class="list-item__title">
                    <span class="list-item__name">Пост 1</span>

                </p>
                <a href="" target="_blank" class="list-item__btn" title="Открыть на сайте">
                    <img src="{{asset('panel-assets/img/icons/link-icon.svg')}}" class="list-item__icon" alt="" >
                </a>
                <a href="" class="list-item__btn" title="Редоктировать">
                    <img src="{{asset('panel-assets/img/icons/edit-icon.svg')}}" class="list-item__icon" alt="">
                </a>
                <form action="" method="post" title="Удалить">
                    @csrf
                    @method('DELETE')
                    <button  type="submit" class="list-item__btn">
                        <img src="{{asset('panel-assets/img/icons/delete-icon.svg')}}" class="list-item__icon" alt="">
                    </button>
                </form>
            </div>

            <div class="list-item">
                <p class="list-item__title">
                    <span class="list-item__name">Пост 1</span>

                </p>
                <a href="" target="_blank" class="list-item__btn" title="Открыть на сайте">
                    <img src="{{asset('panel-assets/img/icons/link-icon.svg')}}" class="list-item__icon" alt="" >
                </a>
                <a href="" class="list-item__btn" title="Редоктировать">
                    <img src="{{asset('panel-assets/img/icons/edit-icon.svg')}}" class="list-item__icon" alt="">
                </a>
                <form action="" method="post" title="Удалить">
                    @csrf
                    @method('DELETE')
                    <button  type="submit" class="list-item__btn">
                        <img src="{{asset('panel-assets/img/icons/delete-icon.svg')}}" class="list-item__icon" alt="">
                    </button>
                </form>
            </div>

            <div class="list-item">
                <p class="list-item__title">
                    <span class="list-item__name">Пост 1</span>

                </p>
                <a href="" target="_blank" class="list-item__btn" title="Открыть на сайте">
                    <img src="{{asset('panel-assets/img/icons/link-icon.svg')}}" class="list-item__icon" alt="" >
                </a>
                <a href="" class="list-item__btn" title="Редоктировать">
                    <img src="{{asset('panel-assets/img/icons/edit-icon.svg')}}" class="list-item__icon" alt="">
                </a>
                <form action="" method="post" title="Удалить">
                    @csrf
                    @method('DELETE')
                    <button  type="submit" class="list-item__btn">
                        <img src="{{asset('panel-assets/img/icons/delete-icon.svg')}}" class="list-item__icon" alt="">
                    </button>
                </form>
            </div>

            <div class="list-item">
                <p class="list-item__title">
                    <span class="list-item__name">Пост 1</span>

                </p>
                <a href="" target="_blank" class="list-item__btn" title="Открыть на сайте">
                    <img src="{{asset('panel-assets/img/icons/link-icon.svg')}}" class="list-item__icon" alt="" >
                </a>
                <a href="" class="list-item__btn" title="Редоктировать">
                    <img src="{{asset('panel-assets/img/icons/edit-icon.svg')}}" class="list-item__icon" alt="">
                </a>
                <form action="" method="post" title="Удалить">
                    @csrf
                    @method('DELETE')
                    <button  type="submit" class="list-item__btn">
                        <img src="{{asset('panel-assets/img/icons/delete-icon.svg')}}" class="list-item__icon" alt="">
                    </button>
                </form>
            </div>

            <div class="list-item">
                <p class="list-item__title">
                    <span class="list-item__name">Пост 1</span>

                </p>
                <a href="" target="_blank" class="list-item__btn" title="Открыть на сайте">
                    <img src="{{asset('panel-assets/img/icons/link-icon.svg')}}" class="list-item__icon" alt="" >
                </a>
                <a href="" class="list-item__btn" title="Редоктировать">
                    <img src="{{asset('panel-assets/img/icons/edit-icon.svg')}}" class="list-item__icon" alt="">
                </a>
                <form action="" method="post" title="Удалить">
                    @csrf
                    @method('DELETE')
                    <button  type="submit" class="list-item__btn">
                        <img src="{{asset('panel-assets/img/icons/delete-icon.svg')}}" class="list-item__icon" alt="">
                    </button>
                </form>
            </div>



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
