<?php
    include("../../connect.php");
    $id = $_GET['id']; //For student_register table
    
    //-----------------------------------------------------------------------------------------
    //Student data
    $student = mysqli_query($con, "SELECT * FROM students WHERE st_id='$id'");
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
    
    $programData = mysqli_query($con, "SELECT * FROM program WHERE p_id='$program'");
    $programDataRow = mysqli_fetch_array($programData);
    $programName = str_replace("\'", "&#39;", $programDataRow["p_name"]);
    
    //Muqaddimah money
    if($program=='0'){
        $muqaddimah = '700';
    }else{
        $muqaddimah = '2000';
    }
    
    $muqaddimahSqli = mysqli_query($con, "SELECT * FROM muqaddimah_pay WHERE st_id='$id'");
    $muqaddimahRowi = mysqli_fetch_array($muqaddimahSqli);
    
    $muqaddimahSql = mysqli_query($con, "SELECT * FROM muqaddimah_pay WHERE st_id='$id'");
    $muqaddimaResult = 0;
    while($muqaddimahRow = mysqli_fetch_array($muqaddimahSql)){
        $muqaddimaResult = $muqaddimaResult + $muqaddimahRow['m_money'];
    }
    
    $muqaddimahDue = $muqaddimah - $muqaddimaResult;
    
    //due status
    if($muqaddimahRowi[0]>0){
        if($muqaddimah==$muqaddimaResult){
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
        $dpNameShow = "";
    }
    
    //-----------------------------------------------------------------------------------------
    //Get student photo
    $photo = mysqli_query($con, "SELECT * FROM image WHERE st_id='$studentId'");
    $photoRow = mysqli_fetch_array($photo);
    $photoResult = $photoRow['images'];

?>
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
            <i><b><font color='red' size='40px'><?= number_format($muqaddimah) ?> ฿</font></b></i><hr>
            <b>SUDAH LUNAS : </b> <i><font color="green"><?= number_format($muqaddimaResult) ?> ฿</font></i><hr>
            <b>BELUM LUNAS : </b> <i><font color="red"><?= number_format($muqaddimahDue) ?> ฿</font></i><hr>
            <b>STATUS : <?= $dueStatus ?> </b> <i></i><hr>
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
                        $payHistory = mysqli_query($con, "SELECT * FROM muqaddimah_pay WHERE st_id='$id'");
                        while($payHistoryRow = mysqli_fetch_array($payHistory)){
                            $pay_date = $payHistoryRow['m_paydate'];
                            $pay_money = $payHistoryRow['m_money'];
                            $reciet = $payHistoryRow['m_reciet'];
                            $m_id = $payHistoryRow['m_id'];
                        ?>
                        <tr>
                            <td align="center"><?= $pay_date ?></td>
                            <td align="center"><?= $pay_money ?></td>
                            <td align="center"><?= $reciet ?></td>
                            <td align="center">
                                <a class='btn btn-warning btn-sm' onclick='deleteMuqaddimah("<?= $m_id ?>", "<?= $id ?>")'>DELETE</a>&nbsp;
                                
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
                            <input type="number" class="form-control" name="m_money" value="<?= $muqaddimahDue ?>" >
                        </div>
                        <input type="hidden" name="st_id" value="<?= $id ?>">
                        <input type="hidden" name="m_paydate" value="<?= date("Y-m-d") ?>">
                        <input type="hidden" name="m_academicyear" value="<?= $income_year ?>">
                         <input type="hidden" name="program" value="<?= $program ?>">
                    </form>
                    <button style="display: <?= $payForm ?>" class="btn btn-success" onclick="muqaddimahPay()">SAVE</button>
                    <div align='center' id="msg"></div>
                </td>
            </tr>
        </table>
    </div>
</div>
