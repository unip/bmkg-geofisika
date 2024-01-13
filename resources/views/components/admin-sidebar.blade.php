<aside class="p-6 bg-white rounded-lg dark:bg-gray-800">
    <h2 class="flex items-center mb-4 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        Menu
    </h2>

    <div class="flex flex-col overflow-hidden rounded-lg">
        <a href="{{ route('admin.dashboard') }}" @class([
            'p-4 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-300',
            'bg-green-200 hover:bg-green-300 dark:bg-green-600 dark:text-white dark:hover:bg-green-700 dark:hover:text-white' => request()->routeIs(
                'admin.dashboard'),
        ])>Dashboard</a>
        <a href="{{ route('admin.sewa-alat.index') }}" @class([
            'p-4 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-300',
            'bg-green-200 hover:bg-green-300 dark:bg-green-600 dark:text-white dark:hover:bg-green-700 dark:hover:text-white' => request()->routeIs(
                'admin.sewa-alat.*'),
        ])>Sewa Alat</a>
        <a href="{{ route('admin.permohonan-magang.index') }}" @class([
            'p-4 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-300',
            'bg-green-200 hover:bg-green-300 dark:bg-green-600 dark:text-white dark:hover:bg-green-700 dark:hover:text-white' => request()->routeIs(
                'admin.permohonan-magang.index'),
        ])>Permohonan
            Magang</a>
        <a href="{{ route('admin.klaim-asuransi.index') }}" @class([
            'p-4 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-300',
            'bg-green-200 hover:bg-green-300 dark:bg-green-600 dark:text-white dark:hover:bg-green-700 dark:hover:text-white' => request()->routeIs(
                'admin.klaim-asuransi.index'),
        ])>Klaim Asuransi</a>
        <a href="{{ route('admin.peta-sebaran.index') }}" @class([
            'p-4 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-300',
            'bg-green-200 hover:bg-green-300 dark:bg-green-600 dark:text-white dark:hover:bg-green-700 dark:hover:text-white' => request()->routeIs(
                'admin.peta-sebaran.index'),
        ])>Peta Sebaran</a>
    </div>
</aside>
