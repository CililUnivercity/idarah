<?php
	sleep(1);
	header("content-type:text/javascript");
	include("../connect.php");
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

	$insert = mysqli_query($con, "INSERT INTO program 
                              VALUES 
                              ('','$p_nameText','$p_codeText','$p_semCountText','$p_expenseText','$p_adminText','$p_detailText')");

	$searchMax = mysqli_query($con, "SELECT MAX(p_id) FROM program");
	$maxId = mysqli_fetch_row($searchMax);
	$id = $maxId[0];

	mysqli_close($con);

	echo <<<JS
		loadRegisterContent('uploadFile', 'register', $id);
JS;
?>