<?php
    $size = count($_POST['srx_id']);
    //echo $size;
    
    $register_exam = mysqli_query($con, "SELECT rx.*,y.* FROM register_exam rx INNER JOIN year y ON rx.y_id=y.y_id WHERE rx.tu_id='1'");
    $register_exam_row = mysqli_fetch_array($register_exam);
    $cyear1 = $register_exam_row['year'];
    $cyearA = substr($cyear1,2,3);
    $money = $register_exam_row['prize'];
    
    
    $i = 0;
    while ($i < $size) {
            $sqlpx = mysqli_query($con, "SELECT * FROM exam_pay WHERE px_id = (SELECT MAX(px_id) FROM exam_pay)");
            $sqlpxrow = mysqli_fetch_array($sqlpx);
            $cyear2 = $sqlpxrow['reciet_code'];

            $cyearB = substr($cyear2,1,2);;

            $fcode = 'P'.$cyearA;

            if($cyearA != $cyearB){
                $tmp3=$fcode."/".'0001';
            }else{
                $maxbill = $sqlpxrow['reciet_code'];
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

                $query = mysqli_query($con, "INSERT INTO exam_pay (srx_id,st_id,pay_date,money,reciet_code) VALUES ('$srx_id','$st_id','$payDate','$money','$tmp3')");
                $update = mysqli_query($con, "UPDATE student_register_exam SET pay_status='Sudah bayar' WHERE srx_id='$srx_id'"); 
            }else{
            
            }
            ++$i;
    }
?>

    <script>
        alert("Pembayaran berhasil di rakam");
    </script>
    <meta http-equiv="refresh" content="0; url=?page=finance&&financepage=exam">
