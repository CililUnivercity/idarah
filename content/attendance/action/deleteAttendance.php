<?php
    header("content-type: text/javascript");
    
    include '../../connect.php';
    
    $id = $_POST['id'];
    $DELETE = mysqli_query($con, "DELETE FROM attendance WHERE at_id='$id'");
    
    echo <<<JS
        document.getElementById('$id').style.display = "none";
JS;
?>
