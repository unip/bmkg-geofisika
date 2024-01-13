<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Selamat Datang, {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-3 lg:py-5">
        <div class="grid grid-cols-1 mx-auto gap-y-3 lg:gap-x-5 lg:grid-cols-4 max-w-7xl sm:px-6 lg:px-8">
            @include('components.admin-sidebar')

            <main class="col-span-3 p-6 bg-white rounded-lg">
                <h2 class="flex items-center mb-4 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    {{ $title ?? 'Title' }}
                </h2>

                {{ $slot }}
            </main>
        </div>
    </div>
</x-app-layout>
