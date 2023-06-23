<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ url('/dashboard') }}"
                class="nav-link {{ Route::currentRouteName() === 'dashboard.index' ? 'active' : '' }}"">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('admin/services/') }}"
                class="nav-link {{ Route::currentRouteName() === 'services.index' ? 'active' : '' }}"">
                <i class="fa fa-book"></i>
                <p>Services</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/employees') }}"
                class="nav-link {{ Route::currentRouteName() === 'employees.index' ? 'active' : '' }}"">
                <i class="fa fa-users"></i>
                <p>Employees</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/customers') }}"
                class="nav-link {{ Route::currentRouteName() === 'customers.index' ? 'active' : '' }}"">
                <i class="fa fa-users" aria-hidden="true"></i>
                <p>Customers</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/bookings') }}"
                class="nav-link {{ Route::currentRouteName() === 'bookings.index' ? 'active' : '' }}"">
                <i class="fa fa-book" aria-hidden="true"></i>
                <p>Bookings</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/payments') }}"
                class="nav-link {{ Route::currentRouteName() === 'payments.index' ? 'active' : '' }}"">
                <i class="nav-icon fas fa-dollar-sign"></i>
                <p>Payments</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/paymentshistory') }}"
                class="nav-link {{ Route::currentRouteName() === 'payments.indexhistory' ? 'active' : '' }}"">
                <i class="nav-icon fas fa-dollar-sign"></i>
                <p>Payments History</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/reports') }}"
                class="nav-link {{ Route::currentRouteName() === 'reports.index' ? 'active' : '' }}"">
                <i class="nav-icon fas fa-chart-bar"></i>
                <p>Reports</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('sms-settings.index') }}"
                class="nav-link {{ Route::currentRouteName() === 'sms-settings.index' ? 'active' : '' }}">
                <i class="fa fa-comment"></i>
                <p>SMS Settings</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/reviews') }}" class="nav-link">
                <i class="nav-icon fas fa-star"></i>
                <p>Reviews</p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
