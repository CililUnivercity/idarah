<?php
    header("content-type: text/javascript");
    include("../../connect.php");
    $id = $_POST['id'];
    
    $class = $_POST['class'];
    $classText = addslashes($class);
    
    $UPDATE = mysqli_query($con, "UPDATE students SET class='$classText' WHERE st_id='$id'");
    mysqli_close($con);
       
	echo <<<JS
            loadRegisterContent('studentShow', 'student', '$id');
JS;
?>

