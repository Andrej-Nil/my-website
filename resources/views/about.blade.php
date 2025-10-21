@extends('layouts.app')

@section('title', 'Обо мне')

@section('content')
    <div class="container">
        <div class="breadcrumbs">
                <a href="{{route('home')}}" class="breadcrumbs__link">Главная</a>
                <span class="breadcrumbs__slash">/</span>
                <a class="breadcrumbs__link">Обо мне</a>
        </div>



        <div class="content">
            <div class="wrap-with-sidebar">
                <div class="sidebar">
                    <div class="sidebar-nav block">
                        <a href="" class="sidebar-nav__link">Общее</a>
                        <a href="" class="sidebar-nav__link">ссылка 1</a>
                        <a href="" class="sidebar-nav__link">ссылка 2</a>
                        <a href="" class="sidebar-nav__link">ссылка 3</a>
                    </div>
                </div>

                <div class="main">
                    <div class="about">
                        <div class="about__text block">
                            <p class="about__title about__title--right">Здесь будут какойто тайтел</p>
                            <p class="about__вуы">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos dolorem eum facilis magnam reiciendis? Accusamus accusantium ad consectetur distinctio dolorum ea, eligendi et eum illo ipsam, iste magni nam nihil perferendis provident rerum temporibus unde ut voluptatibus voluptatum? Doloremque maxime modi provident rem saepe. Alias aliquid deleniti impedit in inventore, nostrum possimus vero? Aliquam aperiam asperiores consequuntur cumque dicta doloribus eligendi fuga illo laborum minus, nobis odio quisquam rerum sint voluptatum? Alias delectus dolorem eos expedita fuga fugiat fugit hic iste laudantium maxime natus optio, qui soluta unde veniam vero voluptas! Doloribus itaque maiores maxime non officia quia. Accusamus at atque beatae dignissimos fugit id illo magni, nulla optio perspiciatis quae quam quibusdam quidem reiciendis reprehenderit sapiente vel. Accusamus ducimus ea ipsum magni, officia quaerat sapiente sequi tenetur ullam ut vero voluptas. Alias at dolorum excepturi fugit incidunt magnam, maxime minima molestias nemo nisi quam qui quia quo saepe soluta temporibus ullam unde veritatis vero voluptatum. Aliquam animi aut cumque, deserunt dicta eveniet illum iusto labore mollitia placeat porro soluta! Amet aperiam architecto asperiores corporis dicta dignissimos distinctio dolores ducimus earum est eveniet fugit ipsum laborum maiores molestias natus nihil nulla numquam quibusdam quisquam ratione repudiandae sapiente sed similique, unde vitae voluptates voluptatum? Accusamus aliquid at consequatur cumque cupiditate delectus deserunt dicta dolorem ea est, excepturi id impedit ipsam magni minima omnis quam qui quod sed veritatis. A aut consequatur delectus dicta dolorem dolorum enim expedita explicabo fugiat in, incidunt ipsam magni maiores molestias mollitia nam odio odit perferendis possimus praesentium provident quae qui quibusdam quidem reiciendis repellendus sint vel voluptas voluptatem voluptatum! Ab alias amet consequuntur, cum deleniti dignissimos distinctio dolores ea enim eum excepturi exercitationem facilis, fuga fugiat ipsam itaque iusto, libero maiores minima molestiae mollitia non nulla numquam odio pariatur reprehenderit saepe temporibus ullam unde voluptas voluptate.</p>
                        </div>
                        <div class="about__photo block">
                            <img src="{{asset('img/my-photo.jpg')}}" alt="" class="about__img"/>
                        </div>
                    </div>


                    <div class="page-subtitle block">
                        Какой то заголовок
                    </div>



                    @foreach($hobbyList as $hobby)
                        <div class="hobby block mb-60">
                            <div class="hobby__body">
                                <div class="hobby__text">
                                    <p class="hobby__title">{{$hobby['title']}}</p>
                                    <p class="hobby__text">{{$hobby['text']}}</p>
                                </div>
                                <img src="{{$hobby['photo']['url']}}" alt="" class="hobby__img" />

                            </div>



                            @if($hobby['photo_list'])
                            <div class="hobby__photos">

                                @foreach($hobby['img_list'] as $img)
                                    <div class="hobby-photo">
                                        <img src="{{$img['url']}}" alt="" class="hobby-photo__img">
                                    </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    @endforeach




                </div>




            </div>

        </div>
    </div>

@endsection
