<x-app-layout>
    @section('styles')
        <link href="https://cdn.jsdelivr.net/npm/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />

        @yield('styles-page')
    @endsection

    <x-slot name="header">
        <h2 class="flex items-center text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Selamat Datang, {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-3 lg:py-5">
        <div class="grid grid-cols-1 mx-auto gap-y-3 lg:gap-x-5 lg:grid-cols-4 max-w-7xl sm:px-6 lg:px-8">
            @include('components.admin-sidebar')

            <main class="col-span-3 p-6 bg-white rounded-lg dark:bg-gray-800">
                <div class="flex items-center mb-4">
                    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                        {{ $title ?? 'Title' }}
                    </h2>

                    <a href="{{ route('admin.sewa-alat.create') }}"
                        class="px-3 py-2 ml-auto text-white bg-green-500 rounded hover:bg-green-600">+ Permohonan</a>
                </div>

                {{ $slot }}
            </main>
        </div>
    </div>

    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/gridjs/dist/gridjs.umd.js"></script>

        @yield('scripts-page')
    @endsection
</x-app-layout>
