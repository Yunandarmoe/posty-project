@extends('layouts.app')

@section('content')
<div style="width: 900px; margin: 50px auto;">
    <canvas id="myChart" height="100px"></canvas>
</div>
<div class="flex justify-center">
    <script type="text/javascript">
        var labels = <?php echo json_encode($labels) ?>;
        var users = <?php echo json_encode($data) ?>

        const chart = document.getElementById('myChart');
        const myChart = new Chart(chart, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Users Registered Data',
                    backgroundColor: 'rgba(75, 192, 192)',
                    borderColor: 'rgba(75, 192, 192)',
                    data: users,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        })
    </script>
</div>

@endsection