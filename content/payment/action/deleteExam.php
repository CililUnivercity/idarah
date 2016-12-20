<?php
    header("content-type: text/javascript");
    include("../../connect.php");
    $srx_id = $_POST['srx_id'];
    $id = $_POST['id'];
    
    $DELETE = mysqli_query($con, "DELETE FROM exam_pay WHERE px_id='$id'");
    $UPDATE = mysqli_query($con, "UPDATE student_register_exam SET pay_status='BELUM LUNAS' WHERE srx_id='$srx_id'");
    
    echo <<<JS
        loadRegisterContent('examPay', 'payment/exam', '$srx_id');
JS;
?>

