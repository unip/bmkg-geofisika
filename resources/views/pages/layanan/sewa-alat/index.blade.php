<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            <a href="/layanan"
                class="w-[40px] h-[40px] grid md:hidden place-content-center text-gray-400 hover:text-green-600 rounded border border-gray-400 dark:border-gray-600 mr-3">
                <i class="text-sm fas fa-angle-left"></i>
            </a>
            <span class="hidden md:inline">
                <a href="/layanan" class="text-gray-400 hover:text-green-600">Layanan</a>
                <i class="mx-2 text-sm fa-solid fa-angle-right"></i>
            </span>
            <span>Sewa Alat</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-1 mx-auto gap-y-3 lg:gap-x-3 lg:grid-cols-3 max-w-7xl sm:px-6 lg:px-8">
            <div
                class="relative p-6 overflow-hidden text-gray-900 bg-white shadow-sm dark:text-gray-100 dark:bg-gray-800 sm:rounded-lg h-max lg:sticky lg:top-12">

                <h2 class="flex items-center mb-4 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    Permohonan Sewa Alat
                </h2>

                @if (session('success'))
                    <div class="px-4 py-2 mb-4 text-green-900 bg-green-300 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="px-4 py-2 mb-4 text-red-900 bg-red-200 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="px-4 py-2 mb-4 text-red-900 bg-red-200 rounded shadow">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('sewa-alat.store') }}" method="POST" class="grid grid-cols-1 gap-3"
                    enctype="multipart/form-data">
                    @csrf @method('post')

                    <div class="flex gap-3 *:flex-1">
                        <div>
                            <x-input-label for="alat_id">Alat</x-input-label>
                            <select name="alat_id" id="alat_id"
                                class="block w-full mt-1 truncate border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                <option value="">Pilih alat...</option>
                                @foreach ($alats as $item)
                                    <option value="{{ $item->id }}" @selected(old('alat_id') == $item->id)>{{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('alat_id')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="banyak_unit">Banyak unit</x-input-label>
                            <x-text-input id="banyak_unit" class="block w-full mt-1" type="number" name="banyak_unit"
                                value="1" :value="old('banyak_unit')" required />
                            <x-input-error :messages="$errors->get('banyak_unit')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <div class="relative flex-1">
                            <x-input-label class="w-full" for="sewa_mulai">Dari tanggal</x-input-label>
                            <x-text-input id="sewa_mulai" class="block w-full mt-1" type="date" name="sewa_mulai"
                                :value="old('sewa_mulai')" placeholder="Dari tanggal" required />
                            <x-input-error :messages="$errors->get('sewa_mulai')" class="mt-2" />
                        </div>

                        <div class="relative flex-1">
                            <x-input-label class="w-full" for="sewa_berakhir">Hingga tanggal</x-input-label>
                            <x-text-input id="sewa_berakhir" class="block w-full mt-1" type="date"
                                name="sewa_berakhir" :value="old('sewa_berakhir')" placeholder="Hingga tanggal" required />
                            <x-input-error :messages="$errors->get('sewa_berakhir')" class="mt-2" />
                        </div>

                    </div>

                    <div>
                        <x-input-label for="surat_permohonan">Surat Permohonan</x-input-label>
                        <div
                            class="block mt-1 border border-gray-300 rounded-md dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                            <span class="sr-only">Pilih file permohonan</span>
                            <input type="file" accept=".png,.jpg,.jpeg,.pdf" name="surat_permohonan"
                                id="surat_permohonan"
                                class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-s-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 hover:file:cursor-pointer" />
                        </div>
                        <x-input-error :messages="$errors->get('surat_permohonan')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="keterangan">Keterangan</x-input-label>
                        <textarea id="keterangan"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            rows="3" name="keterangan" :value="old('keterangan')"></textarea>
                        <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
                    </div>

                    <label for="syarat" class="mt-5 mb-3">
                        <input type="checkbox" name="syarat" id="syarat" class="rounded" required>
                        Saya menyetujui <a href="" class="underline hover:text-green-500">syarat dan
                            ketentuan</a> yang berlaku
                    </label>

                    <button type="submit"
                        class="px-3 leading-10 text-white bg-green-600 rounded hover:bg-green-500">Kirim</button>
                </form>
            </div>

            <div class="col-span-2 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div x-data="{
                    showModalPermohonan: false,
                    expanded: false,
                    showModalBatalPermohonan: false,
                    data: { id: null, namaAlat: null, tanggalSewa: null, unit: null, status: null, total: null, expedisi: null, resi: null },
                    action: null,
                    download: null,
                }" class="flex flex-col h-full p-6 text-gray-900 dark:text-gray-100">
                    <h2
                        class="flex items-center mb-4 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                        Permohonan Anda
                    </h2>

                    @if ($permohonan->isEmpty())
                        <div class="grid flex-1 place-content-center">
                            <img src="{{ asset('images/alat-tidak-tersedia.svg') }}" alt="" width="200">
                            <p>Belum ada permohonan</p>
                        </div>
                    @else
                        <div class="w-full -mr-6 overflow-x-auto">
                            <table class="w-full overflow-hidden rounded table-auto text-slate-600 dark:text-slate-400">
                                <thead
                                    class="border-b bg-slate-100 dark:bg-slate-900 border-b-slate-300 dark:border-b-slate-500">
                                    <tr>
                                        <th class="p-3 text-left">Barang</th>
                                        <th class="p-3 text-left">Tanggal Sewa</th>
                                        <th class="p-3 text-left">Unit</th>
                                        <th class="p-3 text-left">Status</th>
                                        <th class="p-3 text-left">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permohonan as $item)
                                        @php
                                            $alat_dipilih = $alats->firstWhere('id', $item->alat_id);

                                            $date1 = new DateTime($item->sewa_mulai);
                                            $date2 = new DateTime($item->sewa_berakhir);
                                            $diff = $date1->diff($date2)->days;
                                            $lama_sewa = $diff == 0 ? 1 : $diff;

                                            $total = 'Rp' . number_format($item->alat->harga * ($lama_sewa * $item->banyak_unit), 0, ',', '.');
                                        @endphp
                                        <tr class="transition duration-200 border-b hover:cursor-pointer border-b-slate-300 dark:border-b-slate-700 hover:bg-slate-200 dark:hover:bg-slate-700"
                                            @click="
                                            showModalPermohonan = true;
                                            expanded = false;
                                            data.id = `{{ $item->id }}`;
                                            data.namaAlat = `{{ $item->alat->nama }}`;
                                            data.tanggalSewa = `{{ $item->sewa_mulai }} s/d {{ $item->sewa_berakhir }}`;
                                            data.unit = `{{ $item->banyak_unit }}`;
                                            data.status = `{{ $item->status }}`;
                                            data.total = `{{ $total }}`;
                                            action = `{{ route('sewa-alat.destroy', ['sewa_alat' => $item]) }}`;
                                            download = `{{ route('sewa-alat.download-permohonan', ['sewa_alat' => $item]) }}`;

                                            @if ($item->expedisi != null && $item->resi != null) data.expedisi = `{{ $item->expedisi }}`;
                                                data.resi = `{{ $item->resi }}`; @endif
                                        ">
                                            <td class="p-3 align-top max-w-[200px]">
                                                {{ $item->alat->nama }}
                                            </td>
                                            <td class="p-3 align-top">
                                                <span>{{ \Carbon\Carbon::parse($item->sewa_mulai)->format('d/m/Y') }}</span>
                                                -
                                                <span>{{ \Carbon\Carbon::parse($item->sewa_berakhir)->format('d/m/Y') }}</span>
                                            </td>
                                            <td class="p-3 align-top">
                                                {{ $item->banyak_unit }} unit
                                            </td>
                                            <td class="p-3 align-top">
                                                <span class="font-bold text-yellow-500">
                                                    {{ $item->status }}
                                                </span>
                                            </td>
                                            <td class="p-3 font-bold align-top dark:text-white">
                                                {{ $total }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <!-- Modal -->
                    <div class="fixed inset-0 z-30 overflow-auto bg-black bg-opacity-50" x-show="showModalPermohonan"
                        x-transition.opacity x-cloak>

                        <!-- Modal inner -->
                        <div class="w-full max-w-sm p-6 mx-auto mt-20 mb-10 text-left bg-white rounded-lg shadow-lg dark:bg-slate-800"
                            @click.away="showModalPermohonan = false" x-transition>
                            <!-- Title / Close-->
                            <div class="flex items-center justify-between mb-5">
                                <h5 class="mr-3 font-bold max-w-none">Detail Permohonan</h5>

                                <button type="button" class="z-50 cursor-pointer"
                                    @click="showModalPermohonan = false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- content -->
                            <div class="modal-content">
                                <dl class="grid grid-cols-2 gap-y-3">
                                    <dt class="text-sm text-slate-500">Nama Alat</dt>
                                    <dd x-text="data.namaAlat"></dd>

                                    <dt class="text-sm text-slate-500">Tanggal Sewa</dt>
                                    <dd x-text="data.tanggalSewa"></dd>

                                    <dt class="text-sm text-slate-500">Jumlah Unit</dt>
                                    <dd x-text="data.unit"></dd>

                                    <dt class="text-sm text-slate-500">Status</dt>
                                    <dd x-text="data.status"></dd>

                                    <dt class="text-sm text-slate-500">Total Biaya</dt>
                                    <dd x-text="data.total"></dd>

                                    <dt class="text-sm text-slate-500">File Permohonan</dt>
                                    <dd>
                                        <a :href="download"
                                            class="font-bold text-green-500 hover:text-green-700">
                                            Download
                                            <i class="fa-solid fa-file-arrow-down"></i>
                                        </a>
                                    </dd>

                                    <div x-show="data.expedisi">
                                        <dt class="text-sm text-slate-500">Pengiriman</dt>
                                        <dd>
                                            <p x-text="data.expedisi"></p>
                                            <p x-text="data.resi"></p>
                                        </dd>
                                    </div>
                                </dl>

                                <div x-show="data.status = `Belum Lunas`" @click="expanded = ! expanded"
                                    class="p-3 mt-5 text-yellow-800 bg-yellow-200 rounded hover:cursor-pointer">
                                    <h3 class="block font-bold">Panduan
                                        Pembayaran:</h3>
                                    <p x-show="expanded" x-collapse>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas quidem
                                        similique atque explicabo, est optio hic fuga ex! Possimus facere saepe debitis
                                        expedita velit quisquam excepturi laborum temporibus iusto architecto ipsum
                                        nobis quidem consequuntur ipsa ducimus totam voluptate consequatur quia tenetur
                                        mollitia, officia delectus id quaerat dicta. Cumque, corporis similique ex
                                        provident incidunt non enim dicta! Atque error unde adipisci consequatur sequi
                                        cum possimus blanditiis quis aperiam, consequuntur voluptas id nemo, dolores
                                        iure? Ipsam, ipsa vitae, doloribus iure tempore possimus, doloremque culpa illum
                                        tenetur voluptas nostrum labore! Eius corporis voluptates, qui quae nihil
                                        exercitationem, vero suscipit maiores aut laboriosam consequatur.</p>
                                </div>

                                <button type="button"
                                    @click="showModalPermohonan = false; showModalBatalPermohonan = true"
                                    class="w-full p-3 mt-5 text-center text-white uppercase bg-red-400 rounded hover:bg-red-500 ms-auto">Batal
                                    Permohonan</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Modal -->

                    <!-- Modal Confirm Delete -->
                    <div class="fixed inset-0 z-30 overflow-auto bg-black bg-opacity-50"
                        x-show="showModalBatalPermohonan" x-transition.opacity x-cloak>

                        <!-- Modal inner -->
                        <div class="w-full max-w-sm p-6 mx-auto mt-20 mb-10 text-left bg-white rounded-lg shadow-lg dark:bg-slate-800"
                            @click.away="showModalBatalPermohonan = false" x-transition>
                            <!-- Title / Close-->
                            <div class="flex items-center justify-between mb-5">
                                <h5 class="mr-3 font-bold max-w-none">Batalkan Permohonan</h5>

                                <button type="button" class="z-50 cursor-pointer"
                                    @click="showModalBatalPermohonan = false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- content -->
                            <div class="modal-content">
                                <p>Anda yakin akan membatalkan permohonan?</p>

                                <form :action="action" method="post" class="flex gap-3 w-full *:flex-1 mt-5">
                                    @csrf @method('delete')

                                    <button type="button" class="p-3 rouded"
                                        @click="showModalBatalPermohonan = false">Tidak</button>
                                    <button type="submit"
                                        class="p-3 text-center text-white bg-red-400 rounded hover:bg-red-500">Ya,
                                        Batalkan</butt>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Modal Confirm Delete -->
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            import AirDatepicker from 'air-datepicker';
            new AirDatepicker('#sewa_mulai');
        </script>
    @endsection

</x-app-layout>
