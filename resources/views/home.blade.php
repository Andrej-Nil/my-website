@extends('layouts.home')

@section('title', 'Home page')

@section('content')
   <div class="main">

       <header class="main-header">
           <div class="main-nav">
               <a href="{{route('home')}}" class="main-nav-item">Главное</a>
               <a href="{{route('about')}}" class="main-nav-item">Обо мне</a>
               <a href="{{route('post.index')}}" class="main-nav-item">Блок</a>
               <a href="{{route('contact')}}" class="main-nav-item">Контакты</a>
               @if(!(\Illuminate\Support\Facades\Auth::check()))
               <a href="{{route('login')}}" class="main-nav-item">Вход</a>
               @else
               <a class="main-nav-item" href="{{route('panel')}}">Панель</a>
               <span  class="main-nav-item">{{auth()->user()->name}}</span>
               @endif
           </div>



           <div class="main-contacts">
               <a href="tel:+7 898 909 90 09" class="main-contact">+7 898 909 90 09</a>
               <a href="mailto:dskjjdfh" class="main-contact">test@test</a>
           </div>
       </header>

       <div class="main-content">
           <div class="signature">
               <div class="signature__inner">
                   <h1 class="signature__name">Testtest Testte</h1>
                   <p class="signature__profession">Test-test Testtesttst</p>
                   <button data-frame-tab-link="form" type="button" class="signature__btn btn">Название кнопки</button>
               </div>
           </div>

           <div id="mainFrame" class="main-frame">

               <div id="mainFrameLight"  class="main-frame-light">
                   <span class="main-frame-light__blink"></span>
               </div>


               <div class="main-frame__content">


                   <div data-frame-tab="message" class="main-frame-tab">
{{--                       <div data-frame-tab-close class="main-close  main-frame-tab__close"></div>--}}
                       <div class="main-frame-tab__inner scroll">
                           <div id="mainFrameMessage" class="main-frame-message">
                               <div class="main-frame-message__inner">
                                   <i data-frame-tab-close class="main-close main-form-message__close"></i>
                                   <div data-message-inner class="main-frame-message__content">
                               </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div data-frame-tab="form" class="main-frame-tab">
                       <div data-frame-tab-close class="main-close main-frame-tab__close"></div>
                       <div class="main-frame-tab__inner scroll">
                           <form id="mainForm" action="{{route('callback')}}" method="post" class="main-form">
                               @csrf
                               <div class="main-form__inner">
                                   <p class="main-form__title">Обратная связь</p>
                                   <div class="main-form__body">
                                       <div  class="control">
                                           <label for="mainFormName" class="control__label">Ваше имя</label>
                                           <input data-input type="text" id="mainFormName" name="name" class="control__input input" placeholder="Ваше имя">
                                           <div data-control-errors="name" class="control__errors"></div>
                                       </div>

                                       <div class="control">
                                           <label for="mainFormPhone" class="control__label">Номер телефона</label>
                                           <input data-input type="text" id="mainFormPhone" name="phone" class="control__input input" placeholder="Номер телефона">
                                           <div data-control-errors="phone" class="control__errors"></div>
                                       </div>

                                       <div class="control">
                                           <label for="mainFormMail" class="control__label">Почта</label>
                                           <input data-input type="text" id="mainFormMail" name="email" class="control__input input" placeholder="Почта">
                                           <div data-control-errors="email" class="control__errors">

                                           </div>
                                       </div>

                                       <div class="control">
                                           <label for="mainFormMessage" class="control__label">Почта</label>
                                           <textarea data-input id="mainFormMessage" name="comment" class="control__input input" rows="2" placeholder="Коментарий"></textarea>
                                           <div data-control-errors="comment" class="control__errors"></div>
                                           {{--                                   <input type="text" id="mainFormMail" class="control__input input" placeholder="Почта">--}}
                                       </div>
                                   </div>
                                   <div class="main-form__bottom">
                                       <button type="submit" class="main-form__submit btn">Отправить</button>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>

                   <div data-frame-tab="info" class="main-frame-tab">
                         <div data-frame-tab-close class="main-close  main-frame-tab__close"></div>
                         <div class="main-frame-tab__inner scroll">
                             <div class="about-me">
                                 <div class="about-me__top">
                                     <div class="about-me__intro">
                                      <p class="about-me__title">Lorem ipsum.</p>
                                      <p class="about-me__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore eaque earum, expedita facilis in odit provident repellat sequi soluta velit.</p>

                                     </div>
                                     <img src="{{asset('img/my-photo.jpg')}}" alt="" class="about-me__photo">
                                 </div>

                                 <div class="about-me__body">
                                     <p class="about-me__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore eaque earum, expedita facilis in odit provident repellat sequi soluta velit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur at atque blanditiis culpa debitis deserunt dignissimos dolor dolorem earum eveniet excepturi facere fugit id illum impedit modi molestias nam, nisi nostrum obcaecati officiis porro praesentium quaerat quasi quibusdam quis recusandae reiciendis rem repellendus sed suscipit totam ut vel veritatis vero voluptatem. Alias animi eos, explicabo inventore ipsam odio pariatur perspiciatis provident ullam unde. Corporis excepturi in maiores nulla, officia quam qui temporibus vel vero, voluptas voluptatem voluptatibus! Accusamus ad asperiores aspernatur aut commodi corporis culpa deserunt dolorem doloremque dolores dolorum ipsam ipsum laborum pariatur, porro quidem, repellat repellendus voluptates!</p>
                                 </div>

                                 <div class="about-me__bottom">
                                     <p class="about-me__subtitle">Lorem ipsum.</p>
                                     <div class="about-me__list">
                                        <a href="tel:+78989099009" class="about-me__link">+7 898 909 90 09</a>
                                        <a href="mailto:test@test" class="about-me__link">test@test</a>
                                        <button data-frame-tab-link="form" type="button" class="btn">форма</button>
                                     </div>
                                 </div>
                             </div>
                        </div>
                   </div>

                   <div data-frame-tab="works" class="main-frame-tab">
                     <div data-frame-tab-close class="main-close  main-frame-tab__close"></div>
                     <div class="main-frame-tab__inner scroll">
                         <div class="my-works">
                             @foreach($workList as $work)
                                 <a href="{{$work['url']}}" target="_blank" class="my-work-card">
                                     <img src="{{$work['photo']['url']}}" alt="" class="my-work-card__img"/>
                                 </a>
                             @endforeach

                         </div>
                     </div>
                 </div>

                   <div data-frame-tab="contact" class="main-frame-tab">
                     <div data-frame-tab-close class="main-close  main-frame-tab__close"></div>
                     <div class="main-frame-tab__inner scroll">
                         <div class="about-me">
                             <div class="about-me__body">
                                 <p class="about-me__title">Lorem ipsum.</p>
                                 <p class="about-me__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore eaque earum, expedita facilis in odit provident repellat sequi soluta velit.</p>
                             </div>


                                 <div class="my-contacts">
                                     <div class="about-me__subtitle">Lorem ipsum dolor.</div>
                                     <div class="my-contacts__list">

                                         <div class="my-contact">
                                             <span class="my-contact__title">Телефон</span>
                                             <a href="tel:+78989099009"  class="my-contact__content">+7 898 909 90 09</a>
                                         </div>

                                         <div class="my-contact">
                                             <span class="my-contact__title">Почта</span>
                                             <a href="tel:+78989099009"  class="my-contact__content">test@test</a>
                                         </div>
                                     </div>

                                        <div class="socials">
                                            <a href="" target="_blank" class="social__link">
                                                <img src="{{asset('img/icon/tg.svg')}}"class="social__icon" alt="">
                                            </a>
                                            <a href="" target="_blank" class="social__link">
                                                <img src="{{asset('img/icon/vk.svg')}}"class="social__icon" alt="">
                                            </a>
                                            <a href="" target="_blank" class="social__link">
                                                <img src="{{asset('img/icon/wa.svg')}}"class="social__icon" alt="">
                                            </a>
                                        </div>
                                     <button data-frame-tab-link="form" type="button" class="my-contacts__btn btn">Форма</button>
                                 </div>

                         </div>
                     </div>
                 </div>

                   <div data-frame-nav class="main-frame-nav">
                       <div class="main-frame-nav__list">
                       <div data-frame-tab-link="info" class="main-frame-link">

                           <span class="main-frame-link__icon"></span>

                           <p class="main-frame-link__title">Кратко<br/> обо мне</p>

                       </div>

                       <div data-frame-tab-link="works" class="main-frame-link">
                           <span class="main-frame-link__icon"></span>

                           <p class="main-frame-link__title">Пример<br/> работ</p>
                       </div>

                       <div data-frame-tab-link="contact" class="main-frame-link">
                           <span class="main-frame-link__icon"></span>

                           <p class="main-frame-link__title">Контакты</p>
                       </div>
                       </div>
                   </div>

               </div>
           </div>

{{--           <div class="main-content__body">--}}



{{--           </div>--}}


       </div>


       <div class="main-footer">
           dnfbdhjfdfh

{{--           <div class="signature">--}}
{{--               <h1 class="signature-name">Кучеров Андрей</h1>--}}
{{--               <p class="signature-profession">front-end разработчик</p>--}}
{{--           </div>--}}
       </div>






   </div>
@endsection
