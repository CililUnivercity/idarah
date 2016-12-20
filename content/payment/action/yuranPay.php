<?php
    header("content-type: text/javascript");
    include '../../connect.php';

    $sr_id = $_POST['sr_id'];
    $st_id = $_POST['st_id'];
    $pay_date = $_POST['pay_date'];
    $penalty = $_POST['penalty'];
    $program = $_POST['program'];
    $money = $_POST['money'];
    $academicYear = $_POST['academicYear'];
    $yuranMoney = $_POST['yuranMoney'];
    
    //reciet code
    if($program=='0'){
        $registerYear = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register WHERE p_id='0')");
        $registerYearRow = mysqli_fetch_array($registerYear);
        $cyear = $registerYearRow['year'];
    }else{
        $registerYear = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register WHERE p_id='$program')");
        $registerYearRow = mysqli_fetch_array($registerYear);
        $cyear = $registerYearRow['year'];
    }

    $sql_rc = "SELECT * FROM payments WHERE p_id = (SELECT MAX(p_id) FROM payments)";
    $query_rc = mysqli_query($con, $sql_rc);
    $result_rc = mysqli_fetch_array($query_rc);
    $m_academicyear = $result_rc['academicYear'];

    $cyear1 = substr($cyear,2);
    $fcode = 'Y'.$cyear1 ;

    if($cyear != $m_academicyear){
        $tmp3=$fcode."/".'0001';
    }else{
        $maxbill = $result_rc['reciet_code'];
        $tmp1=substr($maxbill,4);
        $tmp2 = $tmp1+1;

        if($tmp2 <= 9){$tmp3=$fcode."/".'000'.$tmp2;}
        if($tmp2 > 9 && $tmp2 <= 99){$tmp3=$fcode."/".'00'.$tmp2;}
        if($tmp2 > 99 && $tmp2 <= 999){$tmp3=$fcode."/".'0'.$tmp2;}
        if($tmp2 > 999 && $tmp2 <= 9999){$tmp3=$fcode."/".$tmp2;}
    }
    
    //payment history
    $payHistory = mysqli_query($con, "SELECT * FROM payments WHERE sr_id='$sr_id'");
    $payHistoryRow = mysqli_fetch_array($payHistory);

    //Payment status
    $amountMoneyi = 0;
    $payHistoryi = mysqli_query($con, "SELECT * FROM payments WHERE sr_id='$sr_id'");
    while($payHistoryRowi = mysqli_fetch_array($payHistoryi)){
        $amountMoneyi = $payHistoryRowi['money'] + $amountMoneyi;
    }
    $due = $yuranMoney - $amountMoneyi;

    if($payHistoryRow[0]>0){
        if($money>=$due){
            $pay_status = "SUDAH LUNAS";
        }else{
            $pay_status = "BELUM LUNAS";
        }
    }else{
         if($money>=$due){
            $pay_status = "SUDAH LUNAS";
        }else{
            $pay_status = "BELUM LUNAS";
        }
    }
    
    $INSERT = mysqli_query($con, "INSERT INTO payments VALUES ('','$sr_id','$st_id','$pay_date','$money','$penalty','$tmp3','$academicYear')");
    $UPDATE = mysqli_query($con, "UPDATE student_register SET pay_status='$pay_status' WHERE sr_id='$sr_id'");
    
    echo <<<JS
        loadRegisterContent('yuranPay', 'payment/yuran', '$sr_id');
JS;
?>
