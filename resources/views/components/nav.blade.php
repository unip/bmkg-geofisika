<nav class="h-[60px] md:h-[70px] px-4 py-3 fixed w-full top-0 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md z-10">
    <div class="container h-full mx-auto flex gap-3 items-center">
        <a href="/" class="flex font-bold gap-2 items-center dark:text-white">
            <img src="{{ asset('images/logo-bmkg.png') }}" class="h-[36px]" alt="BMKG">
            BMKG <span class="hidden md:inline">Geofisika Yogyakarta</span>
        </a>
        <ul class="hidden md:flex items-center">
            <li>
                <a href="/tentang-kami"
                    class="hover:bg-green-700 hover:text-white {{ request()->is('tentang-kami*') ? 'bg-green-700 !text-white' : '' }} dark:text-white rounded-full visited:text-green-900 dark:visited:text-green-600 dark:visited:hover:text-white px-5 py-3 transition duration-200">Tentang</a>
            </li>
            <li>
                <a href="{{ Auth::user() ? '/layanan' : '/#layanan' }}"
                    class="hover:bg-green-700 hover:text-white {{ request()->is('#layanan') ? 'bg-green-700 !text-white' : '' }} dark:text-white rounded-full visited:text-green-900 dark:visited:text-green-600 dark:visited:hover:text-white px-5 py-3 transition duration-200">Layanan</a>
            </li>
            <li>
                <a href="/berita"
                    class="hover:bg-green-700 hover:text-white {{ request()->is('berita*') ? 'bg-green-700 !text-white' : '' }} dark:text-white rounded-full visited:text-green-900 dark:visited:text-green-600 dark:visited:hover:text-white px-5 py-3 transition duration-200">Berita</a>
            </li>
        </ul>

        @if (Auth::user())
            <div class="hidden sm:flex sm:items-center ms-auto">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        @else
            <div class="hidden md:flex gap-3 ml-auto">
                <a href="/login"
                    class="text-green-700 hover:bg-green-700/20 dark:hover:text-white rounded-full visited:text-green-900 dark:visited:text-green-600 px-5 py-3 transition duration-200">
                    Login <i class="fa-solid fa-arrow-right-to-bracket"></i>
                </a>
                <a href="/register"
                    class="text-white bg-green-700 hover:bg-green-500 rounded-full border border-green-700 hover:border-green-500 px-5 py-3 transition duration-200">Register</a>
            </div>

            <button type="button"
                class="block dark:text-white md:hidden px-3 py-1 rounded ml-auto focus:ring-1 ring-green-700">
                <i class="fa-solid fa-bars"></i>
            </button>
        @endif
    </div>
</nav>
