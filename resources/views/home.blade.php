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


           <div class="main-content__body">
               <div class="signature">
                   <div class="signature__inner">
                       <h1 class="signature__name">Testtest Testte</h1>
                       <p class="signature__profession">Test-test Testtesttst</p>
                       <button type="button" class="signature__btn btn">Связь</button>
                   </div>

               </div>

               <div class="main-content__slider">

               </div>
           </div>


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
