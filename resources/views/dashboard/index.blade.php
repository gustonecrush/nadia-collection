@extends('layouts.dashboard', [
    'title' => 'Dashboard Admin',
])

@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Dashboard Admin</h2>

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
            <div class="chart-container bg-white p-4 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold mb-4">Supplier Distribution</h3>
                <canvas id="supplierDistributionChart" width="400" height="400"></canvas>
            </div>
            <div class="chart-container bg-white p-4 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold mb-4">Production Trends</h3>
                <canvas id="productionTrendsChart" width="400" height="400"></canvas>
            </div>
            <div class="chart-container bg-white p-4 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold mb-4">Raw Material Usage</h3>
                <canvas id="rawMaterialUsageChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        {
                            id: 'supplierDistributionChart',
                            type: 'doughnut',
                            label: 'Supplier Distribution',
                            labels: data.suppliers.map(s => s.nama),
                            data: data.suppliers.map(s => s.id), // Adjust according to your data
                            backgroundColor: '#EA8F02',
                            borderColor: '#FFF4D1'
                        },
                        {
                            id: 'productionTrendsChart',
                            type: 'radar',
                            label: 'Production Trends',
                            labels: data.hasilProduksis.map(h => h.tanggal_produksi),
                            data: data.hasilProduksis.map(h => h.harga), // Adjust according to your data
                            backgroundColor: '#EA8F02',
                            borderColor: '#FFF4D1'
                        },
                        {
                            id: 'rawMaterialUsageChart',
                            type: 'polarArea',
                            label: 'Raw Material Usage',
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
    </script>
@endsection
