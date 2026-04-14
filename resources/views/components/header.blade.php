<header class="main-header">
    <div class="main-nav">
        <a href="{{route('home')}}" class="main-nav-item">Главная</a>
        <a href="{{route('resume')}}" class="main-nav-item">Резюме</a>
        <a href="{{route('portfolios')}}" class="main-nav-item">Партфолио</a>
        <a href="{{route('hobbies')}}" class="main-nav-item">Хобби</a>
        <a href="{{route('posts')}}" class="main-nav-item">Посты</a>

        @if(!(\Illuminate\Support\Facades\Auth::check()))
            <a href="{{route('login')}}" class="main-nav-item">Вход</a>
        @else
            <a class="main-nav-item" href="{{route('panel')}}">Панель</a>
            <span  class="main-nav-item">{{auth()->user()->name}}</span>
        @endif
    </div>

    <div class="main-contacts">
        <a href="tel:{{$admin['phone']}}" class="main-contact">{{$admin['phone']}}</a>
        <a href="mailto:{{$admin['mail']}}" class="main-contact">{{$admin['mail']}}</a>
    </div>
</header>
