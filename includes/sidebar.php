<aside class="main-sidebar sidebar-light-primary elevation-2">

    <?php isset($_GET['route']) ? $activemenu = $_GET['route'] : ''; ?>
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="img/cash.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light" style="font-weight: 600 !important;">CASHPRO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="profile" class="d-block"><?php echo $_SESSION['username']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- <li class="nav-header">EXAMPLES</li> -->
                <li class="nav-item">
                    <a href="dashBoard"
                        class="nav-link <?php echo ($activemenu == 'dashBoard') || ($activemenu == '') ? 'active' : ''; ?> ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="cashflow" class="nav-link <?php echo $activemenu == 'cashflow' ? 'active' : ''; ?>">

                        <i class="nav-icon fas fa-rupee-sign"></i>
                        <p>
                            Cash Flow
                            <!-- <span class="badge badge-info right">2</span> -->
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="incomeTax" class="nav-link <?php echo $activemenu == 'incomeTax' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-funnel-dollar"></i>

                        <p>
                            Income Tax
                            <!-- <span class="badge badge-info right">2</span> -->
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="goalPlanner" class="nav-link <?php echo $activemenu == 'goalPlanner' ? 'active' : ''; ?> ">

                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>
                            Goal Planner
                            <!-- <span class="badge badge-info right">2</span> -->
                        </p>
                    </a>
                </li>
                <!-- Investment Section -->
                <li
                    class="nav-item <?php echo ($activemenu == 'invDetails') || ($activemenu == 'mutualFunds') || ($activemenu == 'stocks') ? 'menu-open' : 'menu-close' ?>">
                    <a href="Investment"
                        class="nav-link <?php echo ($activemenu == 'invDetails') || ($activemenu == 'mutualFunds') || ($activemenu == 'stocks') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-umbrella"></i>
                        <p>
                            Investment
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="invDetails"
                                class="nav-link <?php echo $activemenu == 'invDetails' ? 'active' : ''; ?> ">
                                <i class="nav-icon fas fa-info"></i>
                                <p>Details</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="mutualFunds"
                                class="nav-link <?php echo $activemenu == 'mutualFunds' ? 'active' : ''; ?> ">
                                <i class="nav-icon fas fa-hand-holding-usd"></i>

                                <p>Mutual Funds</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="stocks" class="nav-link <?php echo $activemenu == 'stocks' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-seedling"></i>
                                <p>Stocks</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- security Analysis -->
                <li
                    class="nav-item <?php echo ($activemenu == 'secDetails') || ($activemenu == 'secValuation') || ($activemenu == 'secuploads') ? 'menu-open' : 'menu-close' ?>">
                    <a href="security"
                        class="nav-link <?php echo ($activemenu == 'secDetails') || ($activemenu == 'secValuation') || ($activemenu == 'secuploads')  ? 'active' : '' ?>">

                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Security Analysis
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="secDetails"
                                class="nav-link <?php echo $activemenu == 'secDetails' ? 'active' : ''; ?> ">
                                <i class="nav-icon fas fa-info"></i>
                                <p>Security Details</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="secValuation"
                                class="nav-link <?php echo $activemenu == 'secValuation' ? 'active' : ''; ?> ">
                                <i class="fas fa-magic nav-icon"></i>
                                <p>Security Valuation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="secuploads"
                                class="nav-link <?php echo $activemenu == 'secuploads' ? 'active' : ''; ?> ">
                                <i class="nav-icon fas fa-cloud-upload-alt"></i>
                                <p>Uploads</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="services" class="nav-link <?php echo $activemenu == 'services' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Services
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>