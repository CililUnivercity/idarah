<?php
	sleep(1);
	header("content-type:text/javascript");
	include("../connect.php");
        
        $p_id = $_POST['p_id'];
        
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
        
        $check = mysqli_query($con, "SELECT * FROM register WHERE y_id='$yearText' and term_id='$termText' AND p_id='$p_id'");
        $rs_c = mysqli_fetch_array($check);

        if($rs_c[0] > 0){
        echo <<<JS
		alert("Data sudah ada!");
                document.getElementById('semister').focus();
                document.getElementById('msg').innerHTML = "";
JS;
        }else{
        
	$insert = mysqli_query($con, "INSERT INTO register 
                              VALUES 
                              ('','$yearText','$termText','$sdText','$edText','$cpText','','$stText','$p_id')");
	mysqli_close($con);
        
	echo <<<JS
		loadRegisterContent('masterDetail', 'register', '$p_id');
JS;
        }
?>

