@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Reports Sales</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>Daily Sales</h3>
                                        <p> ₱100</p> <!-- Replace with actual total of employees -->
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-scissors"></i> <!-- Replace with your desired icon class -->
                                    </div>
                                    <a href="#weekly" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>Weekly Sales</h3>
                                        <p>₱500</p> <!-- Replace with actual total of employees -->
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-scissors"></i> <!-- Replace with your desired icon class -->
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-gradient-warning">
                                    <div class="inner">
                                        <h3>Monthly Sales</h3>
                                        <p>₱1500</p> <!-- Replace with actual total of employees -->
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-scissors"></i> <!-- Replace with your desired icon class -->
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="card-body">
                        <div class="weekly">
                            <div class="timeline">
                                <!-- Timeline time label -->
                                <div class="time-label">
                                    <span class="bg-green">23 May. 2023 </span>
                                </div>
                                <div>
                                    <!-- Before each timeline item corresponds to one icon on the left scale -->
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <!-- Timeline item -->
                                    <div class="timeline-item">
                                        <!-- Time -->
                                        <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                                        <!-- Header. Optional -->
                                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email
                                        </h3>
                                        <!-- Body -->
                                        <div class="timeline-body">
                                            I recently visited this salon for a haircut, and I must say it was an amazing
                                            experience. The stylist was incredibly skilled and understood exactly what I
                                            wanted. She took her time to listen to my preferences and made helpful
                                            suggestions. The haircut turned out even better than \
                                            I had imagined! The salon itself was clean and had a relaxing atmosphere.
                                        </div>
                                        <!-- Placement of additional controls. Optional -->
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-sm">Read more</a>
                                            <a class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- The last icon means the story is complete -->
                                <div>
                                    <i class="fas fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <section class="col-lg-7 connectedSortable ui-sortable">

                            <div class="card">
                                <div class="card-header ui-sortable-handle" style="cursor: move;">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-pie mr-1"></i>
                                        Sales
                                    </h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content p-0">

                                        <div class="chart tab-pane active" id="revenue-chart"
                                            style="position: relative; height: 300px;">
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                            <canvas id="revenue-chart-canvas" height="375"
                                                style="height: 300px; display: block; width: 676px;" width="845"
                                                class="chartjs-render-monitor"></canvas>
                                        </div>
                                        <div class="chart tab-pane" id="sales-chart"
                                            style="position: relative; height: 300px;">
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                            <canvas id="sales-chart-canvas" height="375"
                                                style="height: 300px; display: block; width: 676px;" width="845"
                                                class="chartjs-render-monitor"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-gradient-info">
                                <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                                    <h3 class="card-title">
                                        <i class="fas fa-th mr-1"></i>
                                        Sales Graph
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas class="chart chartjs-render-monitor" id="line-chart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block;"
                                        width="583" height="312"></canvas>
                                </div>

                                <div class="card-footer bg-transparent">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <div class="chart-container"
                                                style="position: relative; height: 75px; width: 75px;">
                                                <canvas id="mail-orders-chart"></canvas>
                                            </div>
                                            <div class="text-white">Mail-Orders</div>
                                        </div>

                                        <div class="col-4 text-center">
                                            <div class="chart-container"
                                                style="position: relative; height: 75px; width: 75px;">
                                                <canvas id="online-chart"></canvas>
                                            </div>
                                            <div class="text-white">Online</div>
                                        </div>

                                        <div class="col-4 text-center">
                                            <div class="chart-container"
                                                style="position: relative; height: 75px; width: 75px;">
                                                <canvas id="in-store-chart"></canvas>
                                            </div>
                                            <div class="text-white">In-Store</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var revenueChartCanvas = document.getElementById('revenue-chart-canvas').getContext('2d');
                var revenueChartData = {
                    labels: ['January', 'February', 'March', 'April', 'May'],
                    datasets: [{
                        label: 'Sales',
                        data: [10, 15, 7, 8, 12],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                };
                var revenueChartOptions = {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                };

                new Chart(revenueChartCanvas, {
                    type: 'bar',
                    data: revenueChartData,
                    options: revenueChartOptions
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                // Retrieve data for the charts
                var mailOrdersData = 20;
                var onlineData = 50;
                var inStoreData = 30;

                // Get chart canvas elements
                var mailOrdersChartCanvas = document.getElementById('mail-orders-chart');
                var onlineChartCanvas = document.getElementById('online-chart');
                var inStoreChartCanvas = document.getElementById('in-store-chart');

                // Create chart objects
                var mailOrdersChart = new Chart(mailOrdersChartCanvas, {
                    type: 'doughnut',
                    data: {
                        labels: ['Mail-Orders'],
                        datasets: [{
                            data: [mailOrdersData],
                            backgroundColor: ['#39CCCC'],
                        }]
                    },
                    options: {
                        cutoutPercentage: 80,
                        legend: {
                            display: false,
                        },
                    }
                });

                var onlineChart = new Chart(onlineChartCanvas, {
                    type: 'doughnut',
                    data: {
                        labels: ['Online'],
                        datasets: [{
                            data: [onlineData],
                            backgroundColor: ['#39CCCC'],
                        }]
                    },
                    options: {
                        cutoutPercentage: 80,
                        legend: {
                            display: false,
                        },
                    }
                });

                var inStoreChart = new Chart(inStoreChartCanvas, {
                    type: 'doughnut',
                    data: {
                        labels: ['In-Store'],
                        datasets: [{
                            data: [inStoreData],
                            backgroundColor: ['#39CCCC'],
                        }]
                    },
                    options: {
                        cutoutPercentage: 80,
                        legend: {
                            display: false,
                        },
                    }
                });
            });
        </script>
    @endsection
