  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light layout-navbar-fixed">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="dashboard" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="contact" class="nav-link">Contact</a>
          </li>
      </ul>



      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-bell"></i>
                  <span class="badge badge-info navbar-badge">15</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-item dropdown-header">15 Notifications</span>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <i class="fas fa-envelope mr-2"></i> 4 new messages
                      <span class="float-right text-muted text-sm">3 mins</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <i class="fas fa-users mr-2"></i> 8 friend requests
                      <span class="float-right text-muted text-sm">12 hours</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                      <i class="fas fa-file mr-2"></i> 3 new reports
                      <span class="float-right text-muted text-sm">2 days</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
              </div>
          </li>

          <!-- Navbar User Profile -->
          <li class="nav-item dropdown user-menu">

              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
                  <span class="d-none d-md-inline"><?php echo $_SESSION['username']; ?></span>
              </a>


              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <!-- User image -->
                  <li class="user-header" style="background-color: #0061f2;
    background-image: linear-gradient(135deg, #0061f2 0%, rgba(105, 0, 199, 0.8) 100%); color:#fefefe">
                      <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      <p>

                          <?php echo $_SESSION['username'] . ' - ' . $_SESSION['userrole'];
                            $date = date_create($_SESSION['lastlogin']);
                            $date = date_format($date, "d/M/Y H:i:s");

                            echo '<small>Last Login : ' . $date; ?></small>
                      </p>
                  </li>




                  <!-- Menu Body -->
                  <li class="user-body">
                      <div class="row">
                          <div class="col-4 text-center">
                              <a href="#">Followers</a>
                          </div>
                          <div class="col-4 text-center">
                              <a href="#">Sales</a>
                          </div>
                          <div class="col-4 text-center">
                              <a href="#">Friends</a>
                          </div>
                      </div>

                      <!-- /.row -->
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                      <!-- <div class="row"> -->
                      <div class="float-left">
                          <a href="profile" class="btn btn-block btn-outline-primary">Profile</a>
                      </div>
                      <div class="float-right">
                          <a href="logout" class="btn btn-block btn-outline-primary">Sign out</a>
                      </div>
                      <!-- </div> -->
                  </li>
              </ul>

          </li>

          <!-- Messages Dropdown Menu -->

          <!-- Notifications Dropdown Menu -->

      </ul>
  </nav>
  <!-- /.navbar -->