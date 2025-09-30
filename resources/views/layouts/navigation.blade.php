<style>
    .text-true-red {
        color: #FF0000;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<nav x-data="{ open: false }" class="p-4 fixed w-full z-10 bg-neutral-900 bg-opacity-70 shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="container mx-auto flex justify-between items-center px-4">
                <!-- Logo -->
                <a href="/" class="text-3xl font-bold tracking-wider">
                    HIT<span class="text-true-red">N</span>RUN
                </a>

                <!-- Navigation Links -->
                <div class="flex space-x-6 items-center">
                    <ul class="flex space-x-6 items-center">
                        <li><a href="/" class="text-white hover:text-red-600 text-lg font-medium">Início</a></li>
                        <li><a href="./news.html" class="text-white hover:text-red-600 text-lg font-medium">Notícias</a></li>
                        <li><a href="./about.html" class="text-white hover:text-red-600 text-lg font-medium">Sobre Nós</a></li>
                        @if (Auth::check())
                            <div>
                                <x-dropdown align="right" width="48">

                                    <x-slot name="trigger">
                                        <button class="fa-solid fa-circle-user text-2xl cursor-pointer text-white transition-colors duration-200 hover:text-red-600" id="profileIcon" />
                                    </x-slot>

                                    <x-slot name="content" class="dropdown-content absolute right-0 mt-2 w-40 bg-neutral-800 rounded-md shadow-lg py-1 hidden">

                                        <x-dropdown-link :href="route('profile.edit')" class="block px-4 py-2 text-white hover:text-red-600 font-semibold">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>

                                        <x-dropdown-link :href="route('profile.edit')" class="block px-4 py-2 text-white hover:text-red-600 font-semibold">
                                            {{ __('Newsletter') }}
                                        </x-dropdown-link>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')" class="block px-4 py-2 text-white hover:text-red-600 font-semibold"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>

                                    </x-slot>
                                </x-dropdown>
                            </div>
                        @else
                            <li><a href="{{ route('login') }}" class="text-white hover:text-red-600 text-lg font-medium">Entrar</a></li>
                        @endif
                    </ul>
                </div>

            

            <!-- Settings Dropdown -->
            

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
               <!-- <div class="font-medium text-base text-gray-800"> Você </div> 
                <div class="font-medium text-sm text-gray-500"> E-Mail</div> -->
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

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
    </div>
</nav>

