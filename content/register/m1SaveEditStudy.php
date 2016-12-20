<?php
	sleep(1);
	header("content-type:text/javascript");
	include("../connect.php");
        
        $id = $_POST['id'];
        
	$y = $_POST['year'];
	$yearText = addslashes($y);
        
        $t = $_POST['semister'];
        $termText = addslashes($t);
        
        $start_date = $_POST['start_date'];
        $sdText = addslashes($start_date);
        
        $end_date = $_POST['end_date'];
        $edText = addslashes($end_date);
        
        $common_price = $_POST['common_prize'];
        $cpText = addslashes($common_price);
        
        $status = $_POST['status'];
        $stText = addslashes($status);
        
	$insert = mysqli_query($con, "UPDATE register 
                              SET 
                              start_date='$sdText',
                              end_date='$edText',
                              common_prize='$cpText',
                              tu_id='$stText'
                              WHERE re_id='$id'");


	mysqli_close($con);
        
	echo <<<JS
		loadRegisterContent('masterEdit', 'register', '$id');
JS;
?>