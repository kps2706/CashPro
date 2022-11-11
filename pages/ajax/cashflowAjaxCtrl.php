<?php
require_once("../../includes/connectdb.php");

// FIXIT -- Error report is disable as it create problem in response.
// error_reporting(0);

$response = array();
$output = "";

$request_type = isset($_POST['requestType']) ? $_POST['requestType'] : '';

if ($request_type == 'cashRecordInsert') {

    $outAmt = $_POST['o_amt'];
    $outCat = $_POST['o_cat'];
    $outRemark = $_POST['o_remark'];
    $recordDate = date("Y-m-d", strtotime($_POST['o_rec_date']));

    $sql = "INSERT INTO tbl_cashflow(cash_flow_type, cash_flow_amt, cash_flow_cat, cash_flow_date,cash_flow_remarks) VALUES ('OutFlow','{$outAmt}','{$outCat}','{$recordDate}','{$outRemark}')";

    echo $outAmt;

    // $response['cash_flow_cat'] = $output;
}

// echo json_encode($response);