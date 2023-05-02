<nav class="main-header navbar navbar-expand navbar- navbar-light">
      

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
                <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                
                <a href="#" class="nav-link text-gray-600" data-widget="control-sidebar" data-controlsidebar-slide="true" role="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>


              </li>
    </ul>
  </nav>