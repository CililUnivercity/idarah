<?php
	header("content-type:text/javascript");
	include("../connect.php");
        
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
        
        $special_price = $_POST['special_prize'];
        $spText = addslashes($special_price);
        
        $exam = $_POST['exam'];
        $examText = addslashes($exam);
        
        $status = $_POST['status'];
        $stText = addslashes($status);
        
        $check = mysqli_query($con, "SELECT * FROM register WHERE y_id='$yearText' and term_id='$termText' and p_id='0'");
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
                              ('','$yearText','$termText','$sdText','$edText','$cpText','$spText','$stText','','$exam')");


	mysqli_close($con);
        
	echo <<<JS
		loadRegisterContent('bachelorList', 'register', '');
JS;
        }
?>