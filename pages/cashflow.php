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
                <?php
                if (isset($_GET['out_rec_edit'])) {
                    echo 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium rerum at id ex rem, eligendi tempore, quasi iure velit nostrum, quas veniam necessitatibus odio perspiciatis.';
                }


                ?>
                <div class="row">
                    <!-- Tab Starts -->
                    <div class="col-sm-12 col-lg-4">
                        <div class="card card-primary card-outline card-outline-tabs ">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Cash_Inflow-tab" data-toggle="pill" href="#custom-tabs-four-cashout" role="tab" aria-controls="custom-tabs-four-cashout" aria-selected="true">Cash
                                            Inflows</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Cash_OutFlow-tab" data-toggle="pill" href="#Cash_OutFlow" role="tab" aria-controls="Cash_OutFlow" aria-selected="false">Cash
                                            Outflows</a>
                                    </li>

                                </ul>
                            </div>
                            <!-- tab content stat here -->
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-four-cashout" role="tabpanel" aria-labelledby="Cash_Inflow-tab">

                                        <!--//info Cash inflow form -->
                                        <form class="form_cashin" id="form_cashin">
                                            <div class="div" id="result_cashin" name="result_cashin"></div>

                                            <div class="form-group">
                                                <label for="cashin">Cash Inflow</label>
                                                <input type="text" class="form-control form-control-border border-width-2" id="cashin" name="cashin" placeholder="Please enter amount." required>
                                            </div>

                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select class="custom-select form-control-border border-width-2" id="in_category_id" name="in_category_id">

                                                </select>
                                            </div>

                                            <!-- //Highlight Dynamic textbox added. -->
                                            <div class="form-group" id="other_cat_in_place">

                                            </div>

                                            <!--//info Cash inflow Section -->

                                            <div class="form-group">
                                                <label>Date:</label>
                                                <div class="input-group date" id="inflowdate" data-target-input="nearest">
                                                    <input type="text" class="form-control-border datetimepicker-input border-width-2" data-target="#inflowdate" name="inflow_rec_date" id="inflow_rec_date" required />
                                                    <div class="input-group-append" data-target="#inflowdate" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="cashout">Tran. Remarks</label>
                                                <input type="text" class="form-control form-control-border border-width-2" id="in_tranremarks" name="in_tranremarks" placeholder="Please enter Tran Remarks." required>
                                            </div>


                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" name="btn_inflow" id="btn_inflow" value="submit">Submit</button>
                                            </div>



                                        </form>


                                    </div>

                                    <!-- //info second tab start here  -->

                                    <div class="tab-pane fade" id="Cash_OutFlow" role="tabpanel" aria-labelledby="Cash_OutFlow-tab">

                                        <form class="cash_outflow" id="form_cashout">
                                            <div class="div" id="result_cashout" name="result_cashout"></div>

                                            <div class="form-group">
                                                <label for="cashout">Cash Outflow</label>
                                                <input type="text" class="form-control form-control-border border-width-2" id="cashout" name="cashout" placeholder="Please enter amount." required>
                                            </div>

                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select class="custom-select form-control-border border-width-2" id="out_category_id" name="out_category_id">
                                                    //Highlight Category is loaded by AJAX Call


                                                </select>
                                            </div>

                                            <!-- //Highlight Dynamic textbox added. -->
                                            <div class="form-group" id="other_cat_out_place">

                                            </div>

                                            <div class="form-group">
                                                <label>Date:</label>
                                                <div class="input-group date" id="outflowdate" data-target-input="nearest">
                                                    <input type="text" class="form-control-border datetimepicker-input border-width-2" data-target="#outflowdate" id="outflow_rec_date" name="outflow_rec_date" data-date-format='yyyy-mm-dd' required />
                                                    <div class="input-group-append" data-target="#outflowdate" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="cashout">Tran. Remarks</label>
                                                <input type="text" class="form-control form-control-border border-width-2" id="out_tranremarks" name="out_tranremarks" placeholder="Please enter Tran Remarks." required>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" name="btn_outflow" id="btn_outflow" value="submit">Submit</button>
                                            </div>



                                        </form>


                                    </div>

                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>


                    <div class="col-sm-12 col-lg-8">
                        <div id='tableContainer'>

                            <!-- //info Record Table added here by Ajax -->
                        </div>



                    </div>
                    <!-- /.card-body-->




                </div>
            </div>
        </div>
        <!-- </div> -->

    </div>

</div>