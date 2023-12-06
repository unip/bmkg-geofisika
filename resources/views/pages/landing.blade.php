@extends('layouts.main')

@section('content')
    <div class="landing-page">
        <header
            class="h-[calc(100vh+60px)] bg-[linear-gradient(rgba(0,0,0,0.3),rgba(10,30,0,0.6)),url('/public/images/landing-header-bg.jpg')] bg-cover bg-no-repeat bg-fixed bg-center">
            <div class="container text-center text-white h-full px-4 mx-auto grid place-content-center">

                {{-- Eyebrow --}}
                <a href="/"
                    class="bg-white/30 hover:bg-white hover:text-gray-700 hover:-translate-y-1 backdrop-blur rounded-full px-5 py-2 max-w-max mx-auto mb-7 transition duration-300">
                    <i class="fa-solid fa-bullhorn text-green-500 mr-2"></i> Download aplikasi BMKG sekarang
                    <i class="fa-solid fa-angle-right"></i>
                </a>

                {{-- Hero title --}}
                <h2 class="text-3xl md:text-6xl font-black max-w-5xl">Pelayanan informasi Geofisika secara luas,
                    cepat, tepat, akurat dan mudah dipahami</h2>
            </div>
        </header>

        <section class="latest-news -mt-[140px]">
            <div class="container px-4 mx-auto">
                <h3 class="font-bold text-white text-3xl mb-3">Berita Terkini</h3>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-3 gap-y-5 bg-white/70 backdrop-blur-lg rounded-lg p-5">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="rounded-md bg-white overflow-hidden shadow-lg">
                            <a href="/"><img src="{{ asset('/images/landing-header-bg.jpg') }}"
                                    class="w-full h-[200px] object-cover" alt="Title"></a>

                            <div class="text px-4 py-3">
                                <h4 class="font-bold text-xl">
                                    <a href="/"
                                        class="hover:visited:text-green-700 transition duration-200 overflow-hidden">
                                        A very long article title in the landing page
                                    </a>
                                </h4>
                                <small class="text-gray-400">Minggu, 4 Desember 2023</small>
                                <p class="hidden md:inline-block">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Dolorum sapiente recusandae
                                    mollitia
                                    omnis alias possimus officia.</p>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </section>

        <div class="container mx-auto my-10">
            <hr>
        </div>

        <footer>
            <div class="container grid grid-cols-2 grid-rows-2 md:grid-cols-6 md:grid-rows-1 gap-5 px-4 mx-auto">
                <div class="col-span-2 md:col-span-3 lg:col-span-2 flex gap-5">
                    <img src="{{ asset('/images/logo-bmkg.png') }}" alt="BMKG Geofisika Yogyakarta" class="h-[100px]">

                    <div>
                        <h4 class="font-bold text-xl mb-2">Alamat</h4>
                        <p class="text-gray-400">Jl. Kabupaten Km 5.5 Duwet Sendangadi Mlati Sleman, Yogyakarta 55285</p>
                    </div>
                </div>

                <div class="md:col-start-5 flex flex-col">
                    <h4 class="font-bold text-xl mb-2">Media Sosial</h4>
                    <a href="/"><i class="fa-brands fa-instagram"></i> Instagram</a>
                    <a href="/"><i class="fa-brands fa-twitter"></i> Twitter/X</a>
                </div>
                <div class="flex flex-col">
                    <h4 class="font-bold text-xl mb-2">Sitemap</h4>
                    <a href="/">Beranda</a>
                    <a href="/">Tentang kami</a>
                    <a href="/">Layanan</a>
                </div>
            </div>

            <div class="text-center bg-gray-800 text-white py-5 mt-10">
                <div class="container px-4 mx-auto">
                    <p class="text-gray-400 mt-2">
                        Copyright &copy; <?php echo date('Y'); ?> by Whelly, Uwi, Vicky, Rachel & Hanif - All Rights Reserved
                    </p>
                </div>
            </div>
        </footer>
    </div>
@endsection
