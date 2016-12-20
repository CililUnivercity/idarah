<?php
    include("../../connect.php");
    $id = $_GET['id'];
    
    //exam_pay table
    $examRegister = mysqli_query($con, "SELECT * FROM student_register_exam WHERE srx_id='$id'");
    $examRegisterRow = mysqli_fetch_array($examRegister);
    $st_id = $examRegisterRow['st_id'];
    $re_id = $examRegisterRow['re_id'];
    $srx_id = $examRegisterRow['srx_id'];
    
    if($re_id==NULL || $re_id==0){
        $re_idId = '46';
    }else{
        $re_idId = $re_id;
    }
    
    //----------------------------------------------------------------------------------------
    //register table
    $register = mysqli_query($con, "SELECT * FROM register WHERE re_id='$re_idId'");
    $registerRow = mysqli_fetch_array($register);
    $examPrize = $registerRow['exam_prize'];
    
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
    $income_year = $studentRow['income_year'];
    
    $faculty = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$ft_id'");
    $facultyRow = mysqli_fetch_array($faculty);
    $ftName = str_replace("\'", "&#39;", $facultyRow["ft_name"]);
    
    $department = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$dp_id'");
    $departmentRow = mysqli_fetch_array($department);
    $dpName = str_replace("\'", "&#39;", $departmentRow["dp_name"]);
    
    //------------------------------------------------------------------------------------------
    
    $photo = mysqli_query($con, "SELECT * FROM image WHERE st_id='$studentId'");
    $photoRow = mysqli_fetch_array($photo);
    $photoResult = $photoRow['images'];
    
    //------------------------------------------------------------------------------------------
    //exam_pay table
    $exam_pay = mysqli_query($con, "SELECT * FROM exam_pay WHERE srx_id='$srx_id'");
    
    $numExamPay = 0;
    $countExam_pay = mysqli_query($con, "SELECT * FROM exam_pay WHERE srx_id='$srx_id'");
    while($resultCountExamPay = mysqli_fetch_array($countExam_pay)){
        $numExamPay = $numExamPay + $resultCountExamPay['money'];
    }
    
    $duePay = $examPrize - $numExamPay;
    
    //------------------------------------------------------------------------------------------
    //payment status
    if($duePay==0){
        $payStatus = "<button class='btn btn-success'><span class='glyphicon glyphicon-ok'></span> SUDAH LUNAS</button>";
        $form = "none";
    }else{
        $payStatus = "<button class='btn btn-danger'><span class='glyphicon glyphicon-exclamation-sign'></span> BELUM LUNAS</button>";
        $form = "block";
    }
?>

<table class="table table-bordered">
    <tr>
        <td width='20%'><img src="content/student/capture/images/<?= $photoResult ?>.jpg" class='img-thumbnail' width='200px' hiegth='250px'></td>
        <td valign='top'>
            <i><b><font color='blue' size='40px'><?= $student_Id ?></font></b></i><hr>
            <b>NAMA-NASAB : </b> <i><font color='orange'><?= $fname ?> - <?= $lname ?></font></i><hr>
            <b>FAKULTI : </b> <i><font color='orange'><?= $ftName ?></font></i><hr>
            <b>JURUSAN : </b> <i><font color='orange'><?= $dpName ?></font></i><hr>
        </td>
        <td valign='top'>
            <i><b><font color='red' size='40px'><?= number_format($examPrize) ?> ฿</font></b></i><hr>
            <b>SUDAH LUNAS : </b> <i><font color="green"><?= number_format($numExamPay) ?> ฿</font></i><hr>
            <b>BELUM LUNAS : </b> <i><font color="red"><?= number_format($duePay) ?> ฿</font></i><hr>
            <b>STATUS :  <?= $payStatus ?></b> <i></i><hr>
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
                            while($payList = mysqli_fetch_array($exam_pay)){
                        ?>
                        <tr>
                            <td align="center"><?= $payList['pay_date'] ?></td>
                            <td align="center"><?= $payList['money'] ?></td>
                            <td align="center"><?= $payList['reciet_code'] ?></td>
                            <td align="center">
                                <a class='btn btn-warning btn-sm' onclick="deleteExam('<?= $payList['px_id'] ?>', '<?= $srx_id ?>')">DELETE</a>&nbsp;   
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table> 
                </td>
                <td>
                    <form class="form-horizontal" name="paymentForm" id="paymentForm" style="display: <?= $form ?>">
                        <label class="col-lg-2">BAYAR</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" name="money" value="<?= $duePay ?>" >
                        </div>
                        <input type="hidden" name="srx_id" value="<?= $srx_id ?>">
                        <input type="hidden" name="st_id" value="<?= $st_id ?>">
                        <input type="hidden" name="pay_date" value="<?= date('Y-m-d') ?>">
                    </form>
                    <button class="btn btn-success" onclick="examPay()" style="display: <?= $form ?>">SAVE</button>
                    <div align='center' id="msg"></div>
                </td>
            </tr>
        </table>
    </div>
</div>

