<x-admin-layout>
    <x-slot name="title">Sewa Alat</x-slot>

    @include('components.table-sewa-alat-admin', ['permohonan' => $permohonan])
</x-admin-layout>
