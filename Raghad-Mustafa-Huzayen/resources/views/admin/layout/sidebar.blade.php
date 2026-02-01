<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-volleyball-ball"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Yalla Dodge Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Management</div>

    <!-- Games Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.games.index') }}" data-toggle="collapse" data-target="#collapseGames" aria-expanded="true" aria-controls="collapseGames">
            <i class="fas fa-fw fa-volleyball-ball"></i>
            <span>Games</span>
        </a>
        <div id="collapseGames" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Games Management:</h6>
                <a class="collapse-item {{ request()->is('admin/games/create') ? 'active' : '' }}" href="{{ route('admin.games.create') }}">Add New Game</a>
                <a class="collapse-item {{ request()->is('admin/games') ? 'active' : '' }}" href="{{ route('admin.games.index') }}">View All Games</a>
                <a class="collapse-item" href="#">Schedule</a>
            </div>
        </div>
    </li>

    <!-- Bookings Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.private-requests.index') }}" data-toggle="collapse" data-target="#collapseBookings" aria-expanded="true" aria-controls="collapseBookings">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Bookings</span>
        </a>
        <div id="collapseBookings" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Bookings Management:</h6>
                <a class="collapse-item" href="{{ route('admin.bookings.index') }}">All Bookings</a>
                <a class="collapse-item" href="#">Pending</a>
                <a class="collapse-item" href="#">Confirmed</a>
            </div>
        </div>
    </li>

    <!-- Coaches Management -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.coaches.index') }}">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Coaches</span>
        </a>
    </li>

    <!-- Services Management -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.services.index') }}">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Services</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Reports</div>

    <!-- Reports -->
<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('admin.contacts.index') }}" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseReports">
        <i class="fas fa-fw fa-chart-bar"></i>
        <span>Reports</span>
    </a>
    <div id="collapseReports" class="collapse" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Reports & Messages:</h6>
            <a class="collapse-item" href="{{ route('admin.contacts.index') }}">
                Contact Messages
                @if($unreadContacts ?? 0 > 0)
                    <span class="badge badge-danger badge-counter">{{ $unreadContacts }}</span>
                @endif
            </a>
            <a class="collapse-item" href="{{ route('admin.bookings.index') }}">Bookings Report</a>
            <a class="collapse-item" href="{{ route('admin.private-requests.index') }}">Private Requests</a>
        </div>
    </div>
</li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->