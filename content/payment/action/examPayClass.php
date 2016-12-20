<?php
    header("content-type: text/javascript");
    include("../../connect.php");
    $size = count($_POST['srx_id']);

    //Set class system
    $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register WHERE p_id='0')");
    $rs_register = mysqli_fetch_array($register);
    $money = $rs_register['exam_prize'];
    
    
    $i = 0;
    while ($i < $size) {
            //reciet system
            $registerYear = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register WHERE p_id='0')");
            $registerYearRow = mysqli_fetch_array($registerYear);
            $cyear = $registerYearRow['year'];

            $sql_rc = "SELECT * FROM exam_pay WHERE px_id = (SELECT MAX(px_id) FROM exam_pay)";
            $query_rc = mysqli_query($con, $sql_rc);
            $result_rc = mysqli_fetch_array($query_rc);
            $m_academicyear = $result_rc['academic_year'];

            $cyear1 = substr($cyear,2);
            $fcode = 'P'.$cyear1 ;

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
            
            $pay_status = $_POST['pay_status'][$i];
            if($pay_status != ""){
                $srx_id = $_POST['srx_id'][$i];
                $st_id = $_POST['st_id'][$i];
                $payDate = date("Y-m-d");

                $query = mysqli_query($con, "INSERT INTO exam_pay (srx_id,st_id,pay_date,money,reciet_code,academic_year) VALUES ('$srx_id','$st_id','$payDate','$money','$tmp3','$cyear')");
                $update = mysqli_query($con, "UPDATE student_register_exam SET pay_status='SUDAH LUNAS' WHERE srx_id='$srx_id'"); 
            }else{
            
            }
            ++$i;
    }
    echo <<<JS
        loadRegisterContent('payByClass', 'payment/exam', '');
JS;
?>
