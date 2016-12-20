<?php
header("content-type: text/javascript");
include '../../connect.php';
    $program = $_POST['program'];
    $st_id = $_POST['st_id'];
    $m_paydate = $_POST['m_paydate'];
    $academicyear = $_POST['m_academicyear'];
    $m_money = $_POST['m_money'];

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

    /*
    $sql_rc = "SELECT * FROM muqaddimah_pay WHERE m_id = (SELECT MAX(m_id) FROM muqaddimah_pay)";
    $query_rc = mysqli_query($con, $sql_rc);
    $result_rc = mysqli_fetch_array($query_rc);
    $m_academicyear = $result_rc['m_academicyear'];

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
    */
    
    $INSERT = mysqli_query($con, "INSERT INTO muqaddimah_pay VALUES ('','','$st_id','$academicyear','$m_paydate','$m_money','')");
    $UPDATE = mysqli_query($con, "UPDATE students SET muqaddimah='1' WHERE st_id='$st_id'");
    
    echo <<<JS
        loadRegisterContent('muqaddimahPay', 'payment/muqaddimah', '$st_id');
JS;
?>

