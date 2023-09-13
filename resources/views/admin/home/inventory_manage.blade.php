@extends('admin._layout')
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
<div style="height: 400px; width: 900px; margin: auto;">
    <canvas id="barChartBalanceNumber"></canvas>
</div>
<div style="height: 400px; width: 900px; margin: auto;">
    <canvas id="barChart"></canvas>
</div>
<script>
    $(function () {
        var datas = <?php echo json_encode($balance); ?>;
        datas.reverse();
        var barCanvas = $("#barChart");

        // Get the current month and create an array of month names
        var currentMonth = (new Date()).getMonth(); // 0 to 11
        var monthNames = ['يناير', 'فبراير', 'مارس', 'إبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'];

        // Create an array to hold the labels for the chart
        var labels = [];

        // Populate the labels array with the last 12 months, starting from the current month
        for (var i = currentMonth; i >= currentMonth - 11; i--) {
            if (i < 0) {
                // Handle wrap-around for months before January
                labels.push(monthNames[i + 12]);
            } else {
                labels.push(monthNames[i]);
            }
        }

        labels = labels.reverse(); // Reverse the array to have the current month at the end

        var barChart = new Chart(barCanvas, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: "المبيعات لآخر عدة أشهر",
                    data: datas,
                    backgroundColor: ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet', 'purple', 'pink', 'cyan', 'teal', 'lime'],
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
    $(function () {
        var datas = <?php echo json_encode($orderCounts); ?>;
        datas.reverse();
        var barCanvas = $("#barChartBalanceNumber");

        // Get the current month and create an array of month names
        var currentMonth = (new Date()).getMonth(); // 0 to 11
        var monthNames = ['يناير', 'فبراير', 'مارس', 'إبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'];

        // Create an array to hold the labels for the chart
        var labels = [];

        // Populate the labels array with the last 12 months, starting from the current month
        for (var i = currentMonth; i >= currentMonth - 11; i--) {
            if (i < 0) {
                // Handle wrap-around for months before January
                labels.push(monthNames[i + 12]);
            } else {
                labels.push(monthNames[i]);
            }
        }

        labels = labels.reverse(); // Reverse the array to have the current month at the end

        var barChart = new Chart(barCanvas, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: "عدد الطلبات",
                    data: datas,
                    backgroundColor: ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet', 'purple', 'pink', 'cyan', 'teal', 'lime'],
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection