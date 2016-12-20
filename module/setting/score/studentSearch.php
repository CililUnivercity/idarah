<?php
    //$class = $_POST['class'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    $subject = $_POST['subject'];
    $year = $_POST['year'];
    
    //Get subject data
    $subjectData = mysqli_query($con, "SELECT * FROM subject WHERE s_id='$subject'");
    $rowSubject = mysqli_fetch_array($subjectData);
    
    //Get current year 
    $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register WHERE p_id='0')");
    $rs_register = mysqli_fetch_array($register);
    $cyear = $rs_register['year'];
    
    //Get faculty data
    $sqlFaculty = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$faculty'");
    $rowFaculty = mysqli_fetch_array($sqlFaculty);
    
    //Get faculty data
    $sqlDepartment = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$department'");
    $rowDepartment = mysqli_fetch_array($sqlDepartment);
    
    //Set class system 
    $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register WHERE p_id='0')");
    $rs_register = mysqli_fetch_array($register);
    $cyear = $rs_register['year'];
                            
    $first = $cyear; 
    $second = $cyear-1;
    $third  = $cyear-2;
    $fordth = $cyear-3;
    

    
    //Get student data for update score
    $t_id = $_SESSION["UserID"];
    if($department == "0"){
    $score = mysqli_query($con, "SELECT s.*,ss.* FROM students s
                         INNER JOIN studentSubject ss ON s.st_id=ss.st_id
                         WHERE s.ft_id='$faculty' and ss.ss_year='$year' and ss.s_id='$subject' AND ss.t_id='$t_id' ORDER BY s.student_id");
    }else{
    $score = mysqli_query($con, "SELECT s.*,ss.* FROM students s
                         INNER JOIN studentSubject ss ON s.st_id=ss.st_id
                         WHERE s.ft_id='$faculty' and s.dp_id='$department' and ss.ss_year='$year' and ss.s_id='$subject' AND ss.t_id='$t_id' ORDER BY s.student_id");    
    }
 ?>
<br>
<div class="pull-left">
    <a href="module/setting/score/specialPrint.php?year=<?= $year ?>&&faculty=<?= $faculty ?>&&department=<?= $department ?>&&subject=<?= $subject ?>" target="_blank" class="btn btn-success btn-sm"><span class='glyphicon glyphicon-print'></span> PRINT</a>
</div>
<div class='pull-right'>
    <a href="?page=setting&&settingpage=score" class="btn btn-success btn-sm"><span class='glyphicon glyphicon-chevron-left'></span> BACK</a>
</div>
<br>
<br>
<?php if($department == "0"){ ?>
<p><strong><?= $rowFaculty['ft_name'] ?> , Kelas : <?= $cnow ?> , <?= $rowSubject['s_code'] ?> : <?= $rowSubject['s_rumiName'] ?></p>
<?php }else{ ?>
<p><strong><?= $rowFaculty['ft_name'] ?> , <?= $rowDepartment['dp_name'] ?> , Kelas : <?= $cnow ?></p>
<?php } ?>

<?php
    echo "<form class='form-horizontal' method='post' action='?page=setting&&settingpage=scoreSave'>\n";
?>
<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <td align='center'><b>NO.POKOK</b></td>
            <td align='center'><b>NAMA - NASAB</b></td>
            <td align='center'><b>نام - نسب</b></td>
            <td align='center' width='10px'><b>MARKAH</b></td>
        </tr>
    </thead>
    <tbody>
        <?php
            $i = 0;
            while($rowScore = mysqli_fetch_array($score)){
                $ssId = $rowScore['ss_id'];
                $student_id = $rowScore['student_id'];
                $sScore = $rowScore['ss_score']; 
                $fnameR = str_replace("\'", "&#39;", $rowScore["firstname_rumi"]);
                $lnameR = str_replace("\'", "&#39;", $rowScore["lastname_rumi"]);
                $fnameJ = str_replace("\'", "&#39;", $rowScore["firstname_jawi"]);
                $lnameJ = str_replace("\'", "&#39;", $rowScore["lastname_jawi"]);
                
                echo '<tr>';;
                echo "<td align='center'>{$student_id}<input type='hidden' name='id[$i]' value='{$ssId}' /></td>";
                echo "<td>{$fnameR} - {$lnameR}</td>";
                echo "<td align='right'>{$fnameJ} - {$lnameJ}</td>";
                echo "<td width='10px'><input type='text' name='score[$i]' value='{$sScore}' class='form-control input-sm'/></td>";
                echo '</tr>';
                ++$i;
             }
         ?>    
    </tbody>
</table>
       <input type="hidden" name="year" value="<?= $year ?>">
       <input type="hidden" name="faculty" value="<?= $faculty ?>">
       <input type="hidden" name="department" value="<?= $department ?>">
       <input type="hidden" name="subject" value="<?= $subject ?>">
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-6">
                <button type="reset" class="btn btn-default btn-sm" name="save">MEMBATAL</button>
                <button type="submit" class="btn btn-primary btn-sm" name="save">SIMPAN</button>
            </div>
        </div>
        <?php
            echo "</form>"; 
        ?>