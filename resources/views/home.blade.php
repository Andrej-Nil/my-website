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
                   <button data-main-form-btn type="button" class="signature__btn btn">Название кнопки</button>
               </div>
           </div>

           <div id="mainFrame" class="main-frame">

               <div id="mainFrameLight"  class="main-frame__light"></div>


               <div class="main-frame__content">

                   <form id="mainForm" action="" class="main-form">

                           @csrf

                       <div class="main-form__inner">
                           <i data-main-form-close class="main-form__close"></i>
                           <p class="main-form__title">Обратная связь</p>
                           <div class="main-form__body">
                                <div class="control">
                                    <label for="mainFormName" class="control__label">Ваше имя</label>
                                    <input type="text" id="mainFormName" class="control__input input" placeholder="Ваше имя">
                                </div>

                               <div class="control">
                                   <label for="mainFormPhone" class="control__label">Номер телефона</label>
                                   <input type="text" id="mainFormPhone" class="control__input input" placeholder="Номер телефона">
                               </div>

                               <div class="control">
                                   <label for="mainFormMail" class="control__label">Почта</label>
                                   <input type="text" id="mainFormMail" class="control__input input" placeholder="Почта">
                               </div>

                               <div class="control">
                                   <label for="mainFormMessage" class="control__label">Почта</label>
                                   <textarea id="mainFormMessage" class="control__input input" rows="2" placeholder="Коментарий"></textarea>
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
