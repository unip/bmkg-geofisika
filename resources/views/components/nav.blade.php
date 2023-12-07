<nav class="h-[60px] md:h-[70px] px-4 py-3 fixed w-full top-0 bg-white/80 backdrop-blur-md z-10">
    <div class="container h-full mx-auto flex gap-3 items-center">
        <a href="/" class="flex font-bold gap-2 items-center">
            <img src="{{ asset('images/logo-bmkg.png') }}" class="h-[36px]" alt="BMKG">
            BMKG <span class="hidden md:inline">Geofisika Yogyakarta</span>
        </a>
        <ul class="hidden md:flex items-center">
            <li><a href="/tentang-kami"
                    class="hover:bg-green-700 hover:text-white rounded-full visited:text-green-900 px-5 py-3 transition duration-200">Tentang</a>
            </li>
            <li><a href="/#layanan"
                    class="hover:bg-green-700 hover:text-white rounded-full visited:text-green-900 px-5 py-3 transition duration-200">Layanan</a>
            </li>
            <li><a href="/berita"
                    class="hover:bg-green-700 hover:text-white rounded-full visited:text-green-900 px-5 py-3 transition duration-200">Berita</a>
            </li>
        </ul>

        <div class="flex gap-3 ml-auto">
            <a href="/login" class="text-green-700 hover:bg-green-700/20 rounded-full visited:text-green-900 px-5 py-3 transition duration-200">
                Login <i class="fa-solid fa-arrow-right-to-bracket"></i>
            </a>
            <a href="/register" class="text-white bg-green-700 hover:bg-green-500 rounded-full border border-green-700 hover:border-green-500 px-5 py-3 transition duration-200">Register</a>
        </div>

        <button type="button" class="block md:hidden px-3 py-1 rounded ml-auto focus:ring-1 ring-green-700">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>
</nav>
