@extends('layouts.form')

@section('title', 'Вход')

@section('content')
    <div class="container">
                <form action="{{route('login.auth')}}" method="post" class="form">
                @csrf
                 <div class="form__inner">
                     <p class="form__title">Вход</p>
                     <div class="form__content">
                         <div class="form__body">

                             <div class="control">
                                 <label for="email" class="control__label form-label">Почта</label>
                                 <input name="email" id="email" type="text" class="control__input input form-control" placeholder="Почта">
                             </div>

                             <div class="control">
                                 <label for="password" class="control__label form-label">Пароль</label>
                                 <input name="password" id="password" type="password" class="control__input input form-control" placeholder="Пароль">

                             </div>
                             <div class="form-check">
                                 <input name="remember" class="form-check-input" type="checkbox" id="remember">
                                 <label class="form-check-label" for="remember">
                                    Запомнить
                                 </label>
                             </div>
                         </div>

                     <div class="form__bottom">
                        <button type="submit" class="btn btn-primary">Вход</button>
                     </div>
                     </div>
                 </div>
            </form>
        </div>

@endsection

