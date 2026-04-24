@extends('layouts.app')

@section('title', 'Описание сайта')
@section('bg', 'dark')
@section('content')

<div class="container container--middle">
    <div class="breadcrumbs breadcrumbs--white">
        <a href="{{route('home')}}" class="breadcrumbs__link">Главная</a>
        <span class="breadcrumbs__slash">/</span>
        <a class="breadcrumbs__link">Описание сайта</a>
    </div>

    <div class="page-title page-title--white">Описание сайта</div>
    @if((Auth::check()))
        <div class="admin-links">
{{--            <a href="{{route('panel.pageDescription')}}" class="admin-links__btn btn">Редактировать статьи</a>--}}
{{--            <a href="{{route('panel.pageDescription.edit')}}" class="admin-links__btn btn">Редактировать посты</a>--}}
        </div>
    @endif
        <div class="content">
        <div class="content-with-sidebar">
            <div class="sidebar">
                <p class="sidebar__title">Статьи</p>

               @if($pageDescriptionList)
                <div class="sidebar-nav">
                    @foreach($pageDescriptionList as $item)
                        <a href="{{route('pageDescriptions.show', $item['id'])}}" class="sidebar-nav__link">{{$item['title']}}</a>
                    @endforeach

                </div>
                @else

                   Пока нет статьей
                @endif
            </div>

            <div class="article">
                <h1 class="article__title">Описание сайта</h1>
                <div class="article__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aperiam blanditiis dicta eos error exercitationem, expedita id labore, necessitatibus nisi officia perspiciatis quae ratione rem sequi? Accusantium adipisci consequuntur delectus eligendi enim eum ex, exercitationem labore maxime molestiae perferendis quaerat quasi quis, quos sint. Autem consectetur cupiditate delectus deleniti, dignissimos ducimus error excepturi facilis, nemo non praesentium quasi quia similique soluta suscipit tempora temporibus velit. Ab accusantium architecto at atque aut commodi cupiditate deleniti distinctio doloribus dolorum earum eius error exercitationem fuga in incidunt libero minima molestias mollitia natus necessitatibus nemo nesciunt, nisi nostrum numquam possimus provident quae quas ratione rem, reprehenderit repudiandae rerum similique sint sit tempore veritatis! Ad amet animi asperiores beatae consequatur consequuntur dicta dolore ea eaque earum eligendi eum facilis illum inventore labore numquam officia perspiciatis possimus quaerat quam ratione tempore tenetur ut, velit voluptas? A beatae inventore nam nisi, pariatur similique soluta unde vero? Ab aut consequatur consequuntur culpa debitis doloremque ducimus, error excepturi hic impedit molestias nisi non nulla numquam officia omnis, quae, qui quos reiciendis repudiandae sint totam unde vero. Cum deserunt enim explicabo harum id magnam minus nam nesciunt nobis, placeat, quia saepe suscipit. Alias exercitationem explicabo facilis in itaque nihil obcaecati.</div>
            </div>

        </div>
    </div>
</div>
@endsection
