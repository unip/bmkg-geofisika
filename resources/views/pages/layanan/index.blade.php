@php
    $layanan = [
        [
            'images' => '/images/layanan-sewa-alat.svg',
            'nama' => 'Sewa Alat',
            'url' => '/layanan/sewa-alat',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sapiente recusandae mollitia omnis alias possimus officia.',
        ],
        [
            'images' => '/images/layanan-konsultasi.svg',
            'nama' => 'Konsultasi',
            'url' => '/layanan/konsultasi',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sapiente recusandae mollitia omnis alias possimus officia.',
        ],
        [
            'images' => '/images/layanan-klaim-asuransi.svg',
            'nama' => 'Klaim Asuransi',
            'url' => '/layanan/klaim-asuransi',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sapiente recusandae mollitia omnis alias possimus officia.',
        ],
        [
            'images' => '/images/layanan-peta-sebaran.svg',
            'nama' => 'Peta Sebaran',
            'url' => '/layanan/peta-sebaran',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sapiente recusandae mollitia omnis alias possimus officia.',
        ],
    ];

@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Layanan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-bold text-3xl mb-3">Layanan kami</h3>
                    <div
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-3 gap-y-5 bg-gray-100/50 dark:bg-gray-700/50 backdrop-blur-lg rounded-lg p-5">
                        {{-- @dd($layanan[0]['images']) --}}
                        @foreach ($layanan as $item)
                            <a href="{{ $item['url'] }}"
                                class="rounded-md bg-white dark:bg-gray-700 overflow-hidden shadow-lg hover:-translate-y-2 hover:shadow-xl hover:shadow-green-500/20 hover:ring-2 ring-green-500 transition duration-200">
                                <img src="{{ asset($item['images']) }}" alt="{{ $item['nama'] }}" height="200">
                                <div class="text px-4 py-3">
                                    <h4 class="font-bold text-xl">
                                        {{ $item['nama'] }}
                                    </h4>
                                    <p class="hidden md:inline-block dark:text-gray-400">
                                        {{ $item['deskripsi'] }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
