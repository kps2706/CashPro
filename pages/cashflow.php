<?php
ob_start();
require_once('includes/connectdb.php');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
// To off warning message
error_reporting(E_ERROR | E_PARSE);

?>

<!-- Content Header (Page header) -->
<div class="content-header myheader">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <!-- <h1 class="m-0">Goal Planner</h1> -->
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="mylink" href="dashBoard">Home</a></li>
                    <li class="breadcrumb-item active mylink_active">Cash Flow</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">

    <div class="row jumbotron elevation-2">
        <div class="col-md-12 col-6">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4" data-aos="fade-up">
                        <i class=" fas fa-rupee-sign"></i>
                        Cash Flow
                    </h1>
                    <p class="lead" data-aos="fade-up" data-aos-delay="150">All your Cash flows are reported here..!</p>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="row p-25 m-3-mycard "> -->
    <div class="col-md-12">
        <div class="card card-outline card-primary mycards">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>
            <div class="card-body">

                <div class="row">
                    <!-- Tab Starts -->
                    <div class="col-md-6 col-12">
                        <div class="card card-primary card-outline card-outline-tabs ">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                            href="#custom-tabs-four-cashout" role="tab"
                                            aria-controls="custom-tabs-four-cashout" aria-selected="true">Cash
                                            Inflows</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                            href="#custom-tabs-four-profile" role="tab"
                                            aria-controls="custom-tabs-four-profile" aria-selected="false">Cash
                                            Outflows</a>
                                    </li>

                                </ul>
                            </div>
                            <!-- tab content stat here -->
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-four-cashout" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-home-tab">

                                        <!-- Cash inflow form -->
                                        <form action="" method="post" class="cash_inflow">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cashout">Cash Inflow</label>
                                                        <input type="text" class="form-control form-control-border"
                                                            id="cashin" name="cashin" placeholder="Please enter amount."
                                                            required>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="category">Category</label>
                                                        <select class="custom-select form-control-border" id="category"
                                                            name="category">
                                                            <option value="Salary">Salary</option>
                                                            <option value="Petrol">Petrol</option>
                                                            <option value="Rent">Rent</option>
                                                            <option value="Wife Salary">Wife Salary</option>
                                                            <option value="Other Income">Other Income</option>
                                                        </select>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <!--Cash inflow Section -->
                                                    <div class="form-group ">
                                                        <label>Date:</label>
                                                        <div class="input-group date" id="inflowdate"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input"
                                                                data-target="#inflowdate" name="inflow_rec_date"
                                                                required />
                                                            <div class="input-group-append" data-target="#inflowdate"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="cashout">Tran. Remarks</label>
                                                        <input type="text" class="form-control form-control-border"
                                                            id="in_tranremarks" name="in_tranremarks"
                                                            placeholder="Please enter Tran Remarks." required>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <button type="submit" class="form-control btn btn-primary"
                                                            name="btn_inflow" value="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </div>


                                            <?php

                                            // Fixit Cash Inflow Section

                                            if (isset($_POST['btn_inflow'])) {
                                                # code...

                                                // echo 'first';
                                                try {
                                                    //code...
                                                    // $_SESSION['form_submit'] = 'true';

                                                    $out_amt = $_POST['cashin'];
                                                    $out_cat = $_POST['category'];
                                                    $out_date = date("Y-m-d", strtotime($_POST['inflow_rec_date']));
                                                    $out_remarks = $_POST['in_tranremarks'];

                                                    $sql = "INSERT INTO tbl_cashflow(cash_flow_type, cash_flow_amt, cash_flow_cat, cash_flow_date,cash_flow_remarks) VALUES
                                                        ('Inflow','{$out_amt}','{$out_cat}','{$out_date}','{$out_remarks}')";

                                                    $record = $pdo->prepare($sql);

                                                    $record->execute();

                                                    unset($sql);
                                                } catch (PDOException $e) {
                                                    //throw $th;
                                                    die("ERROR: could not able to execute $sql " . $e->getMessage());
                                                }
                                            }
                                            // var_dump($_POST);


                                            ?>

                                        </form>
                                    </div>



                                    <!-- second tab start here  -->
                                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-profile-tab">

                                        <form action="" method="post" class="cash_outflow">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cashout">Cash Outflow</label>
                                                        <input type="text" class="form-control form-control-border"
                                                            id="cashout" name="cashout"
                                                            placeholder="Please enter amount." required>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="category">Category</label>
                                                        <select class="custom-select form-control-border" id="category"
                                                            name="category">
                                                            <option value="Food">Food</option>
                                                            <option value="Cloths">Cloths</option>
                                                            <option value="Education">Education</option>
                                                            <option value="Tea">Tea</option>
                                                            <option value="Refreshment at Office">Refreshment at office
                                                            </option>
                                                            <option value="Credit Card Payment">Credit Card Payment
                                                            </option>
                                                            <option value="Arihant Maintenance">Arihant Maintenance
                                                            </option>
                                                            <option value="Airtel Bill">Airtel Bill</option>
                                                            <option value="Milk">Milk</option>
                                                            <option value="Water">Water</option>
                                                            <option value="Room Rent">Room Rent</option>
                                                            <option value="Diwali Shopping">Diwali Shopping</option>
                                                            <option value="DTH Recharge">DTH Recharge</option>
                                                            <option value="Car Wash">Car Wash</option>
                                                        </select>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Date:</label>
                                                        <div class="input-group date" id="outflowdate"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input"
                                                                data-target="#outflowdate" name="outflow_rec_date"
                                                                required />
                                                            <div class="input-group-append" data-target="#outflowdate"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cashout">Tran. Remarks</label>
                                                        <input type="text" class="form-control form-control-border"
                                                            id="out_tranremarks" name="out_tranremarks"
                                                            placeholder="Please enter Tran Remarks." required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <button type="submit" class="form-control btn btn-primary"
                                                            name="btn_outflow" value="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </div>


                                            <?php
                                            // Fixit Cash outflow section
                                            if (isset($_POST['btn_outflow'])) {

                                                try {
                                                    //code...
                                                    $in_amt = $_POST['cashout'];
                                                    $in_cat = $_POST['category'];
                                                    $in_date = date("Y-m-d", strtotime($_POST['outflow_rec_date']));
                                                    $in_remark = $_POST['out_tranremarks'];

                                                    $sql = "INSERT INTO tbl_cashflow(cash_flow_type, cash_flow_amt, cash_flow_cat, cash_flow_date,cash_flow_remarks) VALUES ('OutFlow','{$in_amt}','{$in_cat}','{$in_date}','{$in_remark}')";

                                                    $insert_sql = $pdo->prepare($sql);

                                                    $insert_sql->execute();
                                                } catch (PDOException $e) {
                                                    //throw $th;
                                                    die("ERROR: could not able to execute $sql " . $e->getMessage());
                                                }
                                            }



                                            ?>

                                        </form>


                                    </div>

                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <!-- DONUT CHART -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Cash Position</h3>


                            </div>
                            <div class="card-body">

                                <canvas id="donutChart"
                                    style="min-height: 218px; height: 250px; max-height: 218px; max-width: 100%;">
                                </canvas>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.card-body-->
            </div>
        </div>
    </div>
    <!-- </div> -->

</div>