@extends('layouts.dashboard', ['title' => 'Pengelolaan Data User - Nadia Collection'])

@section('content')
    <div class="flex flex-col gap-10">
        <div class="flex justify-between items-center mb-6">
            <div class="flex flex-col">
                <h1 class="text-2xl font-semibold">👩🏻‍💻 Pengelolaan Data User</h1>
                <p class="text-gray-400 text-sm max-w-md">
                    Lakukan pengelolaan data user mitra Nadia Collection.
                </p>
            </div>
            <div class="flex w-fit gap-3">
                <button data-modal-target="add-user-modal"
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
                        <th scope="col" class="px-6 py-3">Role</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-800">
                    @forelse ($admins as $index => $user)
                        <tr class="transition-all hover:bg-[#f9f9f9]">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->role }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4 flex gap-2">

                                <form action="{{ route('admin.admins.delete') }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value={{ $user->id }}>
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        <i class='bx bx-trash-alt'></i>Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500 dark:text-gray-400">No users found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Adding User -->
    <div id="add-user-modal" tabindex="-1" aria-hidden="true"
        class="fixed inset-0 z-50 hidden overflow-y-auto bg-gray-800 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white w-full max-w-lg p-6 rounded-lg shadow-lg dark:bg-gray-700">
            <div class="flex items-start justify-between mb-4">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Data User
                </h3>
                <button type="button" class="text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white"
                    data-modal-hide>
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('admin.admins.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="username"
                            class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Username</label>
                        <input type="text" id="username" name="username"
                            class="block w-full p-3 border border-gray-300 rounded-lg bg-gray-100 dark:bg-gray-600 dark:text-white focus:border-primary focus:outline-none focus:ring-primary">
                        @error('username')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="name" class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Nama
                            User</label>
                        <input type="text" id="name" name="name"
                            class="block w-full p-3 border border-gray-300 rounded-lg bg-gray-100 dark:bg-gray-600 dark:text-white focus:border-primary focus:outline-none focus:ring-primary">
                        @error('name')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="role" class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Role</label>
                        <input type="text" id="role" name="role"
                            class="block w-full p-3 border border-gray-300 rounded-lg bg-gray-100 dark:bg-gray-600 dark:text-white focus:border-primary focus:outline-none focus:ring-primary">
                        @error('role')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" id="email" name="email"
                            class="block w-full p-3 border border-gray-300 rounded-lg bg-gray-100 dark:bg-gray-600 dark:text-white focus:border-primary focus:outline-none focus:ring-primary">
                        @error('email')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Password</label>
                        <input type="password" id="password" name="password"
                            class="block w-full p-3 border border-gray-300 rounded-lg bg-gray-100 dark:bg-gray-600 dark:text-white focus:border-primary focus:outline-none focus:ring-primary">
                        @error('password')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="mt-6 flex justify-end">
                    <button type="button"
                        class="text-gray-500 bg-gray-200 px-4 py-2 rounded-lg mr-2 hover:bg-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700"
                        data-modal-hide>Cancel</button>
                    <button type="submit"
                        class="text-white bg-primary px-4 py-2 rounded-lg hover:bg-primary-dark focus:ring-4 focus:ring-primary">
                        Tambahkan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modalToggleButtons = document.querySelectorAll('[data-modal-target]');
            const modalHideButtons = document.querySelectorAll('[data-modal-hide]');
            const addModal = document.getElementById('add-user-modal');

            modalToggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetModalId = this.getAttribute('data-modal-target');
                    const modal = document.getElementById(targetModalId);

                    if (modal) {
                        modal.classList.remove('hidden');
                        modal.setAttribute('aria-hidden', 'false');
                        document.body.classList.add('overflow-hidden');
                    }
                });
            });

            modalHideButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetModalId = this.getAttribute('data-modal-hide');
                    const modal = document.getElementById(targetModalId);

                    if (modal) {
                        modal.classList.add('hidden');
                        modal.setAttribute('aria-hidden', 'true');
                        document.body.classList.remove('overflow-hidden');
                    }
                });
            });

            addModal.addEventListener('click', function(event) {
                if (event.target === addModal) {
                    addModal.classList.add('hidden');
                    addModal.setAttribute('aria-hidden', 'true');
                    document.body.classList.remove('overflow-hidden');
                }
            });
        });
    </script>
@endsection
