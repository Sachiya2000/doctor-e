<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Client Bar Chart</h1>
            <div class="bar-chart block no-margin-bottom">
                <canvas id="chart"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('chart').getContext('2d');
    var userChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: {!! json_encode($datasets) !!}
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
