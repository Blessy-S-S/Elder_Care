<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!-- <img src="assets/images/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text fw-light px-3"><b>Elder Care</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="assets/images/user.png" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <h5 class="text-white">  <?= $_SESSION['admin']['name']; ?> </h5>
          </a>
        </div>
      </div>
      <?php $page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); ?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item ">
              <a href="dashboard.php" class="nav-link <?= $page == "dashboard.php"?'active':''; ?>"><i class="nav-icon fa fa-desktop"></i>
                  <p>Admin Dashboard</p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="inmate_view.php" class="nav-link <?= $page == "inmate_view.php"?'active':''; ?>"><i class="nav-icon fa fa-users"></i>
                  <p>Inmate view</p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="users.php" class="nav-link <?= $page == "users.php"?'active':''; ?>"><i class="nav-icon fa fa-users"></i>
                  <p>Users</p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="bookings.php" class="nav-link <?= $page == "bookings.php"?'active':''; ?>"><i class="nav-icon fa fa-list"></i>
                  <p>Room Bookings</p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="rooms.php" class="nav-link <?= $page == "rooms.php"?'active':''; ?>"><i class="nav-icon fa fa-list"></i>
                  <p>All Rooms</p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="add.php" class="nav-link <?= $page == "add.php"?'active':''; ?>"><i class="nav-icon fa fa-plus"></i>
                  <p>Add Rooms</p>
              </a>
            </li>

            <li class="nav-item ">
              <a href="checkup_update.php" class="nav-link <?= $page == "checkup_update.php"?'active':''; ?>"><i class="nav-icon fa fa-users"></i>
                  <p>Weekly Checkup update</p>
              </a>
            </li>

            <li class="nav-item ">
              <a href="report.php" class="nav-link <?= $page == "report.php"?'active':''; ?>"><i class="nav-icon fa fa-users"></i>
                  <p>Report</p>
              </a>
            </li>

           
          
           
            
           
            
            <?php if($_SESSION['admin']['role'] == "1"): ?>
              <li class="nav-item ">
                <a href="admins.php" class="nav-link <?= $page == "admins.php"?'active':''; ?>"><i class="nav-icon fa fa-user"></i>
                    <p>Manage Staff</p>
                </a>
              </li>
            <?php endif; ?>

            <?php if($_SESSION['admin']['role'] == "0"): ?>
              <li class="nav-item ">
                <a href="medicine_intake.php" class="nav-link <?= $page == "medicine_intake.php"?'active':''; ?>"><i class="nav-icon fa fa-user"></i>
                    <p>Medicine Intake</p>
                </a>
              </li>
            <?php endif; ?>

        
        
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
