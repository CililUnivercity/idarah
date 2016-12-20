<?php
    include("../../connect.php");
    $id = $_GET['id']; //For student_register table
    
    //-----------------------------------------------------------------------------------------
    //Data from student_register table
    $student_register = mysqli_query($con, "SELECT * FROM student_register WHERE sr_id='$id'");
    $student_registerRow = mysqli_fetch_array($student_register);
    $st_id = $student_registerRow['st_id'];
    $re_id = $student_registerRow['re_id'];
    $rs_type = $student_registerRow['rs_type'];
    $sr_id = $student_registerRow['sr_id'];
    
    //-----------------------------------------------------------------------------------------
    //Student data
    $student = mysqli_query($con, "SELECT * FROM students WHERE st_id='$st_id'");
    $studentRow = mysqli_fetch_array($student);
    
    $studentId = $studentRow['st_id'];
    $program = $studentRow['program'];
    $student_Id = $studentRow['student_id'];
    $fname = str_replace("\'", "&#39;", $studentRow["firstname_rumi"]);
    $lname = str_replace("\'", "&#39;", $studentRow["lastname_rumi"]);
    $program = $studentRow['program'];
    $ft_id = $studentRow['ft_id'];
    $dp_id = $studentRow['dp_id'];
    
    $faculty = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$ft_id'");
    $facultyRow = mysqli_fetch_array($faculty);
    $ftName = str_replace("\'", "&#39;", $facultyRow["ft_name"]);
    
    $department = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$dp_id'");
    $departmentRow = mysqli_fetch_array($department);
    $dpName = str_replace("\'", "&#39;", $departmentRow["dp_name"]);
    
    $programData = mysqli_query($con, "SELECT * FROM program WHERE p_id='$program'");
    $programDataRow = mysqli_fetch_array($programData);
    $programName = str_replace("\'", "&#39;", $programDataRow["p_name"]);
    
    //faculty or program
    if($program=='0'){
        $ftNameShow = $ftName;
    }else{
        $ftNameShow = $programName;
    }
    
    //department
    if($dp_id=='0'){
        $dpNameShow = $dpName;
    }else{
        $dpNameShow = ""
;    }
    
    //-----------------------------------------------------------------------------------------
    //Get student photo
    $photo = mysqli_query($con, "SELECT * FROM image WHERE st_id='$studentId'");
    $photoRow = mysqli_fetch_array($photo);
    $photoResult = $photoRow['images'];
    
    //-----------------------------------------------------------------------------------------
    //register table data 
    $register = mysqli_query($con, "SELECT * FROM register WHERE re_id='$re_id'");
    $registerRow = mysqli_fetch_array($register);
    
    $yuranMoney = '';
    if($program=='0'){
        if($rs_type=='special_prize'){
            $yuranMoney = $registerRow['special_prize'];
        }else{
            $yuranMoney = $registerRow['common_prize'];
        }
    }else{
        $yuranMoney = $registerRow['common_prize'];
    }
    
    //-----------------------------------------------------------------------------------------
    //Penalty system
    $pay_per_day = 3;//ค่าปรับต่อวัน (บาท)

    $return_date  = $registerRow['end_date'];        //วันที่กำหนดส่งคืน
            $today = date('Y-m-d');    //วันที่ส่งคืนจริง

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
            if($pay >= '13'){
                $pay = $pay-9;
            }elseif($pay >= '21'){
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
            }elseif($pay >= '200'){
                $pay = '200';
            }
            
//--------------------------------------------------------------------------------------------------------------
//payment history
$payHistory = mysqli_query($con, "SELECT * FROM payments WHERE sr_id='$sr_id'");
$payHistoryRow = mysqli_fetch_array($payHistory);
        
//due process
$amountMoneyi = 0;
$payHistoryi = mysqli_query($con, "SELECT * FROM payments WHERE sr_id='$sr_id'");
while($payHistoryRowi = mysqli_fetch_array($payHistoryi)){
    $amountMoneyi = $payHistoryRowi['money'] + $amountMoneyi;
}
$due = $yuranMoney - $amountMoneyi;

//due status
if($payHistoryRow[0]>0){
    if($yuranMoney==$amountMoneyi){
        $dueStatus = "<button class='btn btn-success'><span class='glyphicon glyphicon-ok'></span> SUDAH LUNAS</button>";
        $payForm = 'none';
    }else{
        $dueStatus = "<button class='btn btn-warning'><span class='glyphicon glyphicon-exclamation-sign'></span> BELUM LUNAS</button>";
        $payForm = 'block';
    }
}else{
    $dueStatus = "<button class='btn btn-danger'><span class='glyphicon glyphicon-exclamation-sign'></span> BELUM BAYAR</button>"; 
    $payForm = 'block';
}

//Penalty process
$penalty = mysqli_query($con, "SELECT * FROM payments where sr_id='$sr_id'");
$penaltyRow = mysqli_fetch_array($penalty);
$penaltyResult = $penaltyRow['penalty'];

