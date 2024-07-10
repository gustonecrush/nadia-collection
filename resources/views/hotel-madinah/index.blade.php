@extends('layouts.dashboard', [
    'title' => 'Hotel Madinah',
])

@section('content')
    <div class="flex flex-col gap-10">
        <div class="flex justify-between items-center mb-20">
            <div class="flex flex-col ">
                <h1 class="text-2xl font-semibold">🕌 Manajemen Data Hotel Madinah</h1>
                <p class="text-gray-400 text-sm">
                    Lakukan manajemen data hotel madinah untuk dapat dimasukkan pada paket umrah yang tersedia
                </p>
            </div>
            <div class="flex w-fit gap-3">
                <a href='{{ route('admin.hotel-madinah') }}'
                    class="flex gap-2 items-center justify-center bg-[#543310] rounded-xl px-4 py-3 text-white cursor-pointer text-xs">
                    <p>Refresh</p>
                    <i class='bx bx-refresh'></i>
                </a>
                <button data-modal-target="add-hotel-modal" data-modal-toggle="add-hotel-modal"
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
                        <th scope="col" class="px-6 py-3">Nama Hotel</th>
                        <th scope="col" class="px-6 py-3 flex w-full text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hotelMadinahs as $index => $hotelMadinah)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $index + 1 }}
                            </th>
                            <td class="px-6 py-4">{{ $hotelMadinah->nama_hotel_madinah }}</td>
                            <td class="px-6 py-4 flex gap-2">
                                <button data-modal-target="edit-hotel-modal" data-modal-toggle="edit-hotel-modal"
                                    data-hotel-id="{{ $hotelMadinah->id }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <i class='bx bx-edit-alt'></i>Edit
                                </button>
                                <form action="{{ route('admin.hotel-madinah.delete', $hotelMadinah) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="{{ $hotelMadinah->id }}" name="id">
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

    <!-- Add Hotel Modal -->
    <div id="add-hotel-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Tambah Hotel Madinah</h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="add-hotel-modal">
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
                    <form action="{{ route('admin.hotel-madinah.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <div class="mb-2">
                                <label for="nama_hotel_madinah"
                                    class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Nama Hotel</label>
                                <input type="text" id="nama_hotel_madinah" name="nama_hotel_madinah"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-[#543310] focus:outline-[#543310] focus:ring-[#543310] dark:text-white">
                            </div>

                            @error('nama_hotel_madinah')
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

    <!-- Edit Hotel Modal -->
    <div id="edit-hotel-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Edit Hotel Madinah</h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="edit-hotel-modal">
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
                    <form action="{{ route('admin.hotel-madinah.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_hotel_id" name="id">
                        <div class="mb-4">
                            <div class="mb-2">
                                <label for="edit_nama_hotel_madinah"
                                    class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Nama Hotel</label>
                                <input type="text" id="edit_nama_hotel_madinah" name="nama_hotel_madinah"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-[#543310] focus:outline-[#543310] focus:ring-[#543310] dark:text-white">
                            </div>

                            @error('nama_hotel_madinah')
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
            const editButtons = document.querySelectorAll('button[data-modal-target="edit-hotel-modal"]');
            const editModal = document.getElementById('edit-hotel-modal');
            const editNamaHotelMadinah = document.getElementById('edit_nama_hotel_madinah');
            const editHotelId = document.getElementById('edit_hotel_id');

            editButtons.forEach(button => {
                button.addEventListener('click', async function() {
                    const hotelId = this.getAttribute('data-hotel-id');
                    const response = await fetch(`/hotel-madinah/${hotelId}`);
                    const hotel = await response.json();

                    editNamaHotelMadinah.value = hotel.nama_hotel_madinah;
                    editHotelId.value = hotel.id;
                });
            });
        });
    </script>
@endsection
