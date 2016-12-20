<?php
    $id = $_GET['id'];
    $sql = mysqli_query($con, "SELECT sr.*,st.*,re.* FROM student_register sr
         INNER JOIN students st ON sr.st_id=st.st_id
         INNER JOIN register re ON sr.re_id=re.re_id
         WHERE sr_id='$id'
         ");
    $rs = mysqli_fetch_array($sql);
    $f_name = $rs['firstname_rumi'];
    $l_name = $rs['lastname_rumi'];
    $st_id = $rs['st_id'];
    $program = $rs['program'];
    
    //$student_id = $rs['student_id'];
    $student_data = mysqli_query($con, "SELECT st.*,ft.*,dp.* FROM students st
                  INNER JOIN fakultys ft ON st.ft_id=ft.ft_id
                  INNER JOIN departments dp ON st.dp_id=dp.dp_id
                  WHERE st.st_id='$st_id'
                  ");
    $rs_data_student = mysqli_fetch_array($student_data);
    $ft_name = str_replace("\'", "&#39;", $rs_data_student['ft_name']);
    
    //Program data
    $sqlProgram = mysqli_query($con, "SELECT * FROM program WHERE p_id='$program'");
    $rsProgram = mysqli_fetch_array($sqlProgram);
    $programName = $rsProgram['p_name'];
?>
<br>
<div class="well">
    <span class="glyphicon glyphicon-check"></span> <b>DATA PENDAFTARAN :</b> <?= $rs['term_id'] ?>/<?= $rs['academic_year'] ?>
    <hr>
    <form class="form-horizontal" action="?page=payment&&paymentpage=yuransave&&id=<?= $id ?>" enctype="multipart/form-data" method="POST">
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>NO.POKOK :</b><font color="green"> <?= $rs['student_id'] ?></font></p>
            </div>
            <div class="col-lg-6">
                <p><b>FAKULTI / PROGRAM :</b><font color="green"> <?php if($program=='0'){ echo $ft_name; }else{ echo $programName; } ?></font></p>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>NAMA - NASAB :</b><font color="green"> <?= $f_name ?> - <?= $l_name ?></font></p>
            </div>
            <div class="col-lg-6">
                <p><b>JURUSAN :</b> <font color="green"><?= $rs_data_student['dp_name'] ?></font></p>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>TANGGAL DAFTAR :</b><font color="green"> <?= $rs['rs_date'] ?></font></p>
            </div>
            <div class="col-lg-6">
                <p><b>AWAL PEMBAYARAN :</b><font color="green"> <?= $rs['start_date'] ?></font></p>
            </div>
        </div>
        
        <?php
            if($program=='0'){
                $y_prize = $rs['rs_type'];
                if($y_prize=='common_prize'){
                    $yuran = $rs['common_prize'];
                }else{
                    $yuran = $rs['special_prize'];
                }
            }else{
                $yuran = $rs['common_prize'];
            }
        ?>
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>HARGA YURAN :</b><font color="green"> <?= number_format($yuran) ?> ฿</font></p>
            </div>
            <div class="col-lg-6">
                <p><b>AKHIR PEMBAYARAN :</b><font color="green"> <?= $rs['end_date'] ?></font></p>
            </div>
        </div>
        
        <?php 
            $pay_per_day = 3;//ค่าปรับต่อวัน (บาท)

            $return_date     = $rs['end_date'];        //วันที่กำหนดส่งคืน
            $today            = date('Y-m-d');    //วันที่ส่งคืนจริง

            //หาจำนวนวัน กรณีที่วันส่งคืนจริง เลยวันกำหนดส่ง
            $pay = 0;
            $day_late_qty = 0;
            if($today > $return_date){
                $time_today = strtotime($today);        //แปลงวันที่ส่งคืนจริง เป็นตัวเลข timestamp
                $time_return = strtotime($return_date);    //แปลงวันที่กำหนดส่งคืน เป็นตัวเลข timestamp

                $day_late_qty = ($time_today - $time_return) / ( 60 * 60 * 24 ); 
                $pay = ceil($day_late_qty) * $pay_per_day;
            }
            
            //Calculate true penalty.
            if($pay >= '21'){
                $pay = $pay-9;
            }elseif($pay >= '33'){
                $pay = $pay-9;
            }elseif($pay >= '45'){
                $pay = $pay-9;
            }elseif($pay >= '66'){
                $pay = $pay-9;
            }elseif($pay >= '78'){
                $pay = $pay-9;
            }elseif($pay >= '99'){
                $pay = $pay-9;
            }elseif($pay >= '120'){
                $pay = $pay-9;
            }elseif($pay >= '141'){
                $pay = $pay-9;
            }elseif($pay >= '162'){
                $pay = $pay-9;
            }elseif($pay >= '183'){
                $pay = $pay-9;
            }elseif($pay >= '204'){
                $pay = $pay-9;
            }
        ?>
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>DENDA :</b><font color="red"> <?= $pay ?> ฿</font></p>
            </div>
            <div class="col-lg-6">
        <?php
            $pay_status = $rs['pay_status'];
            if($pay_status=='Sudah bayar'){
        
        ?>
                <p><b>STATUS PEMBAYARAN :</b><font color="green"> <b><?= $rs['pay_status'] ?></b></font></p>
        <?php
            }else{
        ?>
                <p><b>STATUS PEMBAYARAN :</b><font color="red"> <b><?= $rs['pay_status'] ?></b></font></p>
        <?php
            }
        ?>
            </div>
        </div>
        
        <hr>
        
        <div class="form-group">
                <label class="col-lg-4 control-label">JUMLAH DUIT :</label> 
                <div class="col-lg-3">
                    <input name="money" class="form-control input-sm" type="number" value="<?= $yuran ?>">
                </div>    
        </div>
        
        <?php
            $registerOpening = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.tu_id='1' AND r.p_id='0'");
            $registerOpeningRow = mysqli_fetch_array($registerOpening);
            $cyear1 = $registerOpeningRow['year'];

            $sql_rc = "SELECT * FROM payments WHERE p_id = (SELECT MAX(p_id) FROM payments)";
            $query_rc = mysqli_query($con, $sql_rc);
            $result_rc = mysqli_fetch_array($query_rc);
            $m_academicyear = $result_rc['academicYear'];

            $cyear = substr($cyear1,2);
            $fcode = 'Y'.$cyear ;
            
            if($cyear1 != $m_academicyear){
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
        
            ?>
        
        <div class="form-group">
                <label class="col-lg-4 control-label">KOD RESIT :</label> 
                <div class="col-lg-3">
                    <input name="reciet_code" class="form-control input-sm" type="text" value="<?= $tmp3 ?>">
                </div>
                <div class="col-lg-3">
                    <p class="text-danger">Resit terakhir : <?= $result_rc['reciet_code'] ?></p>
                </div>
        </div>
        
        <div class="form-group">
                <label class="col-lg-4 control-label">TARIKH BAYAR :</label> 
                <div class="col-lg-3">
                    <input name="pay_date" class="form-control input-sm" type="date" value="<?= date('Y-m-d') ?>">
                </div>    
        </div>
        
        <input type="hidden" name="yuran" value="<?= $yuran ?>"> 
        <input type="hidden" name="st_id" value="<?= $st_id ?>">
        <input type="hidden" name="penalty" value="<?= $pay ?>">
        
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-3">
                <a href="module/payment/reciet.php?id=<?= $id ?>" target="_blank"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> PRINT</button></a>
                <button type="submit" class="btn btn-primary" name="save">SIMPAN</button>
            </div>
        </div>
        
    </form>
    
</div>


