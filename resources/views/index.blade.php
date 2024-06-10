@extends('layouts.main', [
    'title' => 'umrahaja - Layanan dan Pendaftaran Umrah PT Putri Cahaya Angkasa Jaya',
])

@section('content')
    <div class="w-full h-full relative">
        <section class="relative h-screen">
            <header class="w-full py-5 bg-transparent z-[9999]  text-white fixed top-0">
                <nav class="max-w-4xl flex mx-auto justify-between items-center">
                    <a href="/" class="text-4xl font-semibold"><span class="text-[#74512D]">umr🕋h</span>aja</a>
                    <ul class="flex gap-6 items-center text-sm">
                        <li>Beranda</li>

                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="text-white flex items-center" type="button">Layanan<svg class="w-2.5 h-2.5 ms-3"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <div id="dropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Umrah</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Umrah
                                        + Trip</a>
                                </li>

                            </ul>
                        </div>

                        <li>Tentang Kami</li>
                        <li>Kontak Kami</li>
                    </ul>
                    <ul class="flex gap-8 items-center text-sm">
                        <li>Daftar</li>

                        <li class="">

                            <!-- Modal toggle -->
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                class="block border border-white rounded-full px-5 py-1 font-semibold" type="button">
                                Login
                            </button>

                            <!-- Main modal -->
                            <div id="default-modal" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[999999999] justify-start items-start w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black bg-opacity-40">
                                <div class="relative p-4 w-full max-w-xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                🕋 Login <span class="text-[#74512D]">umrah</span>aja
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="default-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5 -mt-3 space-y-3">
                                            <p class="text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                                Nikmati kemudahan mencari paket umrah dengan Umrahaja. Dengan harga
                                                terjangkau dan layanan terpercaya, Umrahaja menyediakan perjalanan nyaman
                                                dan aman untuk pengalaman ibadah yang lebih khusyuk dan berkesan.
                                            </p>

                                            <form class="w-full">
                                                <div class="mb-2">
                                                    <label for="small-input"
                                                        class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Email</label>
                                                    <input type="email" id="small-input"
                                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm  focus:border-[#543310] focus:outline-[#543310] focus:ring-[#543310]  dark:text-white ">
                                                </div>
                                                <div>
                                                    <label for="small-input"
                                                        class="block mb-2 font-medium text-gray-500 dark:text-white text-sm">Password</label>
                                                    <input type="password" id="small-input"
                                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm  focus:border-[#543310] focus:outline-[#543310] focus:ring-[#543310]  dark:text-white ">
                                                </div>
                                            </form>

                                        </div>
                                        <!-- Modal footer -->
                                        <div
                                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button data-modal-hide="default-modal" type="button"
                                                class="text-white bg-[#543310] focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                                                Login</button>
                                            <button data-modal-hide="default-modal" type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-[#543310] focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </header>

            <img src="{{ asset('assets/images/hero-img.jpg') }}" alt=""
                class="z-10 absolute w-full h-screen object-cover top-0">

            <div class="w-full h-screen object-cover top-0 z-10 absolute bg-black bg-opacity-50"></div>

            <section class="h-screen z-50 absolute w-full flex gap-5 items-center justify-center flex-col">
                <div class="flex flex-col text-white text-center items-center justify-center gap-3">
                    <h1 class="text-7xl font-bold leading-none" data-aos="fade-up" data-aos-duration="1000">
                        Cari paket umrah <br />mudah dengan <br /><span class="text-[#74512D]">umr🕋h</span>aja
                    </h1>
                    <p class="text-gray-300 max-w-2xl text-sm" data-aos="fade-up" data-aos-delay="500"
                        data-aos-duration="700">
                        Nikmati kemudahan mencari paket umrah dengan Umrahaja. Dengan harga terjangkau dan layanan
                        terpercaya,
                        Umrahaja menyediakan perjalanan nyaman dan aman untuk pengalaman ibadah yang lebih khusyuk dan
                        berkesan.
                    </p>
                </div>
                <div
                    class="max-w-5xl flex flex-row gap-10 items-center justify-center px-5 py-2 shadow-custom bg-white rounded-xl text-sm text-gray-900">
                    <div class="flex gap-2 items-center">
                        <i class='bx bxs-purchase-tag'></i>
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown2" class="flex items-center"
                            type="button">Jenis Paket Umrah<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <div id="dropdown2"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Paket
                                        Platinum</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Paket
                                        Gold</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Paket
                                        Silver</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="w-[1px] h-full rounded-full bg-gray-300 "></div>
                    <div class="flex gap-2">
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown3" class="flex items-center"
                            type="button">Lama Waktu Umrah<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <div id="dropdown3"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">9
                                        Hari</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">13
                                        Hari</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="w-[1px] h-full rounded-full bg-gray-300 "></div>
                    <div class="flex gap-2">
                        <p>Jumlah</p>
                    </div>

                    <div
                        class="flex gap-2 items-center justify-center bg-[#543310] rounded-xl px-4 py-3 text-white cursor-pointer">
                        <p>Cari Paket Umrah</p>
                        <i class='bx bx-search'></i>
                    </div>
                </div>
            </section>
        </section>

        <section class="w-full h-screen relative flex items-center justify-between">
            <div class="w-fit flex">
                <img src="{{ asset('assets/images/feature1.jpg') }}" alt=""
                    class="object-cover rounded-full bg-white p-3 h-[400px]" data-aos="fade-up" data-aos-duration="1000">
                <img src="{{ asset('assets/images/feature2.jpg') }}" alt=""
                    class="object-cover rounded-full bg-white p-3 h-[350px] -ml-20 mt-28" data-aos="fade-up"
                    data-aos-duration="1200" data-aos-delay="500">
                <img src="{{ asset('assets/images/feature3.jpg') }}" alt=""
                    class="object-cover rounded-full bg-white p-3 w-64 h-[380px] -ml-32 -mt-14" data-aos="fade-up"
                    data-aos-duration="1300" data-aos-delay="1000">
            </div>
            <div class="flex flex-col max-w-3xl px-8 ml-24">
                <a href="/" class="text-xl font-semibold"><span class="text-[#74512D]">L🕋yanan</span></a>
                <h1 class="text-4xl font-bold leading-none max-w-md" data-aos="fade-up" data-aos-duration="1000">
                    Menghadirkan paket umrah termurah dan terpercaya
                </h1>
                <p class="text-gray-700 max-w-2xl text-sm mt-3" data-aos="fade-up" data-aos-delay="500"
                    data-aos-duration="700">
                    Nikmati kemudahan mencari paket umrah dengan Umrahaja. Dengan harga terjangkau dan layanan
                    terpercaya,
                    Umrahaja menyediakan perjalanan nyaman dan aman untuk pengalaman ibadah yang lebih khusyuk dan
                    berkesan.
                </p>
                <div class="flex flex-row gap-10 w-full items-center justify-evenly mt-10">
                    <div class="text-3xl font-semibold flex flex-col items-center justify-center text-center"><span
                            class="text-[#74512D]">5+<p class="text-gray-700 max-w-2xl text-sm mt-3" data-aos="fade-up"
                                data-aos-delay="500" data-aos-duration="700">
                                Paket Layanan
                            </p>
                    </div>
                    <div class="text-3xl font-semibold flex flex-col items-center justify-center text-center"><span
                            class="text-[#74512D]">9-20Jt
                            <p class="text-gray-700 max-w-2xl text-sm mt-3" data-aos="fade-up" data-aos-delay="500"
                                data-aos-duration="700">
                                Kisaran Harga
                            </p>
                    </div>
                    <div class="text-3xl font-semibold flex flex-col items-center justify-center text-center"><span
                            class="text-[#74512D]">1000<p class="text-gray-700 max-w-2xl text-sm mt-3" data-aos="fade-up"
                                data-aos-delay="500" data-aos-duration="700">
                                Jamaah Terdaftar
                            </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
