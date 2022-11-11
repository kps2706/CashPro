<?php
require_once("../../includes/connectdb.php");

// FIXIT -- Error report is disable as it create problem in response.
// error_reporting(0);

$response = array();
$output = "";
$industry = isset($_POST['ind']) ? $_POST['ind'] : '';

$request_type = isset($_POST['requestType']) ? $_POST['requestType'] : '';


//Highlight Industry Loand


if ($request_type == 'industryload') {

    $cnt = 0;

    $select = $pdo->prepare("SELECT distinct(industry) FROM tbl_nse");

    $select->execute();

    while ($row = $select->fetch(pdo::FETCH_OBJ)) {
        if ($cnt == 0) {
            $output =   "<option value='" . $row->industry . "' selected='selected'>" . $row->industry . "</option>";
        } else {
            $output .=   "<option value='" . $row->industry . "'>" . $row->industry . "</option>";
        }
        $cnt = $cnt + 1;
    }


    $response['industry'] = $output;
}

//Highlight Market Cap Load with All security list

if ($request_type == 'marketcapload') {

    $cnt = 0;

    $select = $pdo->prepare("SELECT Distinct(market_cap) from tbl_nse where industry='{$industry}' ORDER BY market_cap");

    $select->execute();

    $output = "<option value='All' selected='selected'>All</option>";

    while ($row = $select->fetch(pdo::FETCH_OBJ)) {
        $output .=   "<option value='" . $row->market_cap . "'>" . $row->market_cap . "</option>";
    }
    $response['marketcap'] = $output;


    $output = "";

    $select = $pdo->prepare("SELECT * FROM tbl_nse where industry='{$industry}'");

    $select->execute();

    while ($row = $select->fetch(pdo::FETCH_OBJ)) {
        $output .=   "<option data-secname='" . $row->security_name . "' value='" . $row->isin_code . "'>" . $row->security_name . "</option>";
    }
    $response['securitylist'] = $output;
}

//Highlight Security Load, market cap vise.

if ($request_type == 'securitybymarketcap') {

    $industry = $_POST['ind'];
    $market = $_POST['mar'];

    if ($market == "All") {
        $select = $pdo->prepare("SELECT * FROM tbl_nse where industry='{$industry}' ORDER BY market_cap");
    } else {
        $select = $pdo->prepare("SELECT * FROM tbl_nse where industry='{$industry}' and market_cap='{$market}'");
    }

    $select->execute();

    while ($row = $select->fetch(pdo::FETCH_OBJ)) {
        $output .=   "<option data-secname='" . $row->security_name . "' value='" . $row->isin_code . "'>" . $row->security_name . "</option>";
    }
    $response['securitylist'] = $output;
}

// Highlight Secuirty Info Load

if ($request_type == 'infoLoad') {

    try {
        //code...
        $isin_code = $_POST['isin_code'];

        $select = $pdo->prepare("SELECT * FROM tbl_nse where ISIN_Code='{$isin_code}'");

        $select->execute();

        while ($row = $select->fetch(pdo::FETCH_OBJ)) {

            $response['Security_name'] = $row->security_name;
            $response['Security_symbol'] = $row->symbol;
            $response['industry'] = $row->industry;
            $response['market_cap'] = $row->market_cap;
            $response['security_logo'] = "<img class='img mySecLogo' src='logo/" .  $row->symbol . ".jpg' alt='Security Avatar'>";

            // <img class="img elevation-2" src="logo/bataindia.jpg" alt="User Avatar">
        }

        $select = $pdo->prepare("SELECT * FROM tbl_about where ISIN_Code='{$isin_code}'");

        $select->execute();

        while ($row = $select->fetch(pdo::FETCH_OBJ)) {

            $response['Security_Info'] = $row->about_info;
        }

        $select = $pdo->prepare("SELECT MAX(cmp_date) as cmp_date FROM tbl_cmp_price where ISIN_Code='{$isin_code}'");

        $select->execute();

        $cmp_date_db = NULL;

        while ($row = $select->fetch(pdo::FETCH_OBJ)) {

            $cmp_date_db = $row->cmp_date;
        }

        $select = $pdo->prepare("SELECT * FROM tbl_cmp_price where ISIN_Code='{$isin_code}' AND cmp_date='{$cmp_date_db}'");

        $select->execute();

        while ($row = $select->fetch(pdo::FETCH_OBJ)) {

            $response['Security_Cmp'] = $row->cmp_close_price;
            $cmp_date_db = date_format(date_create($cmp_date_db), "d/M/Y");
            $response['last_update'] = "Updated on : " . $cmp_date_db;
        }
    } catch (PDOException $e) {
        //throw $th;
        echo "Fail " . $e->getMessage();
    }
}




echo json_encode($response);
