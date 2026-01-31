@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
<div class="container-fluid">
    

    <div class="row mt-5">
        

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">Students</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $studentsCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-3x fa-user-graduate text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-success text-uppercase mb-1">Tutors</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tutorsCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-3x fa-chalkboard-teacher text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-info text-uppercase mb-1">Subjects</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $subjectsCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-3x fa-book text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
    </div>

    <div class="row">
        
     
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Monthly Students Registration</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

     
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Users Distribution</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Students ({{ $studentsCount }})
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Tutors ({{ $tutorsCount }})
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctxArea = document.getElementById('myAreaChart').getContext('2d');
    var myAreaChart = new Chart(ctxArea, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'New Students',
                data: [
                    {{ $monthlyStudents->get(1, 0) }},
                    {{ $monthlyStudents->get(2, 0) }},
                    {{ $monthlyStudents->get(3, 0) }},
                    {{ $monthlyStudents->get(4, 0) }},
                    {{ $monthlyStudents->get(5, 0) }},
                    {{ $monthlyStudents->get(6, 0) }},
                    {{ $monthlyStudents->get(7, 0) }},
                    {{ $monthlyStudents->get(8, 0) }},
                    {{ $monthlyStudents->get(9, 0) }},
                    {{ $monthlyStudents->get(10, 0) }},
                    {{ $monthlyStudents->get(11, 0) }},
                    {{ $monthlyStudents->get(12, 0) }}
                ],
                backgroundColor: 'rgba(78, 115, 223, 0.2)',
                borderColor: '#4e73df',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });


    var ctxPie = document.getElementById('myPieChart').getContext('2d');
    var myPieChart = new Chart(ctxPie, {
        type: 'doughnut',
        data: {
            labels: ['Students', 'Tutors'],
            datasets: [{
                data: [{{ $studentsCount }}, {{ $tutorsCount }}],
                backgroundColor: ['#4e73df', '#1cc88a'],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endsection