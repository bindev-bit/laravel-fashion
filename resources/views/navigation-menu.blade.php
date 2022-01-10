<section class="w-full md:sticky top-0 z-50 px-6 antialiased bg-white">

    <div class="mx-auto max-w-7xl">
        <nav class="relative z-50 h-24 select-none" x-data="{ showMenu: false }">
            @if (!request()->routeIs('/'))
                <div
                    class="container relative flex flex-wrap items-center justify-between h-24 mx-auto overflow-hidden font-medium md:overflow-visible lg:justify-center sm:px-4 md:px-2">
                @else
                    <div
                        class="container relative flex flex-wrap items-center justify-between h-24 mx-auto overflow-hidden font-medium border-b border-gray-200 md:overflow-visible lg:justify-center sm:px-4 md:px-2">
                    @endauth
                    <div class="flex items-center justify-start w-1/4 h-full pr-4">
                        <a href="{{ route('/') }}" class="inline-block py-4 md:py-0">
                            <span class="p-1 text-xl font-black leading-none text-gray-900"><span>fashion</span>

                                <span class="text-indigo-600">.</span></span>
                        </a>
                    </div>
                    <div class="top-0 left-0 items-start hidden w-full h-full p-4 text-sm bg-gray-900 bg-opacity-50 md:items-center md:w-3/4 md:absolute lg:text-base md:bg-transparent md:p-0 md:relative md:flex"
                        :class="{'flex fixed': showMenu, 'hidden': !showMenu }">
                        <div
                            class="flex-col w-full h-auto overflow-hidden bg-white rounded-lg md:bg-transparent md:overflow-visible md:rounded-none md:relative md:flex md:flex-row">
                            <a href="#_"
                                class="inline-flex items-center block w-auto h-16 px-6 text-xl font-black leading-none text-gray-900 md:hidden">fashion<span
                                    class="text-indigo-600">.</span></a>
                            @can('admin')
                                <div
                                    class="flex flex-col items-start justify-center w-full space-x-6 text-center lg:space-x-8 md:w-2/3 md:mt-0 md:flex-row md:items-center">

                                    <x-jet-nav-link href="{{ route('dashboard') }}"
                                        :active="request()->routeIs('dashboard')">
                                        {{ __('Dashboard') }}
                                    </x-jet-nav-link>

                                    <x-jet-nav-link href="{{ route('products.index') }}"
                                        :active="request()->routeIs('products.*')">
                                        {{ __('Products') }}
                                    </x-jet-nav-link>

                                    <x-jet-nav-link href="{{ route('wishlists.index') }}"
                                        :active="request()->routeIs('wishlists.*')">
                                        {{ __('Wishlist') }}
                                    </x-jet-nav-link>

                                </div>
                            @else
                                <div
                                    class="flex flex-col items-start justify-center w-full space-x-6 text-center lg:space-x-8 md:w-2/3 md:mt-0 md:flex-row md:items-center">
                                    <x-jet-nav-link href="{{ route('/') }}" :active="request()->routeIs('/')">
                                        {{ __('Home') }}
                                    </x-jet-nav-link>
                                    <x-jet-nav-link href="{{ route('products.page', 'pants') }}"
                                        :active="request()->is('list-products/pants')">
                                        {{ __('Pants') }}
                                    </x-jet-nav-link>
                                    <x-jet-nav-link href="{{ route('products.page', 'man') }}"
                                        :active="request()->is('list-products/man')">
                                        {{ __('Man') }}
                                    </x-jet-nav-link>
                                    <x-jet-nav-link href="{{ route('products.page', 'women') }}"
                                        :active="request()->is('list-products/women')">
                                        {{ __('Women') }}
                                    </x-jet-nav-link>
                                </div>
                            @endcan

                            <div
                                class="flex flex-col items-start justify-end w-full pt-4 md:items-center md:w-1/3 md:flex-row md:py-0">


                                @auth
                                    <div class="mr-3 relative">
                                        <x-jet-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                    <button
                                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                        <img class="h-8 w-8 rounded-full object-cover"
                                                            src="{{ Auth::user()->profile_photo_url }}"
                                                            alt="{{ Auth::user()->name }}" />
                                                    </button>
                                                @else
                                                    <span class="inline-flex rounded-md">
                                                        <button type="button"
                                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                            {{ Auth::user()->name }}

                                                            <svg class="ml-2 -mr-0.5 h-4 w-4"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                fill="currentColor">
                                                                <path fill-rule="evenodd"
                                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                    </span>
                                                @endif
                                            </x-slot>

                                            <x-slot name="content">
                                                <!-- Account Management -->
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    {{ __('Manage Account') }}
                                                </div>

                                                @can('admin')
                                                    <x-jet-dropdown-link href="{{ route('users.index') }}">
                                                        {{ __('List Users') }}
                                                    </x-jet-dropdown-link>
                                                @endcan

                                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                                    {{ __('Profile') }}
                                                </x-jet-dropdown-link>

                                                <div class="border-t border-gray-100"></div>

                                                <!-- Authentication -->
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf

                                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 this.closest('form').submit();">
                                                        {{ __('Log Out') }}
                                                    </x-jet-dropdown-link>
                                                </form>
                                            </x-slot>

                                        </x-jet-dropdown>
                                    </div>
                                    @cannot('admin')
                                        <a href="{{ route('wishlists.index') }}"
                                            class="group -m-2 p-2 flex items-center">
                                            <!-- Heroicon name: outline/shopping-bag -->
                                            <svg class="flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                            <span
                                                class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">{{ $total_wishlist }}</span>
                                            <span class="sr-only">items in wishlist, view bag</span>
                                        </a>
                                    @endcannot
                                @else
                                    <a href="{{ route('login') }}"
                                        class="w-full px-6 py-2 mr-0 text-gray-700 md:px-0 lg:pl-2 md:mr-4 lg:mr-5 md:w-auto">Sign
                                        In</a>
                                    <a href="{{ route('register') }}"
                                        class="inline-flex items-center w-full px-6 py-3 text-sm font-medium leading-4 text-white bg-indigo-600 md:px-3 md:w-auto md:rounded-full lg:px-5 hover:bg-indigo-500 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-indigo-600">Sign
                                        Up</a>
                                @endauth
                            </div>

                        </div>
                    </div>
                    <div @click="showMenu = !showMenu"
                        class="absolute right-0 flex flex-col items-center items-end justify-center w-10 h-10 bg-white rounded-full cursor-pointer md:hidden hover:bg-gray-100">
                        <svg class="w-6 h-6 text-gray-700" x-show="!showMenu" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"
                            x-cloak="">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg class="w-6 h-6 text-gray-700" x-show="showMenu" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" x-cloak="">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </div>
                </div>
    </nav>
</div>

</section>
