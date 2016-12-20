<?php
    include("../connect.php");
    $p_id = $_GET['id'];
    $program = mysqli_query($con, "SELECT p_name FROM program WHERE p_id='$p_id'");
    $rowPgr = mysqli_fetch_array($program);
    $p_nameTitle = str_replace("\'", "&#39;", $rowPgr['p_name']);
?>
<div class="pull-left">
  <h4><span class="glyphicon glyphicon-blackboard"></span> <b class="text-warning">Program : <?= $p_nameTitle ?></b></h4>
</div>

<div class="pull-right">
  <div class="btn-group">
    <button class="btn btn-success btn-sm" onclick="loadContent('masterDetail' ,'register', '<?= $p_id ?>')"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
  </div>
</div>

<br><br><br>
<form class="form-horizontal" enctype="multipart/form-data" id="studyForm" name="studyForm">
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Tahun pengajian :</label>
                <?php 
                    $year = mysqli_query($con, "SELECT * FROM year ORDER BY year");
                    $c_year = date('Y');
                ?>
            
                <div class="col-lg-2">
                    <select name="year" class="form-control input-sm">
                        <?php
                            while ($rs_y = mysqli_fetch_array($year)){
                        ?>
                        <option value="<?= $rs_y['y_id'] ?>" <?php if($rs_y['year']==$c_year) { echo 'selected'; } ?>><?= $rs_y['year'] ?></option>
                        <?php
                            }
                        ?>
                    </select> 
                </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Semister :</label>
            <div class="col-lg-2">
                <select id="semister" name="semister" class="form-control input-sm" required>
                    <option></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Awal pendaftaran :</label>
            <div class="col-lg-3">
                <input type="date" class="form-control input-sm" name="start_date" id="start_date">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Akhir pendaftaran :</label>
            <div class="col-lg-3">
                <input type="date" class="form-control input-sm" name="end_date" id="end_date">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Yuran :</label>
            <div class="col-lg-3">
                <input type="number" class="form-control input-sm" name="common_prize" id="common_prize">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Status :</label>
            <div class="col-lg-3">
                <select name="status" class="form-control input-sm" required>
                    <option value="1">Buka</option>
                    <option value="2">Tutup</option>
                </select>
            </div>
        </div>
    
    <input type="hidden" name='p_id' value="<?= $p_id ?>">
    
    </form>

<p class="text-center">
    <button onclick="m1StudySave()" class="btn btn-success btn-sm">SAVE</button>
    <div align="center" id="msg"></div>
</p>
