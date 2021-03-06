<?php
    include '../../../connect.php';
    $st_id = $_POST['st_id'];
    
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
    
    //Get max receit from mustawa_register table
    $max_receit_sql = mysqli_query($con, "SELECT * FROM mustawa_register WHERE reciet=(SELECT MAX(reciet) FROM mustawa_register)");
    $max_receit_result = mysqli_fetch_array($max_receit_sql);
    $max_receit = $max_receit_result['reciet'] + 1;

?>
<div class="panel-body">
        <div id="payProcess">
            <div class="pull-right" style="display: none;" id="printStatus">
                <a class="btn btn-success" onclick="mustawaRegisterSave()"><span class="glyphicon glyphicon-print"></span> PRINT</a>
            </div>
            <form class="form-horizontal" name="mustawaPayForm" id="mustawaPayForm">
                <div class="form-group">
                    <div id="subText"><label class="col-lg-5 control-label">PILIH MUSTAWA :</label></div>
                    <div class="col-lg-3">
                        <select class="form-control" name="mustawa" id="mustawa" onchange="selectMustawaData()">
                            <option value="0">-------Pilih-------</option>
                            <?php
                                $mustawaData = mysqli_query($con, "SELECT * FROM mustawadata WHERE status='1'");
                                while($mustawaDataResult= mysqli_fetch_array($mustawaData)){
                                        $mustawaData_id = $mustawaDataResult['mustawaData_id'];
                                        $level = $mustawaDataResult['level'];
                                        $mustawaYear = $mustawaDataResult['year'];
                            ?>
                            <option value="<?= $mustawaData_id ?>">Mustawa : <?= $level ?> , Tahun <?= $mustawaYear ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <div id="subText"><label class="col-lg-5 control-label">GRUP BELAJAR (القاعة): </label></div>
                    <div class="col-lg-3">
                        <select class="form-control" name="group" id="group">
                            <option value="0">-------Pilih-------</option>
                            <?php
                                for($i=1;$i<=15;$i++){
                            ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <div id="subText"><label class="col-lg-5 control-label">RESIT :</label></div>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" name="reciet" id="reciet" value="<?= $max_receit ?>">
                    </div>
                    <div class="col-lg-3" id="recietAlert"></div>
                </div>
                
                <div class="form-group">
                    <div id="subText"><label class="col-lg-5 control-label">Bayar :</label></div>
                    <div class="col-lg-3">
                        <input type="number" class="form-control" id="prize" name="prize" disabled="">
                    </div>
                    <div class="col-lg-3" id="selectAlert"></div>
                </div>
                
                <input type="hidden" name="st_id" id="st_id" value="<?= $st_id ?>">
                    
            </form>
            
            <div align="center">
                
            </div>
            
            <div align="center">
                <a class="btn btn-success" onclick="mustawaRegisterSave()"><span class="glyphicon glyphicon-save"></span> SAVE</a>
            </div>
  
            <div id="process" align="center"> 
            </div>
            
        </div>
    </div>