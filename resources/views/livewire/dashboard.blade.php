<div class="container mx-auto p-4">

@role('admin')
<h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>

<!-- ================= STATS ================= -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">

    <div class="stat bg-base-100 shadow rounded-box">
        <div class="stat-title">Total Customers</div>
        <div class="stat-value text-primary">{{ $totalCustomers }}</div>
    </div>

    <div class="stat bg-base-100 shadow rounded-box">
        <div class="stat-title">Total Purchases</div>
        <div class="stat-value text-info">{{ $totalPurchases }}</div>
    </div>

    <div class="stat bg-base-100 shadow rounded-box">
        <div class="stat-title">Total Locations</div>
        <div class="stat-value">{{ $totalLocations }}</div>
    </div>

    <div class="stat bg-base-100 shadow rounded-box">
        <div class="stat-title">Total Sales</div>
        <div class="stat-value text-primary">
            {{ number_format($totalSales) }}
        </div>
        <div class="stat-desc">TK</div>
    </div>

</div>

<!-- ================= FINANCIAL ================= -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">

    <div class="stat bg-base-100 shadow rounded-box">
        <div class="stat-title">Total Paid</div>
        <div class="stat-value text-success">
            {{ number_format($totalPaid) }}
        </div>
        <div class="stat-desc">TK Received</div>
    </div>

    <div class="stat bg-base-100 shadow rounded-box">
        <div class="stat-title">Total Due</div>
        <div class="stat-value text-error">
            {{ number_format($totalDue) }}
        </div>
        <div class="stat-desc">TK (Due / Loss)</div>
    </div>

    <div class="stat bg-base-100 shadow rounded-box">
        <div class="stat-title">Total Profit</div>

        @if($totalProfit >= 0)
            <div class="stat-value text-success">
                {{ number_format($totalProfit) }}
            </div>
            <div class="stat-desc">TK Profit</div>
        @else
            <div class="stat-value text-error">
                {{ number_format(abs($totalProfit)) }}
            </div>
            <div class="stat-desc">TK Loss</div>
        @endif
    </div>

</div>

<!-- ================= CHART ================= -->
<div wire:ignore class="card bg-base-100 shadow">
    <div class="card-body">
        <h3 class="card-title">Monthly Customers & Purchases</h3>
        <canvas id="dashboardChart" height="120"></canvas>
    </div>
</div>

@endrole
</div>


@assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets

@script
<script>
    let dashboardChart;

    const renderDashboardChart = () => {
        const canvas = document.getElementById('dashboardChart');
        if (!canvas || typeof Chart === 'undefined') return;

        dashboardChart?.destroy();
        dashboardChart = new Chart(canvas, {
            type: 'line',
            data: {
                labels: @js($chartLabels),
                datasets: [
                    {
                        label: 'Customers',
                        data: @js($customerChartData),
                        borderColor: '#2563eb',
                        backgroundColor: 'rgba(37, 99, 235, 0.12)',
                        tension: 0.4,
                        fill: true,
                    },
                    {
                        label: 'Purchases',
                        data: @js($purchaseChartData),
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.12)',
                        tension: 0.4,
                        fill: true,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: { y: { beginAtZero: true } },
            },
        });
    };

    renderDashboardChart();
    document.addEventListener('livewire:navigated', renderDashboardChart);
</script>
@endscript
