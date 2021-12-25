<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('index')) active @endif" aria-current="page" href="{{ route('index') }}">&#9763;</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('select-city')) active @endif" href="{{ route('select-city') }}">Выбрать город</a>
            </li>
            @if(session("city_id"))
            <li class="nav-item dropdown @if(request()->routeIs('reviews')) active @endif">
                <a class="nav-link dropdown-toggle" href="{{ route('reviews') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Отзывы
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('reviews') }}">По городу</a></li>
                    @if(Auth::user())
                    <li><a class="dropdown-item" href="{{ route('reviews.by.author', ['id' => auth()->user()->id]) }}">Мои</a></li>
                    @endif
                </ul>
            </li>
            @endif
    </div>
</nav>
