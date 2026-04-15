@extends('layouts.app')

@section('content')
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card card-stat h-100">
                <div class="card-body">
                    <p class="text-secondary mb-2">Total Products</p>
                    <h3 class="mb-0">{{ number_format($totalProducts) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stat h-100">
                <div class="card-body">
                    <p class="text-secondary mb-2">Total Inventory Value</p>
                    <h3 class="mb-0">${{ number_format($totalInventoryValue, 2) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stat h-100">
                <div class="card-body">
                    <p class="text-secondary mb-2">Average Product Price</p>
                    <h3 class="mb-0">${{ number_format($averagePrice, 2) }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card card-stat h-100">
                <div class="card-header bg-white border-0 pt-3">
                    <h2 class="h6 mb-0">Category Distribution</h2>
                </div>
                <div class="card-body">
                    <canvas id="categoryChart" height="180"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-stat h-100">
                <div class="card-header bg-white border-0 pt-3">
                    <h2 class="h6 mb-0">Average Price by Category</h2>
                </div>
                <div class="card-body">
                    <canvas id="priceChart" height="180"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    <script>
        const categoryLabels = @json($categoryDistribution->keys()->values());
        const categoryValues = @json($categoryDistribution->values());
        const priceLabels = @json($priceByCategory->keys()->values());
        const priceValues = @json($priceByCategory->values());

        new Chart(document.getElementById('categoryChart'), {
            type: 'doughnut',
            data: {
                labels: categoryLabels,
                datasets: [{
                    data: categoryValues,
                    backgroundColor: ['#0ea5e9', '#22c55e', '#f59e0b', '#ef4444', '#8b5cf6', '#14b8a6'],
                    borderWidth: 0,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' },
                },
            },
        });

        new Chart(document.getElementById('priceChart'), {
            type: 'bar',
            data: {
                labels: priceLabels,
                datasets: [{
                    label: 'Average Price',
                    data: priceValues,
                    backgroundColor: '#0f766e',
                    borderRadius: 8,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    </script>
@endpush
