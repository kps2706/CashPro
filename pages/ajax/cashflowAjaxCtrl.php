<?php
require_once("../../includes/connectdb.php");

// FIXIT -- Error report is disable as it create problem in response.
// error_reporting(0);

$response = array();
$output = "";

$request_type = isset($_POST['requestType']) ? $_POST['requestType'] : '';

if ($request_type == 'loadcashtable') {

    $sql = "SELECT * FROM tbl_cashflow order by 'cash_flow_date' ASC";

    $result = $pdo->query($sql);

    $result->execute();

    $output = "<table id='table_id' class='table table-sm table-striped'>
    <thead>
        <tr>
            <th>Date</th>
            <th style='width: 40%'>Particulars</th>
            <th>Amount</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>";

    while ($row = $result->fetch(pdo::FETCH_ASSOC)) {
        $output .= "<tr>
                    <td>" . $row['cash_flow_date'] . "</tb>
                    <td>" . $row['cash_flow_cat'] . "</td>
                    <td>" . $row['cash_flow_amt'] . "</td>
                    <td>" . $row['cash_flow_type'] . "</td>

                    <td>
                    
                    <div class='btn-group btn-group-sm'>
                        <a href='?editID=" . $row['rec_id'] . "' class='btn btn-warning' id='out_rec_edit'><i class='fas fa-edit'></i></a>
                        <a href='#' class='btn btn-danger'><i class='fas fa-trash'></i></a>
                    </div>
                    
                    
                    </td>




                    </tr>";
    }

    $output .= "</tbody>
    </table>";

    $response['cashflow_table'] = $output;
}
// info Cash Out Flow Category Load
if ($request_type == 'cashcatload') {

    $requestedData = $_POST['dataType'];
    $cnt = 0;
    $select = $pdo->prepare("SELECT distinct(cash_flow_cat) FROM tbl_cashflow WHERE cash_flow_type='" . $requestedData . "'");

    $select->execute();

    while ($row = $select->fetch(pdo::FETCH_OBJ)) {
        if ($cnt == 0) {
            $output =   "<option value='" . $row->cash_flow_cat . "' selected='selected'>" . $row->cash_flow_cat . "</option>";
        } else {
            $output .=   "<option value='" . $row->cash_flow_cat . "'>" . $row->cash_flow_cat . "</option>";
        }
        $cnt = $cnt + 1;
    }
    $output .=   "<option value='others'>Others</option>";

    $response['cash_flow_cat'] = $output;
}


// info cash out record add

if ($request_type == 'cashRecordInsert') {

    try {
        //code...

        $flowType = $_POST['flow_type'];

        $outAmt = $_POST['o_amt'];
        $outCat = $_POST['o_cat'];
        $outRemark = $_POST['o_remark'];
        $recordDate = date("Y-m-d", strtotime($_POST['o_rec_date']));
        if ($flowType == 'outFlow') {
            # code...
            $sql = "INSERT INTO tbl_cashflow(cash_flow_type, cash_flow_amt, cash_flow_cat, cash_flow_date,cash_flow_remarks) VALUES ('OutFlow','{$outAmt}','{$outCat}','{$recordDate}','{$outRemark}')";
        } elseif ($flowType == 'inFlow') {
            $sql = "INSERT INTO tbl_cashflow(cash_flow_type, cash_flow_amt, cash_flow_cat, cash_flow_date,cash_flow_remarks) VALUES ('inFlow','{$outAmt}','{$outCat}','{$recordDate}','{$outRemark}')";
        }


        $insert_sql = $pdo->prepare($sql);

        $insert_sql->execute();
        if ($insert_sql->rowCount() == 1) {
            $response['status'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> <br> Record ' . $outCat . ' of Rs.' . $outAmt . ' with tran remarks ' . $outRemark . ' inserted successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        } else {
            $response['status'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> <br>Query failed to execute.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>';
        }
    } catch (PDOException $e) {
        //throw $th;

    }
}

echo json_encode($response);