@extends('layouts.main')

@php
    $layanan = [
        [
            'images' => '/images/layanan-sewa-alat.svg',
            'nama' => 'Sewa Alat',
            'url' => '/layanan/sewa-alat',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sapiente recusandae mollitia omnis alias possimus officia.'
        ],
        [
            'images' => '/images/layanan-konsultasi.svg',
            'nama' => 'Konsultasi',
            'url' => '/layanan/konsultasi',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sapiente recusandae mollitia omnis alias possimus officia.'
        ],
        [
            'images' => '/images/layanan-klaim-asuransi.svg',
            'nama' => 'Klaim Asuransi',
            'url' => '/layanan/klaim-asuransi',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sapiente recusandae mollitia omnis alias possimus officia.'
        ],
        [
            'images' => '/images/layanan-peta-sebaran.svg',
            'nama' => 'Peta Sebaran',
            'url' => '/layanan/peta-sebaran',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sapiente recusandae mollitia omnis alias possimus officia.'
        ],
    ];
@endphp

@section('content')
    <div class="landing-page">
        <header
            class="h-[calc(70vh+200px)] lg:h-[calc(100vh+200px)] bg-[linear-gradient(rgba(0,0,0,0.4),rgba(10,30,0,0.6)),url('/public/images/slides/1.jpg')] bg-cover bg-no-repeat bg-fixed bg-center">
            <div class="container text-center text-white h-full lg:h-screen px-4 mx-auto grid place-content-center">
                {{-- Eyebrow --}}
                <a href="https://apps.bmkg.go.id/"
                    target="__blank"
                    class="text-sm bg-white/30 hover:bg-white hover:text-gray-700 hover:-translate-y-1 backdrop-blur rounded-full px-5 py-2 max-w-max mx-auto mb-7 transition duration-300">
                    <i class="fa-solid fa-bullhorn text-green-500 mr-2"></i> Download aplikasi BMKG sekarang
                    <i class="fa-solid fa-angle-right"></i>
                </a>

                {{-- Hero title --}}
                <h2 class="text-3xl md:text-6xl font-black max-w-5xl">Pelayanan informasi Geofisika secara luas,
                    cepat, tepat, akurat dan mudah dipahami</h2>
            </div>
        </header>

        <section id="layanan" class="layanan -mt-[240px] pt-[100px]">
            <div class="container px-4 mx-auto">
                <h3 class="font-bold text-white text-3xl mb-3">Layanan kami</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-3 gap-y-5 bg-white/70 backdrop-blur-lg rounded-lg p-5">
                    {{-- @dd($layanan[0]['images']) --}}
                    @foreach ($layanan as $item)
                        <a href="{{ $item['url'] }}" class="rounded-md bg-white overflow-hidden shadow-lg hover:-translate-y-2 hover:shadow-xl transition duration-200">
                            <img src="{{ asset($item['images']) }}" alt="{{ $item['nama'] }}" height="200">
                            <div class="text px-4 py-3">
                                <h4 class="font-bold text-xl">
                                    {{ $item['nama'] }}
                                </h4>
                                <p class="hidden md:inline-block">{{ $item['deskripsi'] }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="latestNews" class="latest-news mt-10">
            <div class="container px-4 mx-auto">
                <h3 class="font-bold text-3xl mb-3">Berita Terkini</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-3 gap-y-5 bg-white/70 backdrop-blur-lg rounded-lg p-5">
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

                <a href="/berita" class="block max-w-max px-10 py-3 mx-auto mt-5 rounded-full border border-green-700 text-green-700 hover:bg-green-700 hover:text-white transition duration-200">
                    Berita lainnya
                </a>
            </div>
        </section>

        <div class="container mx-auto mt-10">
            <hr>
        </div>
    </div>
@endsection
