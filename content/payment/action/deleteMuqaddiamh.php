<?php
    header("content-type: text/javascript");
    include '../../connect.php';
    $id = $_POST['id'];
    $st_id = $_POST['st_id'];
    
    $DELETE = mysqli_query($con, "DELETE FROM muqaddimah_pay WHERE m_id='$id'");
    $UPDATE = mysqli_query($con, "UPDATE students SET muqaddimah='0' WHERE st_id='$st_id'");
    echo <<<JS
       loadRegisterContent('muqaddimahPay', 'payment/muqaddimah', '$st_id');
JS;
?>