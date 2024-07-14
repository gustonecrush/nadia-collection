@extends('layouts.dashboard', [
    'title' => 'Dashboard Admin',
])

@section('content')
    <div class="container mx-auto p-4 -mt-10">
        <h2 class="text-2xl font-semibold mb-4">Dashboard Admin</h2>

        {{-- <div class="mb-4 flex gap-3">
            <a href="{{ route('admin.export.suppliers') }}"
                class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark focus:ring-4 focus:ring-primary">
                Export Suppliers as PDF
            </a>
            <a href="{{ route('admin.export.raw_materials') }}"
                class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark focus:ring-4 focus:ring-primary ml-4">
                Export Raw Materials as PDF
            </a>
            <a href="{{ route('admin.export.production_results') }}"
                class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark focus:ring-4 focus:ring-primary ml-4">
                Export Production Results as PDF
            </a>
        </div> --}}

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="chart-container bg-white p-4 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold mb-4">Suppliers Chart</h3>
                <canvas id="suppliersChart" width="400" height="400"></canvas>
            </div>
            <div class="chart-container bg-white p-4 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold mb-4">Production Results Chart</h3>
                <canvas id="hasilProduksiChart" width="400" height="400"></canvas>
            </div>
            <div class="chart-container bg-white p-4 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold mb-4">Raw Materials Chart</h3>
                <canvas id="bahanMentahChart" width="400" height="400"></canvas>
            </div>
            <!-- Add more charts as needed -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('{{ route('admin.dashboard.data') }}')
                .then(response => response.json())
                .then(data => {
                    const chartConfigs = [{
                            id: 'suppliersChart',
                            type: 'bar',
                            label: 'Suppliers',
                            labels: data.suppliers.map(s => s.nama),
                            data: data.suppliers.map(s => s.id), // Adjust according to your data
                            backgroundColor: '#EA8F02',
                            borderColor: '#FFF4D1'
                        },
                        {
                            id: 'hasilProduksiChart',
                            type: 'line',
                            label: 'Production Results',
                            labels: data.hasilProduksis.map(h => h.tanggal_produksi),
                            data: data.hasilProduksis.map(h => h.harga), // Adjust according to your data
                            backgroundColor: '#EA8F02',
                            borderColor: '#FFF4D1'
                        },
                        {
                            id: 'bahanMentahChart',
                            type: 'pie',
                            label: 'Raw Materials',
                            labels: data.bahanMentahs.map(b => b.nama),
                            data: data.bahanMentahs.map(b => b.kuantitas), // Adjust according to your data
                            backgroundColor: '#EA8F02',
                            borderColor: '#FFF4D1'
                        },
                    ];

                    chartConfigs.forEach(config => {
                        new Chart(document.getElementById(config.id).getContext('2d'), {
                            type: config.type,
                            data: {
                                labels: config.labels,
                                datasets: [{
                                    label: config.label,
                                    data: config.data,
                                    backgroundColor: config.backgroundColor,
                                    borderColor: config.borderColor,
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                            }
                        });
                    });
                });
        });

        function exportPDF(chartId, chartName) {
            const canvas = document.getElementById(chartId);
            const imageData = canvas.toDataURL('image/png');

            const doc = new jsPDF('p', 'mm', 'a4');
            const width = doc.internal.pageSize.getWidth();
            const height = doc.internal.pageSize.getHeight();
            doc.text(`Exported Chart: ${chartName}`, 14, 10);
            doc.addImage(imageData, 'PNG', 10, 20, width - 20, height - 20); // Adjust margins if needed
            doc.save(`${chartId}.pdf`);
        }
    </script>
@endsection
