<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Salon Website</title>
 
</head>
<body>
     
<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-primary mb-3">
    <div class="flex-row d-flex">
        <button type="button" class="navbar-toggler mr-2 " data-toggle="offcanvas" title="Toggle responsive left sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#" title="Free Bootstrap 4 Admin Template">Salon Booking System</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse " id="collapsingNavbar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
   

</nav>
<div class="container-fluid" id="main">
    <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-md-3 col-lg-2 sidebar-offcanvas bg-light pl-0" id="sidebar" role="navigation">
            <ul class="nav flex-column sticky-top pl-0 pt-5 mt-3">
                <li class="nav-item"><a class="nav-link" href="#">Bookings</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="#submenu1" data-toggle="collapse" data-target="#submenu1">Customers</a>
                    <ul class="list-unstyled flex-column pl-3 collapse" id="submenu1" aria-expanded="false">
                       <li class="nav-item"><a class="nav-link" href="">Services</a></li>
                      
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="home.blade.php">Reviews</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Payments</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Review responses</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Booking Details</a></li>
            </ul>
         </div>
     </div>
     
                </div>
              @yield('layouts.tables.dashboardtable')
            </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>

