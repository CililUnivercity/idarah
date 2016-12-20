<div class="pull-left">
  <h4><span class="glyphicon glyphicon-blackboard"></span> <b class="text-warning">Belajar</b></h4>
</div>

<div class="pull-right">
  <div class="btn-group">
    <button class="btn btn-success btn-sm" onclick="loadContent('bachelorList' ,'register', '')"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
  </div>
</div>
<br><br><br>
<?php
    include("../connect.php");
?>
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
            <label class="col-lg-3 control-label">Harga daftar umum :</label>
            <div class="col-lg-3">
                <input type="number" class="form-control input-sm" name="common_prize" id="common_prize">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Harga daftar khusus :</label>
            <div class="col-lg-3">
                <input type="number" class="form-control input-sm" name="special_prize" id="special_prize">
            </div>
        </div>
    
        <div class="form-group">
            <label class="col-lg-3 control-label">Harga ujian :</label>
            <div class="col-lg-3">
                <input type="number" class="form-control input-sm" name="exam" id="exam">
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
    
    </form>

<p class="text-center">
    <button onclick="studySave()" class="btn btn-success btn-sm">SAVE</button>
    <div align="center" id="msg"></div>
</p>