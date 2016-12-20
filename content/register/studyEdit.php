<div class="pull-left">
  <h4><span class="glyphicon glyphicon-edit"></span> <b class="text-warning">Ubah</b></h4>
</div>

<div class="pull-right">
  <div class="pull-right">
  <div class="btn-group">
    <button class="btn btn-success btn-sm" onclick="loadContent('bachelorList' ,'register', '')"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
  </div>
</div>
</div>
<br><br><br>
<?php
    include("../connect.php");
    $id = $_GET['id'];
    $sql = mysqli_query($con, "SELECT * FROM register WHERE re_id='$id'");
    $rs = mysqli_fetch_array($sql);
    
    $term = $rs['term_id'];
?>

    <form class="form-horizontal" enctype="multipart/form-data" name="studyForm" id="studyForm">
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Tahun pengajian :</label>
                <?php 
                    $year = mysqli_query($con, "SELECT * FROM year ORDER BY year");  
                    $year_s = mysqli_query($con, "SELECT * FROM register WHERE re_id='$id'");
                    $rs_s = mysqli_fetch_array($year_s);
                    $data = $rs_s['y_id'];
                ?>
            
                <div class="col-lg-2">
                    <select name="year" class="form-control input-sm" disabled>
                        <?php
                            while ($rs_y = mysqli_fetch_array($year)){
                        ?>
                        <option value="<?= $rs_y['y_id'] ?>" <?php if($rs_y['y_id']==$rs_s['y_id']) { echo 'selected'; } ?>><?= $rs_y['year'] ?></option>
                        <?php
                            }
                        ?>
                    </select> 
                </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Semister :</label>
            <div class="col-lg-2">
                <select name="semister" class="form-control input-sm" disabled>
                    <option value="1" <?= $term == '1' ? ' selected="selected"' : ''?>> 1</option>
                    <option value="2" <?= $term == '2' ? ' selected="selected"' : ''?>>2</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Awal pendaftaran :</label>
            <div class="col-lg-3">
                <input type="date" class="form-control input-sm" name="start_date" value="<?= $rs['start_date'] ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Akhir pendaftaran :</label>
            <div class="col-lg-3">
                <input type="date" class="form-control input-sm" name="end_date" value="<?= $rs['end_date'] ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Harga daftar umum :</label>
            <div class="col-lg-3">
                <input type="number" class="form-control input-sm" name="common_prize" value="<?= $rs['common_prize'] ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Harga daftar khusus :</label>
            <div class="col-lg-3">
                <input type="number" class="form-control input-sm" name="special_prize" value="<?= $rs['special_prize'] ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Status :</label>
            <div class="col-lg-3">
                <select name="status" class="form-control input-sm" required>
                    <?php
                        $status = $rs['tu_id'];
                    ?>
                    <option value="1" <?= $status == '1' ? ' selected="selected"' : ''?>>Buka</option>
                    <option value="2" <?= $status == '2' ? ' selected="selected"' : ''?>>Tutup</option>
                </select>
            </div>
        </div>
        
        <input type="hidden" name="id" value="<?= $id ?>">
           
    </form>
    
    <p class="text-center">
        <button onclick="saveEditStudy()" class="btn btn-success btn-sm" name="save">SAVE</button>
        <div align="center" id="msg"></div>
    </p>
    