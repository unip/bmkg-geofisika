<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="/layanan" class="text-gray-400 hover:text-green-600">Layanan</a>
            <i class="fa-solid fa-angle-right mx-2"></i> <span>Sewa Alat</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2
                        class="flex items-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                        Alat tersedia
                    </h2>

                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3">
                        @for ($i = 0; $i < 10; $i++)
                            <a href="#"
                                class="rounded-md bg-white dark:bg-gray-700 overflow-hidden shadow-lg hover:shadow-green-500/20 hover:ring-2 ring-green-500 transition duration-200">
                                <img src="{{ asset('/images/layanan-sewa-alat.svg') }}" alt="" height="100">
                                <div class="text px-4 py-3">
                                    <h4 class="font-bold text-lg">
                                        Nama alat
                                    </h4>
                                </div>
                            </a>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
