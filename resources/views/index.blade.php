@extends('layouts.main', [
    'title' => 'Nadia Collection -  Belanja pakaian dan busana terbaik, terpercaya, dan terjamin kualitasnya!',
])

@section('content')
    <div class="w-full h-full relative">

        <section class="w-full h-fit mt-14 relative flex flex-col items-center justify-between text-center">

            <div class="flex flex-col  mx-auto px-8 max-w-3xl">
                <a href="/" class="text-xl font-semibold"><span class="text-gray-300 font-normal">Katalog</span></a>
                <h1 class="text-primary text-4xl font-semibold">Nadia Collection</h1>
            </div>

            @if ($hasilProduksis->isEmpty())
                <div class="w-full max-w-5xl mx-auto flex flex-col items-center mt-9">

                    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="210.63626" height="210.17383"
                        viewBox="0 0 210.63626 210.17383" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path
                            d="M687.3279,276.08691H512.81813a15.01828,15.01828,0,0,0-15,15v387.85l-2,.61005-42.81006,13.11a8.00676,8.00676,0,0,1-9.98974-5.31L315.678,271.39691a8.00313,8.00313,0,0,1,5.31006-9.99l65.97022-20.2,191.25-58.54,65.96972-20.2a7.98927,7.98927,0,0,1,9.99024,5.3l32.5498,106.32Z"
                            transform="translate(-276.18187 -133.91309)" fill="#f2f2f2" />
                        <path
                            d="M725.408,274.08691l-39.23-128.14a16.99368,16.99368,0,0,0-21.23-11.28l-92.75,28.39L380.95827,221.60693l-92.75,28.4a17.0152,17.0152,0,0,0-11.28028,21.23l134.08008,437.93a17.02661,17.02661,0,0,0,16.26026,12.03,16.78926,16.78926,0,0,0,4.96972-.75l63.58008-19.46,2-.62v-2.09l-2,.61-64.16992,19.65a15.01489,15.01489,0,0,1-18.73-9.95l-134.06983-437.94a14.97935,14.97935,0,0,1,9.94971-18.73l92.75-28.4,191.24024-58.54,92.75-28.4a15.15551,15.15551,0,0,1,4.40966-.66,15.01461,15.01461,0,0,1,14.32032,10.61l39.0498,127.56.62012,2h2.08008Z"
                            transform="translate(-276.18187 -133.91309)" fill="#3f3d56" />
                        <path
                            d="M398.86279,261.73389a9.0157,9.0157,0,0,1-8.61133-6.3667l-12.88037-42.07178a8.99884,8.99884,0,0,1,5.9712-11.24023l175.939-53.86377a9.00867,9.00867,0,0,1,11.24072,5.9707l12.88037,42.07227a9.01029,9.01029,0,0,1-5.9707,11.24072L401.49219,261.33887A8.976,8.976,0,0,1,398.86279,261.73389Z"
                            transform="translate(-276.18187 -133.91309)" fill="#ea8f02" />
                        <circle cx="190.15351" cy="24.95465" r="20" fill="#ea8f02" />
                        <circle cx="190.15351" cy="24.95465" r="12.66462" fill="#fff" />
                        <path
                            d="M878.81836,716.08691h-338a8.50981,8.50981,0,0,1-8.5-8.5v-405a8.50951,8.50951,0,0,1,8.5-8.5h338a8.50982,8.50982,0,0,1,8.5,8.5v405A8.51013,8.51013,0,0,1,878.81836,716.08691Z"
                            transform="translate(-276.18187 -133.91309)" fill="#e6e6e6" />
                        <path
                            d="M723.31813,274.08691h-210.5a17.02411,17.02411,0,0,0-17,17v407.8l2-.61v-407.19a15.01828,15.01828,0,0,1,15-15H723.93825Zm183.5,0h-394a17.02411,17.02411,0,0,0-17,17v458a17.0241,17.0241,0,0,0,17,17h394a17.0241,17.0241,0,0,0,17-17v-458A17.02411,17.02411,0,0,0,906.81813,274.08691Zm15,475a15.01828,15.01828,0,0,1-15,15h-394a15.01828,15.01828,0,0,1-15-15v-458a15.01828,15.01828,0,0,1,15-15h394a15.01828,15.01828,0,0,1,15,15Z"
                            transform="translate(-276.18187 -133.91309)" fill="#3f3d56" />
                        <path
                            d="M801.81836,318.08691h-184a9.01015,9.01015,0,0,1-9-9v-44a9.01016,9.01016,0,0,1,9-9h184a9.01016,9.01016,0,0,1,9,9v44A9.01015,9.01015,0,0,1,801.81836,318.08691Z"
                            transform="translate(-276.18187 -133.91309)" fill="#ea8f02" />
                        <circle cx="433.63626" cy="105.17383" r="20" fill="#ea8f02" />
                        <circle cx="433.63626" cy="105.17383" r="12.18187" fill="#fff" />
                    </svg>
                    <p class="text-xl font-semibold text-gray-800 mt-4">No products available at the moment.</p>
                </div>
            @else
                <div class="w-full max-w-5xl mx-auto grid grid-cols-3 gap-5 mt-9">
                    @foreach ($hasilProduksis as $hasilProduksi)
                        <div class="shadow-custom bg-white rounded-lg cursor-pointer">
                            <img src="{{ asset('storage/' . $hasilProduksi->file_foto_produk) }}" alt=""
                                class="object-cover rounded-2xl bg-white p-3 w-full h-[200px]">
                            <div class="flex flex-col gap-2 text-left px-3 pb-4">
                                <p class="text-xl font-semibold"><span
                                        class="text-gray-800">{{ $hasilProduksi->nama_produk }}</span></p>
                                <div class="flex flex-row items-center justify-between -mt-2">
                                    <div class="text-base font-semibold"><span class="text-[#74512D]">Rp.
                                            {{ number_format($hasilProduksi->harga, 0, ',', '.') }}</span></div>
                                    <div class="text-base font-semibold"><span class="text-[#74512D]"><i
                                                class='bx bxs-paper-plane'></i>{{ $hasilProduksi->stok }} pcs</span></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>

        <footer class="p-6 bg-primary dark:text-gray-800 mt-12 !text-white">
            <div class="max-w-4xl grid grid-cols-2 mx-auto gap-x-3 gap-y-8 py-10 sm:grid-cols-2 md:grid-cols-3">
                <div class="flex flex-col space-y-4 mr-5">
                    <a href="/" class="text-4xl font-semibold"><span class="text-secondary">Nadia</span>Collection</a>
                    <span class="mt-3">
                        Belanja pakaian dan busana terbaik, terpercaya, dan terjamin kualitasnya!
                    </span>
                </div>
                <div class="flex flex-col space-y-4">
                    <h2 class="font-medium">Core Concepts</h2>
                    <div class="flex flex-col space-y-2 text-sm ">
                        <a rel="noopener noreferrer" href="#">Utility-First</a>
                        <a rel="noopener noreferrer" href="#">Responsive Design</a>
                        <a rel="noopener noreferrer" href="#">Hover, Focus, &amp; Other States</a>
                        <a rel="noopener noreferrer" href="#">Dark Mode</a>
                        <a rel="noopener noreferrer" href="#">Adding Base Styles</a>
                        <a rel="noopener noreferrer" href="#">Extracting Components</a>
                        <a rel="noopener noreferrer" href="#">Adding New Utilities</a>
                    </div>
                </div>
                <div class="flex flex-col space-y-4">
                    <h2 class="font-medium">Customization</h2>
                    <div class="flex flex-col space-y-2 text-sm ">
                        <a rel="noopener noreferrer" href="#">Configuration</a>
                        <a rel="noopener noreferrer" href="#">Theme Configuration</a>
                        <a rel="noopener noreferrer" href="#">Breakpoints</a>
                        <a rel="noopener noreferrer" href="#">Customizing Colors</a>
                        <a rel="noopener noreferrer" href="#">Customizing Spacing</a>
                        <a rel="noopener noreferrer" href="#">Configuring Variants</a>
                        <a rel="noopener noreferrer" href="#">Plugins</a>
                    </div>
                </div>

            </div>
            <div class="flex items-center justify-center px-6 pt-12 text-sm">
                <span class="">© Copyright 2024. All Rights Reserved.</span>
            </div>
        </footer>
    </div>

    <script>
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 0) {
                header.classList.add('bg-white', 'shadow-custom', 'text-gray-800', 'duration-700',
                    'border-gray-800');
                header.classList.remove('text-white', 'border-white')
            } else {
                header.classList.remove('bg-white', 'shadow-custom', 'text-gray-800', 'border-gray-800');
                header.classList.add('text-white', 'border-white')
            }
        });
    </script>
@endsection
