<!-- Content Header (Page header) -->
<div class="content-header myheader">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <!-- <h1 class="m-0">Stocks</h1> -->
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="mylink" href="dashBoard">Home</a></li>
                    <li class="breadcrumb-item active mylink_active">Profile</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">

    <div class="row jumbotron">
        <div class="col-md-12">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-activity">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                        </svg>
                        Profile
                    </h1>
                    <p class="lead">Personal Details Section.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row p-25 m-3-mycard"> -->
    <div class="card card-outline card-primary mycards">
        <div class="card-header">
            <h3 class="card-title">Design Segment</h3>
        </div>
        <div class="card-body">

            <div class="row">

                <!-- //info Left section with photo -->
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="dist/img/user2-160x160.jpg"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?php echo $_SESSION['username']; ?></h3>

                            <p class="text-muted text-center"><?php echo $_SESSION['userrole']; ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Followers</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Following</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Friends</b> <a class="float-right">13,287</a>
                                </li>
                            </ul>

                            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->

                <!-- //info Right Section with all details and controlls -->
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#settings"
                                        data-toggle="tab">General Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="#profileSetup" data-toggle="tab">Profile
                                        Setup</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#dbSetup" data-toggle="tab">Database
                                        Setup</a>
                                </li>


                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="settings">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-8">
                                                <input type="text"
                                                    class="form-control form-control-border border-width-2"
                                                    id="inputName" placeholder="Name"
                                                    value="<?php echo $_SESSION['username']; ?>" disabled>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="btn-group btn-group-md">
                                                    <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                    <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputRole" class="col-sm-2 col-form-label">Role</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control form-control-border border-width-2"
                                                    id="inputRole" placeholder="Role"
                                                    value="<?php echo $_SESSION['userrole']; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email"
                                                    class="form-control form-control-border border-width-2"
                                                    id="inputEmail" placeholder="Email"
                                                    value="<?php echo $_SESSION['email']; ?>" disabled>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> I agree to the <a href="#">terms and
                                                            conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->

                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="profileSetup">
                                    <!-- The timeline -->

                                    <div class="form-group">
                                        <div class="row">
                                            <label for="profileController" class="col-sm-8 col-form-label">Deactive your
                                                profile<p class="text-muted" style="font-weight:400 !important ;">You
                                                    can
                                                    reactivate your profile with 14 days.
                                                    After 14
                                                    days your all data will
                                                    be deleted parmanently.</p></label>

                                            <div class="col-sm-4">
                                                <input type="checkbox" name="my-checkbox" data-bootstrap-switch
                                                    data-off-color="success" data-on-color="danger">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="profileController" class="col-sm-8 col-form-label">Change Your
                                                Password<p class="text-muted" style="font-weight:400 !important ;">You
                                                    will get a password reset link on your register email address.</p>
                                            </label>

                                            <div class="col-sm-4">
                                                <input type="checkbox" name="my-checkbox" data-bootstrap-switch
                                                    data-off-color="success" data-on-color="danger">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane" id="dbSetup">
                                    <!-- The timeline -->

                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->






        </div>
        <!-- /.card-body -->
    </div>
    <!-- </div> -->

</div>