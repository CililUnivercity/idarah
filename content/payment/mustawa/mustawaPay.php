<?php
    include '../../../connect.php';
    include '../../function/global.php';
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
    </tr>
</table>

<div class="panel panel-primary">
    <div class="panel-body">
        <h5><b><span class="glyphicon glyphicon-list-alt"></span> SEJARAH PENDAFTARAN MUSTAWA</b></h5><hr>
        
        <style>
            div.scrollMus{
                width: 100%;
                height: 300px;
                overflow: scroll;
            }
        </style>
        
        <div class="scrollMus" id="mustawaRegisterHistory">
            <?php
                //include '../../../connect.php';
                //$st_id = $_POST['st_id'];

                $mustawa_register = mysqli_query($con, "SELECT mr.*,md.* FROM mustawa_register mr INNER JOIN mustawadata md ON mr.mustawadata_id=md.mustawaData_id WHERE st_id='$st_id' ORDER BY mustawa_register_id DESC");

            ?>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <td align="center"><b>TARIKH BAYAR</b></td>
                        <td align="center"><b>JUMLAH DUIT</b></td>
                        <td align="center"><b>RESIT</b></td>
                        <td align="center"><b>GRUP BELAJAR</b></td>
                        <td align="center"><b>MUSTAWA/TAHUN</b></td>
                        <td align="center"><b>HAPUS</b></td>
                        <td align="center"><b>PRINT RESIT</b></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ir = 1;
                    while($mustawa_register_result = mysqli_fetch_array($mustawa_register)){
                        $mustawa_register_id = $mustawa_register_result['mustawa_register_id'];
                        $register_date = $mustawa_register_result['register_date'];
                        $payMoney = $mustawa_register_result['payMoney'];
                        $reciet = $mustawa_register_result['reciet'];
                        $leaningGroup = $mustawa_register_result['learningGroup'];
                        //$level = $mustawa_register_result['level'];
                        $mustawa_data_id = $mustawa_register_result['mustawadata_id'];
                        
                        //get mustawa data from 'mustawa_data' table
                        $md = queryList("mustawadata", "mustawaData_id='$mustawa_data_id'", "../../connect.php");
                        $md_year = $md['year'];
                        $md_level = $md['level'];
                        $md_group_number = $md['group_number'];
                    ?>
                    <tr id="<?= $mustawa_register_id ?>">
                        <td align="center"><?= $register_date ?></td>
                        <td align="center"><?= $payMoney ?></td>
                        <td align="center"><?= str_pad($reciet, 3, "0", STR_PAD_LEFT) ?></td>
                        <td align="center">
                            <form class="form-horizontal">
                                <div class='form-group'>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="leaningGroup<?= $mustawa_register_id ?>" name="<?= $mustawa_register_id ?>" onchange="changeMustawaGroup(this.id, <?= $ir ?>)">
                                            <?php
                                                $mg = 1;
                                                while($mg<=$md_group_number){
                                            ?>
                                            <option value="<?= $mg ?>" <?php if($leaningGroup==$mg){echo 'selected';} ?>><?= $mg ?></option>
                                            <?php 
                                                $mg++;
                                                } 
                                            ?>
                                        </select>
                                        <div id="savingAlert<?= $ir ?>"></div>
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td align="center"><?= $md_level ?>/<?= $md_year ?></td>
                        <td align="center"><a onclick="deleteMustawaHistory('<?= $mustawa_register_id ?>', '<?= $st_id ?>')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span> HAPUS</a></td>
                        <td align="center"><a href="content/payment/mustawa/reciet.php?st_id=<?= $st_id ?>&mustawa_register_id=<?= $mustawa_register_id ?>" target="_blank" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span> PRINT RESIT</a></td>
                    </tr>
                    <?php
                    $ir++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        
    </div>
</div>

<div class="panel panel-primary">
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
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <div id="subText"><label class="col-lg-5 control-label">RESIT :</label></div>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" name="reciet" id="reciet">
                    </div>
                    <div class="col-lg-3" id="recietAlert"></div>
                </div>
                
                <div class="form-group">
                    <div id="subText"><label class="col-lg-5 control-label">TARIKH :</label></div>
                    <div class="col-lg-3">
                        <input type="date" class="form-control" name="dateReg" id="dateReg" value="<?= date('Y-m-d') ?>">
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
</div>









