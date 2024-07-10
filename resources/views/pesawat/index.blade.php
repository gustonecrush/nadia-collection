@extends('layouts.dashboard', [
    'title' => 'Pesawat',
])

@section('content')
    <div class="flex flex-col gap-10">
        <div class="flex justify-between items-center mb-20">
            <div class="flex flex-col">
                <h1 class="text-2xl font-semibold">✈️ Manajemen Data Pesawat</h1>
                <p class="text-gray-400 text-sm">
                    Lakukan manajemen data pesawat untuk dapat dimasukkan pada paket umrah yang tersedia
                </p>
            </div>
            <div class="flex w-fit gap-3">
                <a href='{{ route('admin.pesawat') }}'
                    class="flex gap-2 items-center justify-center bg-[#543310] rounded-xl px-4 py-3 text-white cursor-pointer text-xs">
                    <p>Refresh</p>
                    <i class='bx bx-refresh'></i>
                </a>
                <button data-modal-target="add-flight-modal" data-modal-toggle="add-flight-modal"
                    class="flex gap-2 items-center justify-center bg-[#543310] rounded-xl px-4 py-3 text-white cursor-pointer text-xs">
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
                        <th scope="col" class="px-6 py-3">Nama Pesawat</th>
                        <th scope="col" class="px-6 py-3 flex w-full text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($flights as $index => $flight)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $index + 1 }}
                            </th>
                            <td class="px-6 py-4">{{ $flight->nama_pesawat }}</td>
                            <td class="px-6 py-4 flex gap-2">
                                <button data-modal-target="edit-flight-modal" data-modal-toggle="edit-flight-modal"
                                    data-flight-id="{{ $flight->id }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <i class='bx bx-edit-alt'></i>Edit
                                </button>
                                <form action="{{ route('admin.pesawat.delete', $flight) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="{{ $flight->id }}" name="id">
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

    <!-- Add Flight Modal -->
    <div id="add-flight-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Tambah Pesawat</h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="add-flight-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form action="{{ route('admin.pesawat.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <div class="mb-2">
                                <label for="nama_pesawat"
                                    class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Nama
                                    Pesawat</label>
                                <input type="text" id="nama_pesawat" name="nama_pesawat"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-[#543310] focus:outline-[#543310] focus:ring-[#543310] dark:text-white">
                            </div>

                            @error('nama_pesawat')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div
                            class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="text-white bg-[#543310] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-[#543310] dark:hover:bg-[#543310] dark:focus:ring-[#543310]">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Flight Modal -->
    <div id="edit-flight-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Edit Pesawat</h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="edit-flight-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form action="{{ route('admin.pesawat.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_flight_id" name="id">
                        <div class="mb-4">
                            <div class="mb-2">
                                <label for="edit_nama_pesawat"
                                    class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Nama
                                    Pesawat</label>
                                <input type="text" id="edit_nama_pesawat" name="nama_pesawat"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-[#543310] focus:outline-[#543310] focus:ring-[#543310] dark:text-white">
                            </div>

                            @error('nama_pesawat')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div
                            class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="text-white bg-[#543310] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-[#543310] dark:hover:bg-[#543310] dark:focus:ring-[#543310]">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to handle modal and data fetching -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('button[data-modal-target="edit-flight-modal"]');
            const editModal = document.getElementById('edit-flight-modal');
            const editNamaPesawat = document.getElementById('edit_nama_pesawat');
            const editFlightId = document.getElementById('edit_flight_id');

            editButtons.forEach(button => {
                button.addEventListener('click', async function() {
                    const flightId = this.getAttribute('data-flight-id');
                    const response = await fetch(`/admin/flights/${flightId}`);
                    const flight = await response.json();

                    editNamaPesawat.value = flight.nama_pesawat;
                    editFlightId.value = flight.id;
                });
            });
        });
    </script>
@endsection
