<?php
    header("content-type: text/javascript");
    include '../../../connect.php';
    $rs_id = $_POST['rs_id'];
    $delete = mysqli_query($con, "DELETE FROM registerSubject WHERE rs_id='$rs_id'");
    echo "document.getElementById('$rs_id').style.display = 'none'";
?>

