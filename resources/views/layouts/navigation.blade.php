{{-- template navigation --}}

{{-- <div class="container mx-auto px-6 py-3 "> --}}
    {{-- Navigation links --}}
    <nav :class="isOpen ? '' : 'hidden'" class="sm:flex sm:justify-around sm:items-center mt-4">
        <!-- Logo -->
        <div class="shrink-0 flex items-center">
            <a href="{{ url('/home') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-yellow" />
            </a>
        </div>

        <div class="flex flex-col sm:flex-row">
            <x-nav-link :href="url('/home')">
                {{ __('Home') }}
            </x-nav-link>
            <x-nav-link :href="url('/home')">
                {{ __('Catalogue') }}
            </x-nav-link>

            @guest
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Log In') }}
                </x-nav-link>
                   
                <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-nav-link>
            @endguest

            {{-- Condition additionnelle sur l'authentification : si la personne connectée (user) est l'administrateur.rice ('is_admin' === 1),
            alors le menu "dashboard" s'affichera dans la barre de navigation. --}}
            {{-- @if(Auth::attempt(['is_admin' => 1]))
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
            @endif --}}

            @auth
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
            @endauth

        </div>
    </nav>

    {{-- Icons --}}
    <div class="flex items-center justify-between mx-10">
        <div class="flex items-center justify-end w-full">
            {{-- @auth --}}
                {{-- Profile icon --}}
                <a class="text-yellow focus:outline-none mx-4 sm:mx-0" href={{route('profile.edit')}}>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </a>
                
                
                {{-- Log out icon --}}
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="text-yellow focus:outline-none mx-4 sm:mx-0"
                        href={{route('logout')}}
                        onclick="event.preventDefault();
                        this.closest('form').submit();"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">
                            <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm10.72 4.72a.75.75 0 011.06 0l3 3a.75.75 0 010 1.06l-3 3a.75.75 0 11-1.06-1.06l1.72-1.72H9a.75.75 0 010-1.5h10.94l-1.72-1.72a.75.75 0 010-1.06z" clip-rule="evenodd" />
                        </svg>                  
                    </a>
                </form>
            {{-- @endauth --}}
            
            {{-- Cart icon --}}
            <button @click="cartOpen = !cartOpen" class="text-yellow focus:outline-none mx-4 sm:mx-0">
                <svg class="h-9 w-9" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
            </button>
            {{-- La cart sidebar ne s'ouvre pas ???' --}}

            {{-- Toggle menu (burger menu on small screen) --}}
            <div class="flex sm:hidden">
                <button @click="isOpen = !isOpen" type="button"
                        class="text-yellow focus:outline-none focus:text-yellow"
                        aria-label="toggle menu">
                    <svg viewBox="0 0 24 24" class="h-10 w-10 fill-current">
                        <path fill-rule="evenodd"
                              d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

