@extends('layouts.dashboard', [
    'title' => 'Pengelolaan Bahan Mentah Hasil Produksi - Nadia Collection',
])

@section('content')
    <div class="flex flex-col gap-10">
        <div class="flex justify-between items-center mb-6">
            <div class="flex flex-col ">
                <h1 class="text-2xl font-semibold">👕👚 Pengelolaan Data Bahan Mentah Hasil Produksi</h1>
                <p class="text-gray-400 text-sm max-w-md">
                    Lakukan pengelolaan data hasil produksi untuk Nadia Collection.
                </p>
            </div>
            <div class="flex w-fit gap-3">
                <button data-modal-target="add-produksi-modal" data-modal-toggle="add-produksi-modal"
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
                        <th scope="col" class="px-6 py-3">Nama Barang</th>
                        <th scope="col" class="px-6 py-3">Kuantitas Penggunaan</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($bahanHasilProduksi as $index => $hasilProduksi)
                        <tr class="transition-all hover:bg-[#f9f9f9]">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $hasilProduksi->bahanMentah->nama }}</td>
                            <td class="px-6 py-4">{{ $hasilProduksi->kuantitas }}</td>


                            <td class="px-6 py-4 flex gap-2">


                                <form action="{{ route('admin.bahan-hasil-produksi.delete') }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="{{ $bahanHasilProduksi->id }}" name="id">
                                    <input type="hidden" value="{{ $hasilProduksi->bahanMentah->id }}"
                                        name="id_bahan_mentah">
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        <i class='bx bx-trash-alt'></i>Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal for Editing Produksi -->
                        <div id="edit-produksi-modal-{{ $hasilProduksi->id }}" tabindex="-1" aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-lg max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <div
                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Edit Data Hasil Produksi
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="edit-produksi-modal-{{ $hasilProduksi->id }}">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="p-6 space-y-6">
                                        <form action="{{ route('admin.hasil-produksi.update') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="flex gap-2 w-full">
                                                <div class="mb-4 w-full">
                                                    <label for="nama_produk_{{ $hasilProduksi->id }}"
                                                        class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Nama
                                                        Produk
                                                    </label>
                                                    <input type="hidden" value="{{ $hasilProduksi->id }}" name="id">
                                                    <input type="text" id="nama_produk_{{ $hasilProduksi->id }}"
                                                        name="nama_produk"
                                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white"
                                                        value="{{ $hasilProduksi->nama_produk }}">
                                                    @error('nama_produk')
                                                        <div class="text-red-500">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-4 w-full">
                                                    <label for="harga_{{ $hasilProduksi->id }}"
                                                        class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Harga
                                                        per Satuan
                                                    </label>
                                                    <input type="text" id="harga_{{ $hasilProduksi->id }}"
                                                        name="harga"
                                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white"
                                                        value="{{ number_format($hasilProduksi->harga, 0, ',', '.') }}">
                                                    @error('harga')
                                                        <div class="text-red-500">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="flex gap-2 w-full">
                                                <div class="mb-4 w-full">
                                                    <label for="tanggal_produksi_{{ $hasilProduksi->id }}"
                                                        class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Tanggal
                                                        Produksi
                                                    </label>
                                                    <input type="date" id="tanggal_produksi_{{ $hasilProduksi->id }}"
                                                        name="tanggal_produksi"
                                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white"
                                                        value="{{ $hasilProduksi->tanggal_produksi }}">
                                                    @error('tanggal_produksi')
                                                        <div class="text-red-500">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-4 w-full">
                                                    <label for="stok_{{ $hasilProduksi->id }}"
                                                        class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Stok
                                                    </label>
                                                    <input type="text" id="stok_{{ $hasilProduksi->id }}" name="stok"
                                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white"
                                                        value="{{ $hasilProduksi->stok }}">
                                                    @error('stok')
                                                        <div class="text-red-500">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-4 w-full">
                                                <label for="file_foto_produk_{{ $hasilProduksi->id }}"
                                                    class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">File
                                                    Foto Produk
                                                </label>
                                                <input type="file" id="file_foto_produk_{{ $hasilProduksi->id }}"
                                                    name="file_foto_produk"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white">

                                                @if ($hasilProduksi->file_foto_produk)
                                                    <img src="{{ asset('storage/' . $hasilProduksi->file_foto_produk) }}"
                                                        alt="Foto Produk" class="w-16 h-16 object-cover mt-2">
                                                @endif
                                            </div>
                                            <div class="flex items-center justify-end">
                                                <button type="submit"
                                                    class="text-white bg-primary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary dark:hover:bg-primary dark:focus:ring-primary">Update
                                                    Data</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Adding Produksi -->
    <div id="add-produksi-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-lg max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Data Hasil Produksi
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="add-produksi-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <form action="{{ route('admin.bahan-hasil-produksi.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_hasil_produksi" value={{ $hasilProduksi->id }}>
                        <div class="flex gap-2 w-full">
                            <div class="mb-4 w-full">
                                <label for="id_bahan_mentah"
                                    class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Bahan Mentah
                                </label>
                                <select id="id_bahan_mentah" name="id_bahan_mentah"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white">
                                    <option value="">Pilih Bahan Mentah</option>
                                    @foreach ($bahanMentahs as $bahanMentah)
                                        <option value="{{ $bahanMentah->id }}">
                                            <div class="flex flex-col gap-1">
                                                <p>{{ $bahanMentah->nama }}</p>

                                            </div>
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_bahan_mentah')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>

                        <div class="flex gap-2 w-full">

                            <div class="mb-4 w-full">
                                <label for="kuantitas"
                                    class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Kuantitas
                                </label>
                                <input type="integer" id="kuantitas" name="kuantitas"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:border-primary focus:outline-primary focus:ring-primary dark:text-white">
                                @error('kuantitas')
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
