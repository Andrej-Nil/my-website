<footer class="footer">
    <span class="footer-author">Разработчик сайта - <a class="footer-author__link" href="https://github.com/Andrej-Nil" target="_blank">AndrejNill</a></span>
</footer>


<div class="mobile-menu">
    <div class="mobile-menu__list">
        <a href="{{route('home')}}" class="mobile-menu-item">
            <img src="{{asset('img/icon/home.svg')}}" alt="" class="mobile-menu-item__icon">
            <span class="mobile-menu-item__title">Главная</span>
        </a>

        <a href="{{route('resume')}}" class="mobile-menu-item">
            <img src="{{asset('img/icon/user.svg')}}" alt="" class="mobile-menu-item__icon">
            <span class="mobile-menu-item__title">Резюме</span>
        </a>

        <a href="{{route('portfolios')}}" class="mobile-menu-item">
            <img src="{{asset('img/icon/directory.svg')}}" alt="" class="mobile-menu-item__icon">
            <span class="mobile-menu-item__title">Портфолио</span>
        </a>

        <span class="mobile-menu-item"></span>

        <div data-main-nav-open class="mobile-menu-item">
            <img src="{{asset('img/icon/menu-nav.svg')}}" alt="" class="mobile-menu-item__icon">
            <span class="mobile-menu-item__title">Меню</span>
        </div>
    </div>
</div>


