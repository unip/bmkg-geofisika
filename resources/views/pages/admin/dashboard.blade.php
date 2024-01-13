<x-app-layout>
    <div class="py-12">
        <div class="grid grid-cols-1 mx-auto gap-y-3 lg:gap-x-3 lg:grid-cols-4 max-w-7xl sm:px-6 lg:px-8">
            @include('components.admin-sidebar')

            <main class="col-span-3 p-6 bg-white rounded-lg">
                <h2 class="flex items-center mb-4 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    {{ $title }}
                </h2>
            </main>
        </div>
    </div>
</x-app-layout>
