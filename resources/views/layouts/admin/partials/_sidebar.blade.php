<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <span class="brand-text font-weight-light"><b>JCJ Salon Management</b></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-2 pb-2 mb-2 d-flex">
            <div class="image">
                <img src="images/Logo.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link {{ Route::currentRouteName() === 'dashboard.index' ? 'active' : '' }}"">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/services/') }}" class="nav-link {{ Route::currentRouteName() === 'services.index' ? 'active' : '' }}"">
                        <i class="fa fa-book"></i>
                        <p>Services</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/employees') }}" class="nav-link {{ Route::currentRouteName() === 'employees.index' ? 'active' : '' }}"">
                        <i class="fa fa-users"></i>
                        <p>Employees</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/customers') }}" class="nav-link {{ Route::currentRouteName() === 'customers.index' ? 'active' : '' }}"">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <p>Customers</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/bookings') }}" class="nav-link {{ Route::currentRouteName() === 'bookings.index' ? 'active' : '' }}"">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <p>Bookings</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/payments') }}" class="nav-link {{ Route::currentRouteName() === 'payments.index' ? 'active' : '' }}"">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>Payments</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/reports') }}" class="nav-link {{ Route::currentRouteName() === 'reports.index' ? 'active' : '' }}"">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>Reports</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ Route::currentRouteName() === 'send-sms.index' ? 'active' : '' }}">
                            <a href="{{ route('send-sms.index') }}"
                                class="nav-link {{ Route::currentRouteName() === 'send-sms.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Send Message</p>
                            </a>
                        </li>
                    </ul>
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
    </div>
    <!-- /.sidebar -->
</aside>
