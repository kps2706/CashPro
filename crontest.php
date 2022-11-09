<?php

	require_once('includes/connectdb.php');
	
	$rec_id=0;
	
	$select_row = $pdo->prepare("SELECT max(rec_id) from tbl_cron");
	
	$select_row->execute();
	
	$row = $select_row->fetch(PDO::FETCH_ASSOC);
	
	
if ($row['max(rec_id)'] != NULL) {
	
	$rec_id=$row['max(rec_id)']+1;
	
	//echo $rec_id;
	
	$select = $pdo->prepare("SELECT * FROM tbl_nse where rec_id='{$rec_id}'");

    $select->execute();

    $row_for_copy = $select->fetch(PDO::FETCH_ASSOC);
	
	//var_dump($row_for_copy);
	
	$isin_code= $row_for_copy['isin_code'];
	$security_name = $row_for_copy['security_name'];
	$symbol = $row_for_copy['symbol'];
	
	$insert_record = $pdo->prepare("INSERT INTO tbl_cron (isin_code, security_name, symbol) VALUES ('{$isin_code}','{$security_name}','{$symbol}')");
	
	$insert_record->execute();
	
}else{
	$rec_id=1;
	
	//echo $rec_id;
	
	$select = $pdo->prepare("SELECT * FROM tbl_nse where rec_id='{$rec_id}'");

    $select->execute();

    $row_for_copy = $select->fetch(PDO::FETCH_ASSOC);
	
	//var_dump($row_for_copy);
	
	$isin_code= $row_for_copy['isin_code'];
	$security_name = $row_for_copy['security_name'];
	$symbol = $row_for_copy['symbol'];
	
	//echo "INSERT INTO tbl_cron ('isin_code', 'security_name', 'symbol') VALUES ('{$isin_code}','{$security_name}','{$symbol}');";
	
	$insert_record = $pdo->prepare("INSERT INTO tbl_cron (isin_code, security_name, symbol) VALUES ('{$isin_code}','{$security_name}','{$symbol}')");
	
	$insert_record->execute();
}



	

	


//SELECT 'rec_id', 'isin_code', 'symbol', 'security_name', 'series', 'date_of_listing', 'face_value', 'sector', 'market_cap', 'industry', 'record_date', 'del_flag' FROM 'tbl_nse' WHERE 1



//INSERT INTO 'tbl_cron'('rec_id', 'isin_code', 'security_name', 'symbol') VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')


