<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    <span class="brand-text font-weight-light">JCJ Salon</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/services/') }}" class="nav-link">
              <i class="fas fa-cog"></i>
              <p>
                Services
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/employees') }}" class="nav-link">
              <i class="fa fa-users"></i>
              <p>
                Employees
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/customers') }}" class="nav-link">
              <i class="fa fa-users" aria-hidden="true"></i>
              <p>
                Customers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/bookings') }}" class="nav-link">
              <i class="fa fa-bars" aria-hidden="true"></i>
              <p>
                Bookings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/payments') }}" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Payments
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/reports') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="{{ url('/settings') }}" class="nav-link">
              <i class="fa fa-cog" aria-hidden="true"></i>
              <p>
                Settings
              </p>
            </a>
          </li> -->
          <li class="nav-item {{ (request()->is('settings/*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('settings/*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ Route::currentRouteName() === 'send-sms.index' ? 'active' : '' }}">
                    <a href="{{ route('send-sms.index') }}" class="nav-link {{ Route::currentRouteName() === 'send-sms.index' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Twillio SMS</p>
                    </a>
                </li>

            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ Route::currentRouteName() === 'clickatell-sms.index' ? 'active' : '' }}">
                    <a href="{{ route('clickatell-sms.index') }}" class="nav-link {{ Route::currentRouteName() === 'clickatell-sms.index' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Clickatell SMS</p>
                    </a>
                </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('/reviews') }}" class="nav-link">
              <i class="nav-icon fas fa-star"></i>
              <p>
                Reviews
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>