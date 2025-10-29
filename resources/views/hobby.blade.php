@extends('layouts.app')

@section('title', 'Мои увлечения')
@section('bg', 'dark')
@section('content')




        <div class="hobby-page">
            <div class="hobby-page__content">
                <div class="hobby-item container">
                 <img src="{{asset('img/image/hobby-1.png')}}" alt="" class="hobby-item__image">
                <div class="hobby-item__desc">
                    <p class="hobby-item__title">Rfrjq nj ntrcn</p>
                    <p class="hobby-item__text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid commodi facere illo obcaecati. A amet architecto consequatur cum, dolores esse expedita id inventore ipsa libero molestias odio porro quae quam quo veritatis voluptatem voluptates? Consequatur est eveniet nesciunt perspiciatis quod reiciendis sed ullam voluptas voluptatibus. Consequatur laboriosam laudantium porro qui suscipit. Consectetur inventore necessitatibus optio quasi ratione reiciendis voluptas! Atque, consequuntur, dolorem eos et facilis harum maxime molestiae nesciunt placeat possimus ratione suscipit tempora, tenetur totam ullam! Adipisci asperiores, at, beatae consequatur cupiditate dolore doloribus eius excepturi expedita fugit in incidunt minus nemo neque nesciunt officiis placeat quae recusandae repudiandae.
                    </p>
                    <div data-gallery class="hobby-item__gallery">
                        <img data-gallery-item="img" data-url="https://i.pinimg.com/236x/29/3a/c7/293ac7ab9528e7d40299eb5b30de089c.jpg?nii=t" src="https://i.pinimg.com/236x/29/3a/c7/293ac7ab9528e7d40299eb5b30de089c.jpg?nii=t" alt="" class="hobby-item__photo">
                        <img data-gallery-item="img" data-url="https://i.pinimg.com/originals/5d/e2/42/5de24294bad21ec99931f4c362354f22.jpg" src="https://i.pinimg.com/originals/5d/e2/42/5de24294bad21ec99931f4c362354f22.jpg" alt="" class="hobby-item__photo">
                        <img data-gallery-item="img" data-url="https://i.pinimg.com/originals/0a/32/53/0a32539a7e667da3e86b0e36b175337e.jpg" src="https://i.pinimg.com/originals/0a/32/53/0a32539a7e667da3e86b0e36b175337e.jpg" alt="" class="hobby-item__photo">
                        <img data-gallery-item="img" data-url="https://i.pinimg.com/736x/a1/84/89/a1848967eb617464ff618c4da0432004.jpg" src="https://i.pinimg.com/736x/a1/84/89/a1848967eb617464ff618c4da0432004.jpg" alt="" class="hobby-item__photo">
                            {{--                        <div class="hobby-slider-slide">--}}
                            {{--                            <img src="" alt="" class="hobby-slider-slide__img">--}}
                            {{--                        </div>--}}
                            {{--                        <div class="hobby-slider-slide">--}}
                            {{--                            <img src="" alt="" class="hobby-slider-slide__img">--}}
                            {{--                        </div>--}}
                    </div>
                </div>

                 </div>
            </div>

                 <div class="hobby-nav">
                     <div class="hobby-nav-item">
                         <img src="https://i.pinimg.com/236x/29/3a/c7/293ac7ab9528e7d40299eb5b30de089c.jpg?nii=t" alt="" class="hobby-nav-item__img"/>
                         <p class="hobby-nav-item__title">iten 1 yfpdfybt</p>
                     </div>

                     <div class="hobby-nav-item">
                         <img src="https://i.pinimg.com/236x/29/3a/c7/293ac7ab9528e7d40299eb5b30de089c.jpg?nii=t" alt="" class="hobby-nav-item__img"/>
                         <p class="hobby-nav-item__title">iten 1 yfpdfybt</p>
                     </div>

                     <div class="hobby-nav-item">
                         <img src="https://i.pinimg.com/236x/29/3a/c7/293ac7ab9528e7d40299eb5b30de089c.jpg?nii=t" alt="" class="hobby-nav-item__img"/>
                         <p class="hobby-nav-item__title">iten 1 yfpdfybt</p>
                     </div>

                     <div class="hobby-nav-item">
                         <img src="https://i.pinimg.com/236x/29/3a/c7/293ac7ab9528e7d40299eb5b30de089c.jpg?nii=t" alt="" class="hobby-nav-item__img"/>
                         <p class="hobby-nav-item__title">iten 1 yfpdfybt</p>
                     </div>
                 </div>
             </div>
        </div>
@endsection
