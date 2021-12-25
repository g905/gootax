<header class='bg-light py-4'>
    <div class='container'>
        <div class='d-flex justify-content-between'>
            <div class=''>
                <div class='logo d-flex' style='font-size: 2rem; font-weight: bold'>
                    <div class='text-danger pe-2' >&#9763;</div>
                    <div class='d-flex flex-column justify-content-center'>Gootax</div>
                </div>
            </div>
            <div class='d-flex flex-nowrap flex-column justify-content-center'>
                @if(Auth::user())
                <div class="d-flex">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="me-2">{{ Auth::user()->details->fio }}</div>
                        <!--<div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>-->
                    </div>

                    <div class="d-flex flex-column justify-content-center">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                                   onclick="event.preventDefault();
                                                           this.closest('form').submit();">
                                {{ __('Выйти') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
                @endif

                @if (Route::has('login'))
                <div class=''>
                    @auth
                    <!--<a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>-->
                    @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Вход</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Регистрация</a>
                    @endif
                    @endauth
                </div>
                @endif
            </div>
        </div>
        @if(\Modules\City\Entities\City::find(session("city_id")))
        <div class='d-flex header-city'>{{ \Modules\City\Entities\City::find(session("city_id"))->name }}</div>
        @endif
    </div>
</header>
