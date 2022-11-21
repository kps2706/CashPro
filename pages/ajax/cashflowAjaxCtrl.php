<?php
require_once("../../includes/connectdb.php");

// FIXIT -- Error report is disable as it create problem in response.
// error_reporting(0);

$response = array();
$output = "";

$request_type = isset($_POST['requestType']) ? $_POST['requestType'] : '';

if ($request_type == 'loadcashtable') {

    $sql = "SELECT * FROM tbl_cashflow order by rec_id DESC";

    $result = $pdo->query($sql);

    $result->execute();

    $output = "<table id='table_id' class='table table-sm table-striped'>
    <thead>
        <tr>
            <th>#</th>
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
                    <td>" . $row['rec_id'] . "</td>
                    <td>" . $row['cash_flow_date'] . "</tb>
                    <td>" . $row['cash_flow_cat'] . "</td>
                    <td>" . $row['cash_flow_amt'] . "</td>
                    <td>" . $row['cash_flow_type'] . "</td>
                    <td>
                    <div class='btn-group btn-group-sm'>
                        <a href='#' data-id=" . $row['rec_id'] . " class='btn btn-warning btn-edit' ><i class='fas fa-edit'></i></a>
                        <a href='#' data-id=" . $row['rec_id'] . " class='btn btn-danger btn-delete'><i class='fas fa-trash'></i></a>
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
    $select = $pdo->prepare("SELECT distinct(cash_flow_cat) FROM tbl_cashflow WHERE cash_flow_type='" . $requestedData . "' ORDER BY cash_flow_cat");

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


        if ($flowType == 'outFlow') {
            # code...
            $Amt = $_POST['cashout'];
            $Cat = ($_POST['out_category_id'] == "others") ? $_POST['other_cat_out'] : $_POST['out_category_id'];
            $Remark = $_POST['out_tranremarks'];
            $recordDate = date("Y-m-d", strtotime($_POST['outflow_rec_date']));

            $sql = "INSERT INTO tbl_cashflow(cash_flow_type, cash_flow_amt, cash_flow_cat, cash_flow_date,cash_flow_remarks) VALUES ('OutFlow','{$Amt}','{$Cat}','{$recordDate}','{$Remark}')";
        } elseif ($flowType == 'inFlow') {

            $Amt = $_POST['cashin'];
            $Cat = ($_POST['in_category_id'] == "others") ? $_POST['other_cat_in'] : $_POST['in_category_id'];
            $Remark = $_POST['in_tranremarks'];
            $recordDate = date("Y-m-d", strtotime($_POST['inflow_rec_date']));

            $sql = "INSERT INTO tbl_cashflow(cash_flow_type, cash_flow_amt, cash_flow_cat, cash_flow_date,cash_flow_remarks) VALUES ('inFlow','{$Amt}','{$Cat}','{$recordDate}','{$Remark}')";
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

//info record delete coding

if ($request_type == 'deleteRecord') {

    $record_id = $_POST['record_id'];

    $sql = $pdo->prepare("DELETE FROM tbl_cashflow WHERE rec_id = :record_ref");

    $sql->execute(array("record_ref" => $record_id));

    if ($sql->rowCount() > 0) {
        $response['deleteStatus'] = TRUE;
    } else {
        $response['deleteStatus'] = FALSE;
    }
}

echo json_encode($response);