<header class="main-header">
    <div class="main-nav">
        <a href="{{route('home')}}" class="main-nav-item">Главное</a>
        <a href="{{route('hobby')}}" class="main-nav-item">Hobby</a>
        <a href="{{route('resume')}}" class="main-nav-item">Вуыс</a>
        <a href="{{route('about')}}" class="main-nav-item">авыаыва ыаывавыа</a>
        <a href="{{route('post.index')}}" class="main-nav-item">Бываывалок</a>
        <a href="{{route('contact')}}" class="main-nav-item">авываыва</a>
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
