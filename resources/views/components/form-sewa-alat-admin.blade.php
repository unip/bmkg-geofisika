<div class="relative text-gray-900 bg-white shadow-sm dark:text-gray-100 dark:bg-gray-800 h-max lg:sticky lg:top-12">

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

    <form action="{{ route('sewa-alat.store') }}" method="POST" class="grid grid-cols-1 gap-3 md:grid-cols-2"
        enctype="multipart/form-data">
        @csrf @method('post')

        <div class="flex flex-col gap-3">
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
                    <x-text-input id="sewa_berakhir" class="block w-full mt-1" type="date" name="sewa_berakhir"
                        :value="old('sewa_berakhir')" placeholder="Hingga tanggal" required />
                    <x-input-error :messages="$errors->get('sewa_berakhir')" class="mt-2" />
                </div>
            </div>
            <div>
                <x-input-label for="surat_permohonan">Surat Permohonan</x-input-label>
                <div
                    class="block mt-1 border border-gray-300 rounded-md dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                    <span class="sr-only">Pilih file permohonan</span>
                    <input type="file" accept=".png,.jpg,.jpeg,.pdf" name="surat_permohonan" id="surat_permohonan"
                        class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-s-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 hover:file:cursor-pointer" />
                </div>
                <x-input-error :messages="$errors->get('surat_permohonan')" class="mt-2" />
            </div>
        </div>

        <div class="flex flex-col flex-1 gap-3">
            <div class="flex flex-col flex-1">
                <x-input-label for="keterangan">Keterangan</x-input-label>
                <textarea id="keterangan"
                    class="flex-1 block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                    rows="3" name="keterangan" :value="old('keterangan')"></textarea>
                <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
            </div>
        </div>

        <button type="submit"
            class="col-start-2 px-3 mt-5 ml-auto leading-10 text-white bg-green-600 rounded w-max hover:bg-green-500">
            Buat Permohonan
        </button>
    </form>
</div>
