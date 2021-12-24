<header class='bg-light py-5'>
    <div class='container'>
        <div class='d-flex justify-content-between'>
            <div class=''>
                <div class='logo d-flex' style='font-size: 2rem; font-weight: bold'>
                    <div class='text-danger pe-2' >&#9733;</div>
                    <div class='d-flex flex-column justify-content-center'>Gootax</div>
                </div>
            </div>
            <div class=''>
                @if(Auth::user())
                <div class="d-flex">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="me-2">{{ Auth::user()->email }}</div>
                        <!--<div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>-->
                    </div>

                    <div class="d-flex flex-column justify-content-center">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                                   onclick="event.preventDefault();
                                                           this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
                @endif

                @if (Route::has('login'))
                <div class='d-flex flex-nowrap flex-column justify-content-center'>
                    <div class=''>
                        @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                        @endauth
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</header>
