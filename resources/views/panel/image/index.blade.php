@extends('panel.layouts.app')

@section('title', 'Изображения')

@section('content')
    <h1 class="panel-title">Изображение</h1>
    @if(session()->has('success'))
        @include('panel.components.success-board');
    @endif

@if($imageList)
    <div class="image-list">
        @foreach($imageList as $image)
            <div data-image-card class="image-card">
                <img data-zoom data-src="{{asset($image['link'])}}" src="{{$image['url']}}" data-type="img" class="image-card__img" alt=""/>
                <form action="{{route('panel.images.delete', $image['id'])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="image-card__btn image-card__btn--down btn btn--red">Удалить</button>
                </form>
            </div>
        @endforeach
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
@else
    <p class="list__empty">Постов не найдено.</p>
@endif




@endsection
