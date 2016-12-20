<div class="pull-left">
    <h4><span class="glyphicon glyphicon-usd"></span> BAYAR UJIAN MENGIKUT KELAS</h4>
</div>
<br><br><hr>

<?php
    $term = $_POST['term'];
    $year = $_POST['year'];
    $class = $_POST['class'];	
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    
    $facultyData = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$faculty'");
    $rowFaculty = mysqli_fetch_array($facultyData);
    $facultyName = $rowFaculty['ft_arab_name'];
    
    $departmentData = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$department'");
    $rowDepartment = mysqli_fetch_array($departmentData);
    $departmentName = $rowDepartment['dp_arab_name'];
    
    //Set class system
    $register = mysqli_query($con, "SELECT r.*,y.* FROM register_exam r INNER JOIN year y ON r.y_id=y.y_id WHERE r.rx_id=(SELECT MAX(rx_id) FROM register_exam)");
    $rs_register = mysqli_fetch_array($register);
    $year_register = $rs_register['year'];
            
    $c1 = $year_register ;
    $c2 = $year_register-1;
    $c3 = $year_register-2;
    $c4 = $year_register-3;
    
    //Kelas sekarang
    $kelas = $class;
    if($kelas == $c1){ $cnow = '1'; }
    if($kelas == $c2){ $cnow = '2'; }
    if($kelas == $c3){ $cnow = '3'; }
    if($kelas == $c4){ $cnow = '4'; }
    
    if($department == 0){
        $exam = mysqli_query($con, "SELECT s.*,sre.* FROM students s INNER JOIN student_register_exam sre ON s.st_id=sre.st_id    
                            WHERE s.class='$class' AND s.ft_id='$faculty' AND sre.term='$term' AND sre.year='$year' AND sre.pay_status='Belum bayar'
                            ");
    }else{
        $exam = mysqli_query($con, "SELECT s.*,sre.* FROM students s INNER JOIN student_register_exam sre ON s.st_id=sre.st_id    
                            WHERE s.class='$class' AND s.ft_id='$faculty' AND s.dp_id='$department' AND sre.term='$term' AND sre.year='$year' AND sre.pay_status='Belum bayar'
                            ");
    } 
?>
<div class="pull-right">
    <a href="?page=finance&&financepage=exam" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> BACK</a>
</div>
<table align="center">
    <?php
        if($department != 0){
    ?>
    <tr>
        <td align="center"><div id="subText"><b> <?= $cnow ?> <?= $facultyName ?></b></div></td>
    </tr>
    <tr>
        <td align="center"><div id="subText">(<?= $departmentName ?>)</div></td>
    </tr>
    <?php
        }  else {
    ?>
    <tr>
        <td><div id="subText"><b> <?= $cnow ?> <?= $facultyName ?></div></td>
    </tr>
    <?php
        }
    ?>
</table>

<div class="pull-left]">
    <b><?= $term ?>/<?= $year ?></b>
</div>

<form class='form-horizontal' method='post' action='?page=finance&&financepage=examSave'>

<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <td align='center' width='15px'><b>Bayar</b></td>            
            <td align='center'><b>NO.POKOK</b></td>
            <td align='center'><b>NAMA - NASAB</b></td>
            <td align='center'><div id="subText"><b>نام - نسب</b></div></td>
        </tr>
    </thead>
    <tbody>
        <?php
            $i = 0;
            while($rowExam = mysqli_fetch_array($exam)){
                //$payStatus = $rowExam['pay_status'];
                $srx_id = $rowExam['srx_id'];
                $st_id = $rowExam['st_id'];
                $rx_id = $rowExam['rx_id'];
                $student_id = $rowExam['student_id']; 
                $fnameR = str_replace("\'", "&#39;", $rowExam["firstname_rumi"]);
                $lnameR = str_replace("\'", "&#39;", $rowExam["lastname_rumi"]);
                $fnameJ = str_replace("\'", "&#39;", $rowExam["firstname_jawi"]);
                $lnameJ = str_replace("\'", "&#39;", $rowExam["lastname_jawi"]);
                
                echo '<tr>';
                echo "<td align='center'><input type='checkbox' name='pay_status[$i]' value='1'></td>";
                echo "<input type='hidden' name='st_id[$i]' value='{$st_id}'>";
                echo "<td align='center'>{$student_id}<input type='hidden' name='srx_id[$i]' value='{$srx_id}'/></td>";
                echo "<td>{$fnameR} - {$lnameR}</td>";
                echo "<td align='right'><div id='subText'>{$fnameJ} - {$lnameJ}</div></td>";
                echo '</tr>';
                ++$i;
             }
         ?>    
    </tbody>
</table>
        <input type="hidden" name="class" value="<?= $class ?>">
        <input type="hidden" name="faculty" value="<?= $faculty ?>">
        <input type="hidden" name="department" value="<?= $department ?>">
        <input type="hidden" name="subject" value="<?= $subject ?>">
        <p class="text-center">
            <button type="reset" class="btn btn-danger btn-sm" name="save">BATAL</button>
            <button type="submit" class="btn btn-success btn-sm" name="save">SAVE</button>
        </p>    
</form>