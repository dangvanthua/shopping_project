document.addEventListener('DOMContentLoaded', function () {
    const revenueData = JSON.parse(document.getElementById('revenue-chart').dataset.chartData);
    const statusData = JSON.parse(document.getElementById('order-status-chart').dataset.statusData);

    // Biểu đồ doanh thu
    Highcharts.chart('revenue-chart', {
        chart: { type: 'line' },
        title: { text: 'Doanh thu theo ngày' },
        xAxis: { categories: revenueData.days },
        yAxis: { title: { text: 'Doanh thu (VNĐ)' } },
        series: [
            { name: 'Doanh thu', data: revenueData.revenue }
        ]
    });

    // Biểu đồ trạng thái đơn hàng
    Highcharts.chart('order-status-chart', {
        chart: { type: 'pie' },
        title: { text: 'Trạng thái đơn hàng' },
        series: [
            {
                name: 'Số lượng',
                colorByPoint: true,
                data: statusData
            }
        ]
    });
});
