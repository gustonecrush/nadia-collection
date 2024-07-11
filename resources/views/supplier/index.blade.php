@extends('layouts.dashboard', [
    'title' => 'Pengelolaan Bahan Mentah - Nadia Collection',
])

@section('content')
    <div class="flex flex-col gap-10">
        <div class="flex justify-between items-center mb-6">
            <div class="flex flex-col ">
                <h1 class="text-2xl font-semibold">🚚 Pengelolaan Data Supplier </h1>
                <p class="text-gray-400 text-sm max-w-md">
                    Lakukan pengelolaan data supplier mitra Nadia Collection.
                </p>
            </div>
            <div class="flex w-fit gap-3">
                <button data-modal-target="add-paket-modal" data-modal-toggle="add-paket-modal"
                    class="flex gap-2 items-center justify-center bg-primary rounded-xl px-4 py-3 text-white cursor-pointer text-xs">
                    <p>Tambah Data</p>
                    <i class='bx bx-plus-circle'></i>
                </button>
            </div>
        </div>
        @if (session('success'))
            <div class="text-green-500">{{ session('success') }}</div>
        @endif
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Alamat</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">No Telpon</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($suppliers as $index => $supplier)
                        <tr class="transition-all hover:bg-[#f9f9f9]">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $supplier->nama }}</td>
                            <td class="px-6 py-4">{{ $supplier->alamat }}</td>
                            <td class="px-6 py-4">{{ $supplier->email }}</td>
                            <td class="px-6 py-4">{{ $supplier->no_telpon }}</td>

                            <td class="px-6 py-4 flex gap-2">
                                <button data-modal-target="edit-hotel-modal" data-modal-toggle="edit-hotel-modal"
                                    data-hotel-id="{{ $supplier->id }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <i class='bx bx-edit-alt'></i>Edit
                                </button>
                                <form action="{{ route('admin.supplier.delete', $supplier) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="{{ $supplier->id }}" name="id">
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        <i class='bx bx-trash-alt'></i>Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Adding Paket Umrah -->
    <div id="add-paket-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-lg max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Data Supplier
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="add-paket-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <form action="{{ route('admin.supplier.store') }}" method="POST">
                        @csrf
                        <div class="flex gap-2 w-full">
                            <div class="mb-4 w-full">
                                <label for="nama"
                                    class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Nama Supplier
                                </label>
                                <input type="text" id="nama" name="nama"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white">
                                @error('nama')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4 w-full">
                                <label for="email"
                                    class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Email
                                </label>
                                <input type="text" id="email" name="email"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white">
                                @error('email')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                        <div class="flex gap-2 w-full">
                            <div class="mb-4 w-full">
                                <label for="alamat"
                                    class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Alamat
                                </label>
                                <input type="text" id="alamat" name="alamat"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white">
                                @error('alamat')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="mb-4 w-full">
                                <label for="no_telpon"
                                    class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">No Telpon
                                </label>
                                <input type="text" id="no_telpon" name="no_telpon"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white">
                                @error('no_telpon')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>



                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit"
                                class="text-white bg-primary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary dark:hover:bg-primary dark:focus:ring-primary">Tambahkan
                                Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include script for modal functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('[data-modal-toggle]');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetModal = this.getAttribute('data-modal-target');
                    const modal = document.getElementById(targetModal);
                    modal.classList.toggle('hidden');
                });
            });

            const closeButtons = document.querySelectorAll('[data-modal-hide]');
            closeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetModal = this.getAttribute('data-modal-hide');
                    const modal = document.getElementById(targetModal);
                    modal.classList.toggle('hidden');
                });
            });
        });
    </script>
@endsection
