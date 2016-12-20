<?php   
    include '../../connect.php';

    $term = $_GET['term'];
    $year = $_GET['year'];
    $classId = $_GET['classId'];
    $faculty = $_GET['faculty'];
    $department = $_GET['department'];
    
    if($department!=''){
        $student = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                                  WHERE s.dp_id='$department' AND s.class='$classId' AND srx.term='$term' AND srx.year='$year' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS') ORDER BY s.student_id
                                  ");
        $departmentData = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$department'");
        $rowDepartment = mysqli_fetch_array($departmentData);
        $departmentName = $rowDepartment['dp_arab_name'];
        
        $deparmentEcho = "<b>(</b> ".$departmentName." <b>)</b>";
    }else{
        $student = mysqli_query($con, "SELECT s.*,srx.* FROM students s INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                                 WHERE s.ft_id='$faculty' AND class='$classId' AND srx.term='$term' AND srx.year='$year' AND (srx.pay_status='Belum bayar' OR srx.pay_status='BELUM LUNAS') ORDER BY s.student_id
                                 ");
        $deparmentEcho = "";
    }
    
    $facultyData = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$faculty'");
    $rowFaculty = mysqli_fetch_array($facultyData);
    $facultyName = $rowFaculty['ft_arab_name'];
    
    
    
    if($department!=''){
        $ftName = $facultyName;
        $dpName = $departmentName;
    }else{
        $ftName = $facultyName;
        $dpName = '';
    }
    
    //Set class system
    $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register WHERE p_id='0')");
    $rs_register = mysqli_fetch_array($register);
    $year_register = $rs_register['year'];
            
    $c1 = $year_register ;
    $c2 = $year_register-1;
    $c3 = $year_register-2;
    $c4 = $year_register-3;
    
    //Kelas sekarang
    $kelas = $classId;
    if($kelas == $c1){ $cnow = '1'; }
    if($kelas == $c2){ $cnow = '2'; }
    if($kelas == $c3){ $cnow = '3'; }
    if($kelas == $c4){ $cnow = '4'; }
    //echo $classId;
?>
<div class="pull-right">
    <a class="btn btn-success btn-sm" href="#" onclick="loadContent('payByClass', 'payment/exam', '')"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
</div>

<table align="center">
    <tr>
        <td align="center"><div id="subText"><b> كلس <?= $cnow ?> </b></div></td>
    </tr>
     <tr>
        <td align="center"><div id="subText"><b> <?= $ftName ?></b></div></td>
    </tr>
    <tr>
        <td align="center"><div id="subText"><b><?= $deparmentEcho ?></b></div></td>
    </tr>
</table>

<form class='form-horizontal' method='post' name="examPay" id="examPay">
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <td align='center' width='7%'><b>BIL</b></td>
            <td align='center' width='15%'><b>Bayar</b></td>
            <td align='center' width='15%'><b>NO.POKOK</b></td>
            <td align='center' width='30%'><b>NAMA - NASAB</b></td>
            <td align='center' width='30%'><div id="subText"><b>نام - نسب</b></div></td>
        </tr>
        <?php
            $i = 0;
            $number = 1;
            while($studentRow = mysqli_fetch_array($student)){
                $srx_id = $studentRow['srx_id'];
                $st_id = $studentRow['st_id'];
                $student_id = $studentRow['student_id']; 
                $fnameR = str_replace("\'", "&#39;", $studentRow["firstname_rumi"]);
                $lnameR = str_replace("\'", "&#39;", $studentRow["lastname_rumi"]);
                $fnameJ = str_replace("\'", "&#39;", $studentRow["firstname_jawi"]);
                $lnameJ = str_replace("\'", "&#39;", $studentRow["lastname_jawi"]);

                echo '<tr>';
                echo "<td align='center'>{$number}</td>";
                echo "<td align='center'><input type='checkbox' name='pay_status[$i]' value='1'></td>";
                echo "<input type='hidden' name='st_id[$i]' value='{$st_id}'>";
                echo "<td align='center'>{$student_id}<input type='hidden' name='srx_id[$i]' value='{$srx_id}'/></td>";
                echo "<td>{$fnameR} - {$lnameR}</td>";
                echo "<td align='right'><div id='subText'>{$fnameJ} - {$lnameJ}</div></td>";
                echo '</tr>';
                ++$i;
                ++$number;

            } 
        ?>
    </table>  
        <input type="hidden" name="term" value="<?= $class ?>">
        <input type="hidden" name="$year" value="<?= $class ?>">
        <input type="hidden" name="class" value="<?= $class ?>">
        <input type="hidden" name="faculty" value="<?= $faculty ?>">
        <input type="hidden" name="department" value="<?= $department ?>">
</form>
    <p class="text-center">     
        <button class="btn btn-success btn-sm" onclick="examPayClass()">SAVE</button>
    </p>
    <div align="center" id="msg"></div>

