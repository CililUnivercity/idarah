<?php
	header("content-type:text/javascript");
	
	include("../connect.php")	;

	$id = $_POST['id'];

	$delete = mysqli_query($con, "DELETE FROM program WHERE p_id='$id'");

	if(mysqli_affected_rows($con)==0){
		echo "alert('ไม่สามารถลบข้อมูลได้')";
	}else{
		echo "var el = document.getElementById('$id');";
		echo "el.style.display = 'none';";
		echo "alert('data berhasil di hapus!')";
	}

	mysqli_close($con);
?>