<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="/layanan"
                class="w-[40px] h-[40px] grid md:hidden place-content-center text-gray-400 hover:text-green-600 rounded border mr-3">
                <i class="fas fa-angle-left text-sm"></i>
            </a>
            <span class="hidden md:inline">
                <a href="/layanan" class="text-gray-400 hover:text-green-600">Layanan</a>
                <i class="fa-solid fa-angle-right mx-2 text-sm"></i>
                <a href="/layanan/sewa-alat" class="text-gray-400 hover:text-green-600">Sewa Alat</a>
                <i class="fa-solid fa-angle-right mx-2 text-sm"></i>
            </span>
            <span>{{ $alat->nama }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 max-w-7xl mx-auto sm:px-6 lg:px-8 gap-3">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2
                        class="flex items-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                        Permohonan Sewa Alat
                    </h2>

                    @if (session('success'))
                        <div class="bg-green-300 text-green-900 px-4 py-2 rounded mb-4 shadow">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('sewa-alat.store', $alat->slug) }}" class="grid grid-cols-1 gap-3">
                        @csrf
                        @method('post')
                        <div>
                            <x-input-label for="nama_penyewa">Nama penyewa</x-input-label>
                            <x-text-input id="nama_penyewa" class="block mt-1 w-full" type="text" name="nama_penyewa"
                                :value="old('nama_penyewa')" required autofocus />
                            <x-input-error :messages="$errors->get('nama_penyewa')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="alamat">Alamat</x-input-label>
                            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat"
                                :value="old('alamat')" />
                            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="no_hp">Nomor HP</x-input-label>
                            <x-text-input id="no_hp" class="block mt-1 w-full" type="text" name="no_hp"
                                :value="old('no_hp')" required />
                            <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="instansi">Instansi</x-input-label>
                            <x-text-input id="instansi" class="block mt-1 w-full" type="text" name="instansi"
                                :value="old('instansi')" required />
                            <x-input-error :messages="$errors->get('instansi')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="lama_sewa_hari">Lama sewa</x-input-label>
                            <x-text-input id="lama_sewa_hari" class="block mt-1 w-full" type="number"
                                name="lama_sewa_hari" :value="old('lama_sewa_hari')" required />
                            <x-input-error :messages="$errors->get('lama_sewa_hari')" class="mt-2" />
                        </div>

                        <label for="syarat">
                            <input type="checkbox" name="syarat" id="syarat" class="rounded">
                            Saya menyetujui <a href="" class="underline hover:text-green-500">syarat dan
                                ketentuan</a> yang berlaku
                        </label>

                        <button type="submit"
                            class="bg-green-600 hover:bg-green-500 text-white rounded px-3 leading-10">Kirim</button>
                    </form>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col h-full p-6 text-gray-900 dark:text-gray-100">
                    <h2
                        class="flex items-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                        Permohonan Anda
                    </h2>

                    @if ($alat->permohonan->isEmpty())
                        <div class="flex-1 grid place-content-center">
                            <img src="{{ asset('images/alat-tidak-tersedia.svg') }}" alt="" width="200">
                            <p>Belum ada permohonan</p>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
