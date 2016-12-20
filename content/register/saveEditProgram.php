<?php
	sleep(1);
	header("content-type:text/javascript");
	include("../connect.php");
        $id = $_GET['id'];
        
	$p_name = $_POST['p_name'];
	$p_nameText = addslashes($p_name);
         
	$p_code = $_POST['p_code'];
	$p_codeText = addslashes($p_code);
        
	$p_semCount = $_POST['p_semCount'];
	$p_semCountText = addslashes($p_semCount);
        
	$p_expense = $_POST['p_expense'];
	$p_expenseText = addslashes($p_expense);
       
	$p_admin = $_POST['p_admin'];
	$p_adminText = addslashes($p_admin);

	$p_detail = $_POST['p_detail'];
	$p_detailText = addslashes($p_detail);
        
	$insert = mysqli_query($con, "UPDATE program SET p_name='$p_nameText',p_code='$p_codeText',p_semCount='$p_semCountText',p_expense='$p_expenseText',p_admin='$p_adminText',p_detail='$p_detailText' WHERE p_id='$id'");
	mysqli_close($con);

	echo <<<JS
            loadRegisterContent('editProgram', 'register', $id);
JS;
?>