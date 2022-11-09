<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Services Segment</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashBoard">Home</a></li>
                    <li class="breadcrumb-item active">Services</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">

    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">In Services Segment you can view your salary, change various types of rates, and
                uploads reports and much more.</h3>
        </div>
        <div class="card-body">

            <!-- Tab Start from here -->
            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#home"
                        role="tab" aria-controls="custom-content-above-home" aria-selected="true">Salary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#rates"
                        role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Rates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-above-messages-tab" data-toggle="pill" href="#Uploads"
                        role="tab" aria-controls="custom-content-above-messages" aria-selected="false">Uploads</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-above-settings-tab" data-toggle="pill" href="#settings"
                        role="tab" aria-controls="custom-content-above-settings" aria-selected="false">Settings</a>
                </li>
            </ul>
            <div class="tab-custom-content">
                <p class="lead mb-0">

                    <?php require_once('pages/servicesPages/salaryInfo.php'); ?>


                </p>
            </div>

            <div class="tab-content" id="custom-content-above-tabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel"
                    aria-labelledby="custom-content-above-home-tab">



                    <?php require_once('pages/servicesPages/salary.php'); ?>



                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-block bg-gradient-primary">Update</button>

                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-block btn-outline-success">Save</button>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="rates" role="tabpanel"
                    aria-labelledby="custom-content-above-profile-tab">

                    <div class="row">

                        <?php require_once('pages/servicesPages/rates.php'); ?>

                    </div>



                </div>
                <div class="tab-pane fade" id="Uploads" role="tabpanel"
                    aria-labelledby="custom-content-above-messages-tab">

                    <div class="row">

                        <?php require_once('pages/servicesPages/uploads.php'); ?>

                    </div>


                </div>
                <div class="tab-pane fade" id="settings" role="tabpanel"
                    aria-labelledby="custom-content-above-settings-tab">

                    <div class="row">

                        <?php require_once('pages/servicesPages/settings.php'); ?>

                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
    </div>


</div>