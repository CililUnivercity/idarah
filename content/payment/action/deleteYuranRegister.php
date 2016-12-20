<?php
	header("content-type:text/javascript");
	
	include("../../connect.php")	;

	$id = $_POST['id'];

	$delete1 = mysqli_query($con, "DELETE FROM student_register WHERE sr_id='$id'");
        $delete2 = mysqli_query($con, "DELETE FROM payments WHERE sr_id='$id'");

		echo "var el = document.getElementById('$id');";
		echo "el.style.display = 'none';";
		echo "alert('data berhasil di hapus!')";

	mysqli_close($con);
?>