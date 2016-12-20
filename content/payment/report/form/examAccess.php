<?php
    include_once '../function/function.php';
?>   
<br>
<div class="panel panel-primary">
<div class="panel-body">
    
    <div align="center">
        
        <form class="form-horizontal" id="yuranReportByClass">    
            
                <div class="form-group">
                    
                    <div class="col-lg-12 col-lg-offset-2">

                        <div class="col-lg-2">
                            <select class="form-control input-sm" name="term" id="term">
                                <option value="0">SEMESTER</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <select class="form-control input-sm" name="class" id="class">
                                <option value="0">KELAS</option>
                                <option value="<?= $c1 ?>">1</option>
                                <option value="<?= $c2 ?>">2</option>
                                <option value="<?= $c3 ?>">3</option>
                                <option value="<?= $c4 ?>">4</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <select class="form-control input-sm" name="faculty" id="faculty">
                                 <option value="0">FAKULTI</option>
                                <?php
                                    $faculty = faculty();
                                    while($rs_fakulty = mysqli_fetch_array($faculty)){
                                ?> 
                                <option value="<?= $rs_fakulty['ft_id'] ?>"><?= $rs_fakulty['ft_name'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <select class="form-control input-sm" name="department" id="department">
                                <option value="0">JURUSAN</option>
                                <?php
                                    $department = department();
                                    while($rs_department = mysqli_fetch_array($department)){
                                ?>
                                <option value="<?= $rs_department['dp_id']; ?>"><?= $rs_department['dp_name']; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    
                    </div>
                    
                    </div>
                
                </div> 

            </form>
        
        <div align="center">
            <button onclick="examAccess(<?= $year_register ?>)" class="btn btn-success btn-sm" name="save"><span class="glyphicon glyphicon-search"></span> SEARCH</button>                
        </div>
    
    </div>
    
    <div id="lastStatement" align="center"></div>
  
</div>

