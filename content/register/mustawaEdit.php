<h4 class="text-center">DAFDAR MUSTAWA</h4>
<div class="pull-left">
    <h4><span class="glyphicon glyphicon-edit"></span> UBAH PENGAJIAN MUSTAWA</h4>
</div>
<div class="pull-right">
    <a onclick="loadContent('mustawa', 'register')" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> back</a>
    <a onclick="loadContent('mustawaAdd', 'register')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</a>
</div>
<br><br><br>

<?php
    include '../connect.php';
    $mustawaData_id = $_GET['id'];
    $mustawadata = mysqli_query($con, "SELECT * FROM mustawadata WHERE mustawaData_id='$mustawaData_id'");
    $mus_res = mysqli_fetch_array($mustawadata);

    //data get
    $mus_year = $mus_res['year'];
    $mus_startDate = $mus_res['startDate'];
    $mus_endDate = $mus_res['endDate'];
    $mus_prize = $mus_res['prize'];
    $mus_level = $mus_res['level'];
    $mus_status =  $mus_res['status'];
    $mus_prize_thai = str_replace("\'", "&#39;", $mus_res['prize_thai']);
    $mus_group_number = $mus_res['group_number'];
?>

<form class="form-horizontal" enctype="multipart/form-data" name="mustawaEditForm" id="mustawaForm">
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Tahun pengajian :</label>
            
                <div class="col-lg-3">
                    <select name="year" class="form-control input-sm" name='year' id="year">
                        <?php
                            $year = mysqli_query($con, "SELECT * FROM year");
                            while ($rs_y = mysqli_fetch_array($year)){
                        ?>
                        <option value="<?= $rs_y['year'] ?>" <?php if($rs_y['year']==$mus_year){ echo 'selected'; } ?>><?= $rs_y['year'] ?></option>
                        <?php
                            }
                        ?>
                    </select> 
                </div>
                <div class="col-lg-3" id="alertDataCount"></div>
        </div>
        
       
        <div class="form-group">
            <label class="col-lg-3 control-label">Awal pendaftaran :</label>
            <div class="col-lg-3">
                <input type="date" class="form-control input-sm" name="startDate" id="startDate" value="<?= $mus_startDate ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Akhir pendaftaran :</label>
            <div class="col-lg-3">
                <input type="date" class="form-control input-sm" name="endDate" id="endDate" value="<?= $mus_endDate ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Harga daftar :</label>
            <div class="col-lg-3">
                <input type="number" class="form-control input-sm" name="prize" id="prize" value="<?= $mus_prize ?>">
            </div>
        </div>
    
        <div class="form-group">
            <label class="col-lg-3 control-label">Harga daftar (ภาษาไทย):</label>
            <div class="col-lg-3">
                <input type="text" class="form-control input-sm" name="prize_thai" id="prize_thai" value="<?= $mus_prize_thai ?>">
            </div>
        </div>
    
        <div class="form-group">
            <label class="col-lg-3 control-label">Jumlah grup :</label>
            <div class="col-lg-3">
                <input type="number" min="1" class="form-control input-sm" name="group_number" id="group" value="<?= $mus_group_number ?>">
            </div>
        </div>
    
        <div class="form-group">
            <label class="col-lg-3 control-label">Level :</label>
            <div class="col-lg-3">
                <select class="form-control input-sm" name="level" id="level">
                    <?php
                        for($i=1; $i<=8; $i++){
                    ?>
                        <option value="<?= $i ?>" <?php if($i==$mus_level){echo 'selected';} ?>><?= $i ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Status :</label>
            <div class="col-lg-3">
                <select name="status" class="form-control input-sm" id="status" name="status">
                    <option value="1" <?php if($mus_status=='1'){echo 'selected';} ?>>Buka</option>
                    <option value="0" <?php if($mus_status=='0'){echo 'selected';} ?>>Tutup</option>
                </select>
            </div>
        </div>
    
        <input type="hidden" name="mustawaData_id" id="mustawaData_id" value="<?= $mustawaData_id ?>">
           
    </form>

    
    
    <p class="text-center">
        <button onclick="mustawaEditSave()" class="btn btn-success btn-sm" name="save">SAVE</button>
        <div align="center" id="process"></div>
    </p>
