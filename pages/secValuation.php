<!-- Content Header (Page header) -->
<div class="content-header myheader">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <!-- <h1 class="m-0">Secuirty Analysis</h1> -->
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="mylink" href="dashBoard">Home</a></li>
                    <li class="breadcrumb-item active mylink_active">Security Valuation</li>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-activity">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                        </svg>
                        Security Valuation
                    </h1>
                    <p class="lead" data-aos="fade-up" data-aos-delay="150">Get Intrinsic value of Your Stocks.</p>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="row p-25 m-3-mycard"> -->
    <div class="card card-outline card-primary mycards">
        <div class="card-header">
            <h3 class="card-title">


            </h3>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            <h4><span class="badge badge-primary">Stock Exchange</span></h4>
                        </th>
                        <th>
                            <h4> <span class="badge badge-primary">Security Industry</span></h4>
                        </th>
                        <th>
                            <h4> <span class="badge badge-primary">Security Market Cap</span></h4>
                        </th>
                        <th>
                            <h4> <span class="badge badge-primary">List of Securities</span></h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><select class="form-control" style="width: 100%; height:auto;">
                                <option selected="selected">NSE</option>
                                <option value="Bse">BSE</option>
                                <option value="Mcx">MCX</option>

                            </select></td>
                        <td>
                            <select class="form-control" style="width: 100%;" name="ind_sel" id="ind_sel">
                                //Highlight Industry Loaded through Ajax call

                            </select>
                        </td>
                        <td>
                            <select class="form-control" style="width: 100%;" id="marketcap_sel" name="marketcap_sel">
                                //Highlight Market Cap Loaded by Ajax call
                            </select>
                        </td>
                        <td><select class="form-control" style="width: 100%;" name="sec_sel" id="sec_sel">
                                //Highlight Securities list are loaded by ajax call

                            </select></td>
                    </tr>

                </tbody>
            </table>


        </div>
        <div class="card-body">

            <div class="row">

                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row ">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light shadow">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Estimated Gross Revenue</span>
                                    <span class="info-box-number text-center text-muted mb-0">2300</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light shadow">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Total amount spent</span>
                                    <span class="info-box-number text-center text-muted mb-0">2000</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light shadow">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Estimated project
                                        duration</span>
                                    <span class="info-box-number text-center text-muted mb-0">20</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">

                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">

                    <div class="card card-widget widget-user-2 shadow">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header">
                            <div class="widget-user-image" id="security_logo">
                                <!-- //highlight logo is load by ajax call -->

                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username" id="Secuirty_Title">security name</h3>
                            <h5 class="widget-user-desc">
                                <span class="badge badge-success" id="Security_Cmp">price</span>

                            </h5>
                            <p class="text-muted text-sm float-middle" id="last_update"> Last update : 1299299</p>
                        </div>
                        <div class="card-body">
                            <b class="d-block">About Security</b>
                            <p class="text-muted" id="Security_About">Raw denim you probably haven't heard of them jean
                                shorts
                                Austin.
                                Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater
                                eu banh mi, qui irure terr.</p>

                            <div class="text-muted">
                                <p class="text-sm">Security Industry
                                    <b class="d-block" id="industry">Deveint Inc</b>
                                </p>
                                <p class="text-sm">Security Market Cap
                                    <b class="d-block" id="market_cap">Tony Chicken</b>
                                </p>
                                <p class="text-sm">Security Code
                                    <b class="d-block" id="Security_symbol">Tony Chicken</b>
                                </p>
                                <p class="text-sm">Security Under Indexes
                                    <b class="d-block">Tony Chicken</b>
                                </p>
                            </div>
                        </div>

                        <div class="card-footer">

                        </div>
                    </div>


                </div>
            </div>

        </div>
        <!-- /.card-body -->
    </div>


    <!-- </div> -->


</div>