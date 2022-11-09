<?php
require_once('includes/connectdb.php');

?>
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
                    <li class="breadcrumb-item active mylink_active">Security Uploads</li>
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
                        <i class="fas fa-cloud-upload-alt"></i>
                        Security Upload Section
                    </h1>
                    <p class="lead" data-aos="fade-up" data-aos-delay="150">Various type of Report Upload are done
                        through here.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mycards shadow">
        <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">Bulk Upload Section</h3>
            <ul class="nav nav-pills ml-auto p-2">
                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Bhavcopy Upload</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Historical Price Upload</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Financials Upload</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Cron Jobs</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">

                    <div class="row">

                        <div class="col-6">
                            <b>How to Upload Bhavcopy:</b>

                            <p>Download the Single day Bhavcopy from NSE website and remove the header row and
                                the save file with <code>.xls</code> extension. Then start upload.</p>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="dateofreport">Date of Report</label>
                                    <input type="date" name="dateofreport" class="form-control">
                                    <label for="bhavcopy">File upload</label>
                                    <input type="file" name="bhavcopy" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="btnbhavsubmit" class="btn btn-primary">
                                </div>
                            </form>
                            <?php
                            // require_once('../includes/connectdb.php');

                            require('plugins/PHPExcel/PHPExcel.php');
                            require('plugins/PHPExcel/PHPExcel/IOFactory.php');


                            if (isset($_POST['btnbhavsubmit'])) {

                                $file = $_FILES['bhavcopy']['tmp_name'];
                                // $inputFileType = 'CSV';

                                // print_r($file);

                                $obj = PHPExcel_IOFactory::load($file);

                                foreach ($obj->getWorksheetIterator() as $sheet) {

                                    # code...
                                    $highrow = $sheet->getHighestRow();

                                    // echo $highrow;

                                    for ($i = 1; $i <= $highrow; $i++) {
                                        # code...

                                        $isin_code = $sheet->getCellByColumnAndRow(12, $i)->getValue();
                                        $price = round($sheet->getCellByColumnAndRow(5, $i)->getValue(), 2);
                                        $pre_close = round($sheet->getCellByColumnAndRow(6, $i)->getValue(), 2);
                                        $datefromexcel = $sheet->getCellByColumnAndRow(10, $i)->getValue();
                                        $cmp_date = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($datefromexcel));

                                        $select = $pdo->prepare("SELECT * FROM tbl_cmp_price WHERE isin_code='{$isin_code}' AND cmp_date='{$cmp_date}'");

                                        $select->execute();

                                        $row = $select->fetch(pdo::FETCH_OBJ);

                                        if (empty($row)) {

                                            $selectnse = $pdo->prepare("SELECT isin_code FROM tbl_nse WHERE isin_code='{$isin_code}'");

                                            $selectnse->execute();

                                            $isin_from_db = $selectnse->fetch(pdo::FETCH_OBJ);

                                            if (!empty($isin_from_db)) {

                                                $insert = $pdo->prepare("INSERT INTO tbl_cmp_price( isin_code, cmp_close_price, cmp_preclose_price, cmp_date) 
                                             	VALUES ('{$isin_code}','{$price}','{$pre_close}','{$cmp_date}')");

                                                // echo "'" . $isin_code . "',<br>";

                                                // echo "INSERT INTO tbl_cmp_price( isin_code, cmp_close_price, cmp_preclose_price, cmp_date) 
                                                // -- VALUES ('{$isin_code}','{$price}','{$pre_close}','{$cmp_date}');", "<br>";

                                                $insert->execute();
                                            }
                                        } else {
                                            // echo "Current Price is already updated.";
                                        }
                                    }
                                }
                            }


                            ?>
                        </div>

                    </div>


                </div>

                <div class="tab-pane" id="tab_2">
                    The European languages are members of the same family. Their separate existence is a myth.
                    For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                    in their grammar, their pronunciation and their most common words. Everyone realizes why a
                    new common language would be desirable: one could refuse to pay expensive translators. To
                    achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                    words. If several languages coalesce, the grammar of the resulting language is more simple
                    and regular than that of the individual languages.
                </div>

                <div class="tab-pane" id="tab_3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                    like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
                <div class="tab-pane" id="tab_4">
                    <form action="" method="POST">



                        <input type="submit" name="btn_submit" value="submit">


                        <?php


                        if (isset($_POST['btn_submit'])) {

                            echo '<script type="text/javascript">
                            jQuery(function validation() {
                            swal({
                                title: "Good job!",
                                text: "You clicked the button!",
                                icon: "success",
                                button: "Aww yiss!",
                              });
                            });


                            </script>';
                        }





                        ?>
                    </form>


                </div>
            </div>

        </div>
    </div>


    <!-- </div> -->


</div>