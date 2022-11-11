<?php

require_once('includes/connectdb.php');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
// To off warning message
error_reporting(E_ERROR | E_PARSE);

?>
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="100" width="100">
</div>
<!-- Content Header (Page header) -->
<div class="content-header myheader ">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <!-- <h1 class="m-0">Dashboard</h1> -->
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="mylink" href="#">Home</a></li>
                    <li class="breadcrumb-item active mylink_active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">

    <div class="row jumbotron elevation-2">
        <div class="col-md-12">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4" data-aos="fade-up">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                        </svg>
                        Dashboard
                    </h1>
                    <p class="lead" data-aos="fade-up" data-aos-delay="150">One Stop Solution for All Financial Needs.
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="row"> -->
    <div class="card card-outline card-primary mycards">
        <div class="card-header">
            <h3 class="card-title">

            </h3>
        </div>
        <div class="card-body">

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info" data-aos="fade-up">
                        <div class="inner">
                            <h3>

                                <?php

                                $select = $pdo->prepare("SELECT cash_flow_amt from tbl_cashflow where cash_flow_type='inflow'");

                                $select->execute();

                                $netsalary = 0;

                                while ($row = $select->fetch(PDO::FETCH_ASSOC)) {

                                    $netsalary = $netsalary + $row['cash_flow_amt'];
                                }

                                echo $netsalary;

                                ?>



                            </h3>

                            <p>Net Salary</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                        <a href="cashflow" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success" data-aos="fade-up" data-aos-delay="150">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning" . data-aos="fade-up" data-aos-delay="300">
                        <div class="inner">
                            <h3>44</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger" data-aos="fade-up" data-aos-delay="450">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

            <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt cum quod quas iusto impedit quos
                ducimus, at perferendis facilis a saepe ullam ad beatae, unde pariatur iste excepturi suscipit
                quibusdam.</p>

        </div>
        <!-- /.card-body -->
    </div>


    <!-- </div> -->
</div>