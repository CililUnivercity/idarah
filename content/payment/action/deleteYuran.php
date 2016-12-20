<?php
    header("content-type: text/javascript");
    include '../../connect.php';
    $id = $_POST['id'];
    $sr_id = $_POST['sr_id'];
    
    $DELETE = mysqli_query($con, "DELETE FROM payments WHERE p_id='$id'");
    $UPDATE = mysqli_query($con, "UPDATE student_register SET pay_status='BELUM LUNAS' WHERE sr_id='$sr_id'");
    echo <<<JS
        loadRegisterContent('yuranPay', 'payment/yuran', '$sr_id');
JS;
?>
