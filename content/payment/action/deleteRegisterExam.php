<?php
	header("content-type:text/javascript");
	
	include("../../connect.php")	;

	$id = $_POST['id'];

	$delete1 = mysqli_query($con, "DELETE FROM student_register_exam WHERE srx_id='$id'");
        $delete2 = mysqli_query($con, "DELETE FROM exam_pay WHERE srx_id='$id'");


		echo "var el = document.getElementById('$id');";
		echo "el.style.display = 'none';";
		echo "alert('data berhasil di hapus!')";
	

	mysqli_close($con);
?>