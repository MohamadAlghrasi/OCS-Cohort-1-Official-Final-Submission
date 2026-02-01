@extends('admin.layout.master')

@section('title', 'Dashboard')

@section('content')
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
              <div class="d-none d-sm-inline-block">
                <span class="text-muted">{{ now()->format('F d, Y') }}</span>
              </div>
            </div>

            <!-- Content Row -->
            <div class="row">
              <!-- Total Players Card -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                          Total Players
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          {{ $totalPlayers ?? '0' }}
                        </div>
                        <div class="mt-2 mb-0 text-muted text-xs">
                          <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                          <span>Since last month</span>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Upcoming Games Card -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                          Upcoming Games This Week
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          {{ $upcomingGames ?? '0' }}
                        </div>
                        <div class="mt-2 mb-0 text-muted text-xs">
                          <span class="text-info mr-2"><i class="fas fa-calendar"></i></span>
                          <span>Next: {{ $nextGameDate ?? 'No games scheduled' }}</span>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-volleyball-ball fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Pending Bookings Card -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                          Pending Bookings
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          {{ $pendingBookings ?? '0' }}
                        </div>
                        <div class="mt-2 mb-0 text-muted text-xs">
                          <span class="text-danger mr-2"><i class="fas fa-clock"></i> Needs attention</span>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-clock fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Revenue This Month Card -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                          Revenue (This Month)
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          JOD {{ $monthlyRevenue ?? '0' }}
                        </div>
                        <div class="mt-2 mb-0 text-muted text-xs">
                          <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 18%</span>
                          <span>Since last month</span>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Content Row -->
            <div class="row">
              <!-- Upcoming Games Chart -->
              <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Upcoming Games Schedule</h6>
                    <div class="dropdown no-arrow">
                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">View All Games</a>
                        <a class="dropdown-item" href="#">Add New Game</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Date & Time</th>
                            <th>Game Type</th>
                            <th>Players</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($upcomingGamesList as $game)
                          <tr>
                            <td>{{ $game->date->format('M d, Y') }} at {{ $game->time }}</td>
                            <td>{{ $game->type }}</td>
                            <td>{{ $game->registered_players }}/{{ $game->max_players }}</td>
                            <td>
                              @if($game->status == 'confirmed')
                                <span class="badge badge-success">Confirmed</span>
                              @elseif($game->status == 'pending')
                                <span class="badge badge-warning">Pending</span>
                              @else
                                <span class="badge badge-secondary">Cancelled</span>
                              @endif
                            </td>
                            <td>
                              <a href="{{ route('admin.games.edit', $game->id) }}" class="btn btn-sm btn-primary">Manage</a>
                            </td>
                          </tr>
                          @empty
                          <tr>
                            <td colspan="5" class="text-center">No upcoming games scheduled</td>
                          </tr>
                          @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Recent Bookings -->
              <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Bookings</h6>
                    <div class="dropdown no-arrow">
                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">View All Bookings</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="mt-4">
                      @forelse($recentBookings as $booking)
                      <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h6 class="font-weight-bold mb-1">{{ $booking->player_name }}</h6>
                            <p class="text-muted small mb-0">{{ $booking->game_type }} - {{ $booking->date }}</p>
                          </div>
                          <div>
                            @if($booking->status == 'pending')
                              <span class="badge badge-warning">Pending</span>
                            @elseif($booking->status == 'confirmed')
                              <span class="badge badge-success">Confirmed</span>
                            @elseif($booking->status == 'cancelled')
                              <span class="badge badge-danger">Cancelled</span>
                            @endif
                          </div>
                        </div>
                        <div class="text-right">
                          <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                        </div>
                        <hr class="my-2">
                      </div>
                      @empty
                      <p class="text-center text-muted">No recent bookings</p>
                      @endforelse
                    </div>
                  </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
                  </div>
                  <div class="card-body">
                    <div class="text-center">
                      <div class="row">
                        <div class="col-6 mb-3">
                          <a href="{{ route('admin.games.create') }}" class="btn btn-primary btn-block">
                            <i class="fas fa-plus"></i><br>
                            <small>Add Game</small>
                          </a>
                        </div>
                        <div class="col-6 mb-3">
                          <a href="{{ route('admin.private-requests.index') }}" class="btn btn-success btn-block">
                            <i class="fas fa-calendar-plus"></i><br>
                            <small>New Booking</small>
                          </a>
                        </div>
                        <div class="col-6">
                          <a href="{{ route('admin.services.create') }}" class="btn btn-info btn-block">
                            <i class="fas fa-users"></i><br>
                            <small>Services</small>
                          </a>
                        </div>
                        <div class="col-6">
                          <a href="{{ route('admin.coaches.create') }}" class="btn btn-warning btn-block">
                            <i class="fas fa-user-tie"></i><br>
                            <small>Add Coach</small>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Content Row -->
            <div class="row">
              <!-- Player Registration Activity -->
              <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Player Registration Activity</h6>
                  </div>
                  <div class="card-body">
                    <div class="chart-bar">
                      <canvas id="playerActivityChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Game Statistics -->
              <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Game Statistics</h6>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <div class="card border-left-primary shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                  Weekly Games
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                  {{ $weeklyGamesCount ?? '0' }}
                                </div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-calendar-week fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <div class="card border-left-success shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                  Private Games
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                  {{ $privateGamesCount ?? '0' }}
                                </div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="card border-left-info shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                  Avg. Players/Game
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                  {{ $avgPlayersPerGame ?? '0' }}
                                </div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="card border-left-warning shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                  Occupancy Rate
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                  {{ $occupancyRate ?? '0' }}%
                                </div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-percentage fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
      </div>
      <!-- End of Content Wrapper -->

<!-- Chart Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Player Activity Chart
document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('playerActivityChart').getContext('2d');
    var playerActivityChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'New Players',
                data: [12, 19, 15, 25, 22, 30, 28, 35, 40, 38, 42, 50],
                backgroundColor: 'rgba(78, 115, 223, 0.8)',
                borderColor: 'rgba(78, 115, 223, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value + ' players';
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
});
</script>
@endsection