if($penaltyRow[0]>0){
    $penaltyValue = "<font color='green'>0</font> ฿";
    $sendPay = 0;
}else{
    $penaltyValue = "<font color='red'>".$pay."</font> ฿";
    $sendPay = $pay;
}

//academic_year
    if($program=='0'){
        $registerYear = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register WHERE p_id='0')");
        $registerYearRow = mysqli_fetch_array($registerYear);
        $cyear = $registerYearRow['year'];
    }else{
        $registerYear = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register WHERE p_id='$program')");
        $registerYearRow = mysqli_fetch_array($registerYear);
        $cyear = $registerYearRow['year'];
    }

?>

<form class="form-horizontal" id="yuranSearchForm" name="yuranSearchForm">
    <div class="col-lg-3">
        <input type="text" class="form-control input-sm" id="q" autofocus onkeypress="return isPressEnterYuran()">
    </div>
</form>
<button type="submit" class="btn btn-success btn-sm" onclick="searchYuran()" id="searchBox">SEARCH</button>
<br><br>

<table class="table table-bordered">
    <tr>
        <td width='20%'><img src="content/student/capture/images/<?= $photoResult ?>.jpg" class='img-thumbnail' width='200px' hiegth='250px'></td>
        <td valign='top'>
            <i><b><font color='blue' size='40px'><?= $student_Id ?></font></b></i><hr>
            <b>NAMA-NASAB : </b> <i><font color='orange'><?= $fname ?> - <?= $lname ?></font></i><hr>
            <b>FAKULTI : </b> <i><font color='orange'><?= $ftNameShow ?></font></i><hr>
            <b>JURUSAN : </b> <i><font color='orange'><?= $dpNameShow ?></font></i><hr>
        </td>
        <td valign='top'>
            <i><b><font color='red' size='40px'><?= number_format($yuranMoney) ?> ฿</font></b></i><hr>
            <b>SUDAH LUNAS : </b> <i><font color="green"><?= number_format($amountMoneyi) ?> ฿</font></i><hr>
            <b>BELUM LUNAS : </b> <i><font color="red"><?= number_format($due) ?> ฿</font></i><hr>
            <b>DENDA : </b> <i><?= $penaltyValue ?></i><hr>
            <b>STATUS : </b> <i><?= $dueStatus ?></i><hr>
        </td>
    </tr>
</table>

<div class="panel panel-primary">
    <div class="panel-body">
       <table class="table table-bordered">
            <tr>
                <td width="60%" align="center">
                    <b>SEJARAH BAYARAN</b>
                </td>
                <td align="center">
                    <b>AKSI</b>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <table class="table table-bordered">
                        <tr>
                            <td align="center">Tarikh bayar</td>
                            <td align="center">Jumlah duit</td>
                            <td align="center">Reciet</td>
                            <td align="center">DELETE</td>
                        </tr>
                        <?php
                        $payHistory = mysqli_query($con, "SELECT * FROM payments WHERE sr_id='$sr_id'");
                        while($payHistoryRow = mysqli_fetch_array($payHistory)){
                            $pay_date = $payHistoryRow['pay_date'];
                            $pay_money = $payHistoryRow['money'];
                            $reciet = $payHistoryRow['reciet_code'];
                            $p_id = $payHistoryRow['p_id'];
                        ?>
                        <tr>
                            <td align="center"><?= $pay_date ?></td>
                            <td align="center"><?= $pay_money ?></td>
                            <td align="center"><?= $reciet ?></td>
                            <td align="center">
                                <a class='btn btn-warning btn-sm' onclick='deleteYuran("<?= $p_id ?>", "<?= $sr_id ?>")'>DELETE</a>&nbsp;
                                <a class='btn btn-primary btn-sm' target="_blank" href="content/payment/action/reciet.php?id=<?= $p_id ?>"><span class="glyphicon glyphicon-print"></span> PRINT</a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table> 
                </td>
                <td>
                    <form class="form-horizontal" name="paymentForm" id="paymentForm" style="display: <?= $payForm ?>">
                        <label class="col-lg-2">BAYAR</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" name="money" value="<?= $due ?>" >
                        </div>
                        <input type="hidden" name="sr_id" value="<?= $sr_id ?>">
                        <input type="hidden" name="st_id" value="<?= $st_id ?>">
                        <input type="hidden" name="pay_date" value="<?= date("Y-m-d") ?>">
                        <input type="hidden" name="penalty" value="<?= $sendPay ?>">
                        <input type="hidden" name="program" value="<?= $program ?>">
                        <input type="hidden" name="academicYear" value="<?= $cyear ?>">
                        <input type="hidden" name="yuranMoney" value="<?= $yuranMoney ?>">
                    </form>
                    <button style="display: <?= $payForm ?>" class="btn btn-success" onclick="yuranPay()">SAVE</button>
                    <div align='center' id="msg"></div>
                </td>
            </tr>
        </table>
    </div>
</div>







