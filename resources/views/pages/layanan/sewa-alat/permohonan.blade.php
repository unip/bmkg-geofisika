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
            <div class="bg-white relative dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if ($alat->unit == 0)
                    <div
                        class="maaf absolute h-full w-full bg-white/80 backdrop-blur-sm flex flex-col items-center justify-center text-center p-10">
                        <img src="{{ asset('images/image-sory.svg') }}" alt="" width="200" height="200">
                        <h2 class="text-3xl font-bold">Maaf...</h2>
                        <p class="text-xl text-slate-500">Semua alat sedang dalam peminjaman</p>
                    </div>
                @endif
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2
                        class="flex items-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                        Permohonan Sewa Alat
                    </h2>

                    @if (session('success'))
                        <div class="bg-green-300 text-green-900 px-4 py-2 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-200 text-red-900 px-4 py-2 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="bg-red-200 text-red-900 px-4 py-2 rounded mb-4 shadow">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('sewa-alat.store', $alat) }}" method="POST" class="grid grid-cols-1 gap-3">
                        @csrf

                        <div>
                            <x-input-label for="banyak_unit">Banyak unit</x-input-label>
                            <x-text-input id="banyak_unit" class="block mt-1 w-full" type="number" name="banyak_unit"
                                value="1" :value="old('banyak_unit')" required />
                            <x-input-error :messages="$errors->get('banyak_unit')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="lama_sewa_hari">Lama sewa (hari)</x-input-label>
                            <x-text-input id="lama_sewa_hari" class="block mt-1 w-full" type="number"
                                name="lama_sewa_hari" :value="old('lama_sewa_hari')" required />
                            <x-input-error :messages="$errors->get('lama_sewa_hari')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="keterangan">Keterangan</x-input-label>
                            <textarea id="keterangan"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                                rows="3" name="keterangan" :value="old('keterangan')"></textarea>
                            <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
                        </div>

                        <label for="syarat" class="mt-5 mb-3">
                            <input type="checkbox" name="syarat" id="syarat" class="rounded" required>
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
                    @else
                        <table class="table-auto rounded overflow-hidden text-slate-600 dark:text-slate-400">
                            <thead class="bg-slate-100 dark:bg-slate-900 border-b border-b-slate-300">
                                <tr>
                                    <th class="p-3 text-left">Tanggal</th>
                                    <th class="p-3 text-left">Lama pinjam</th>
                                    <th class="p-3 text-left">Banyak unit</th>
                                    <th class="p-3 text-left">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alat->permohonan as $item)
                                    <tr
                                        class="border-b border-b-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 transition duration-200">
                                        <td class="p-3 align-top">
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                        </td>
                                        <td class="p-3 align-top">
                                            {{ $item->lama_sewa_hari }} hari
                                        </td>
                                        <td class="p-3 align-top">
                                            {{ $item->banyak_unit }} unit
                                        </td>
                                        <td class="p-3 align-top font-bold dark:text-white">
                                            Rp{{ number_format($alat->harga * ($item->lama_sewa_hari * $item->banyak_unit), 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
