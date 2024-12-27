@extends('panel.layouts.app')

@section('title', 'Изображения')

@section('content')
    <h1 class="panel-title">Изображение</h1>
    @if(session()->has('success'))
        @include('panel.components.success-board');
    @endif
{{--    @if($errors->any())--}}
{{--        @include('panel.components.error-board', ['message'=>'Ошибка сохранения формы.'])--}}
{{--    @endif--}}


@endsection
