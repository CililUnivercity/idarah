<?php
    include("../function/function.php");
    $classId = $_GET['classId'];
    $ft_id = $_GET['ft_id'];
    $dp_id = $_GET['dp_id'];
    $re_id = $_GET['re_id'];
    $row = registerSelect($re_id);
    
    if($dp_id == ''){
        $ftName = faculty($ft_id);
        $dpName = '';
    }else{
        $ftName = faculty($ft_id);
        $dpName = "(".department($dp_id).")";
    }

?>
<div class="pull-right">
    <a href="#" class="btn btn-success btn-sm" onclick="loadContent('addSubject' ,'attendance', '<?= $re_id ?>')"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
</div>

<center><div id="subText">كلس <?=  $classId ?></div></center>
<center><div id="subText"><?= $ftName ?></div></center>
<center><div id="subText"><?= $dpName ?></div></center>



        <form class="form-horizontal" name="addList" id="addList">
            <div class="col-lg-2">
                <h4><?= $row['term_id'] ?>/<?= $row['year'] ?> </h4>
            </div>
                                               

            <div class="col-lg-3">
                <select name="tc_id" id="tc_id" class="form-control">
                                                                <?php
                                                                    $subjectName = subjectName($ft_id,$dp_id,$classId,$row['term_id']);
                                                                    while($result = mysqli_fetch_array($subjectName)){
                                                                        $subName = str_replace("\'", "&#39;", $result['s_rumiName']);
                                                                        $subCode = str_replace("\'", "&#39;", $result['s_code']);
                                                                        $teacherfName = str_replace("\'", "&#39;", $result['t_fnameRumi']);
                                                                        $teacherlName = str_replace("\'", "&#39;", $result['t_lnameRumi']);
                                                                        $name = $subName." , ".$subCode." ( ".$teacherfName." - ".$teacherlName." )";
                                                                ?>
                                                                <option value="<?= $result['rs_id'] ?>"><?= $name ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                </select>
            </div>
                                                        <div class="col-lg-3">
                                                            <select name="studyDay" id="studyDay" class="form-control">
                                                                <option value="1">ISNIN</option>
                                                                <option value="2">SELASA</option>
                                                                <option value="3">RABU</option>
                                                                <option value="4">KHAMIS</option>
                                                                <option value="5">JUMAT</option>
                                                                <option value="6">SABTU</option>
                                                                <option value="7">AHAD</option>
                                                            </select>
                                                       </div>
                                                        <div class="col-lg-3">
                                                            <select name="studyClass" id="studyDay" class="form-control">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                            </select>
                                                       </div>
                                                   
                                                      
                                                    <input type="hidden" name="ft_id" value="<?= $ft_id ?>">
                                                    <input type="hidden" name="dp_id" value="<?= $dp_id ?>">
                                                    <input type="hidden" name="re_id" value="<?= $re_id ?>">
                                                    <input type="hidden" name="class" value="<?= $classId ?>">
                                                   
                                                </form>
     <button class="btn btn-success" onclick="addListSave()"> SAVE</button>


                                                
<br><br>
<table class="table table-bordered table-hover table-striped">
    <tr>
        <td align="center" width="30%">HARI / HISAH</td>
        <td align="center">MATA KULIAH</td>
        <td align="center">PENSYARAH</td>
        <td align="center">AKSI</td>
    </tr>
    <?php
        $attendance = mysqli_query($con, "SELECT * FROM attendance WHERE ft_id='$ft_id' AND dp_id='$dp_id' AND term='$row[term_id]' AND year='$row[year]' AND class='$classId' ORDER BY studyDay,studyClass");
        while($rowAttendance = mysqli_fetch_array($attendance)){
            $subject = mysqli_query($con, "SELECT * FROM subject WHERE s_id='$rowAttendance[s_id]'");
            $rowSub = mysqli_fetch_array($subject);
                $subNameList = str_replace("\'", "&#39;", $rowSub['s_rumiName']);
                $subCodeList = str_replace("\'", "&#39;", $rowSub['s_code']);
                $teacher = mysqli_query($con, "SELECT * FROM teachers WHERE t_id='$rowAttendance[t_id]'");
                $rowTeacher = mysqli_fetch_array($teacher);
                $teacherfNameList = str_replace("\'", "&#39;", $rowTeacher['t_fnameRumi']);
                $teacherlNameList = str_replace("\'", "&#39;", $rowTeacher['t_lnameRumi']);
    ?>
    <tr id="<?= $rowAttendance['at_id'] ?>">
        <td align="center"><?php $dayName = dayName($rowAttendance['studyDay']);  echo $dayName; ?> / <?= $rowAttendance['studyClass'] ?></td>
        <td align="left"><?= $subCodeList ?> <?= $subNameList ?></td>
        <td align="left"><?= $teacherfNameList ?> - <?= $teacherlNameList ?></td>
        <td align="center"><button onclick="deleteAttendance('<?= $rowAttendance['at_id'] ?>')" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-trash"></span> DELETE</button></td>
    </tr>
    <?php
        }
    ?>
</table>



                   
                                               