<h4 class="text-center">DAFDAR MUSTAWA</h4>
<div class="pull-left">
    <h4><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH PENGAJIAN BARU</h4>
</div>
<div class="pull-right">
    <a onclick="loadContent('mustawa', 'register')" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> back</a>
    <a onclick="loadContent('mustawaAdd', 'register')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</a>
</div>
<br><br><br>

<form class="form-horizontal" enctype="multipart/form-data" name="mustawaForm" id="mustawaForm">
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Tahun pengajian :</label>
                <?php
                    include("../connect.php");
                    $currentYear = date('Y');
                ?>
            
                <div class="col-lg-3">
                    <select name="year" class="form-control input-sm" name='year' id="year">
                        <?php
                            $year = mysqli_query($con, "SELECT * FROM year");
                            while ($rs_y = mysqli_fetch_array($year)){
                        ?>
                        <option value="<?= $rs_y['year'] ?>" <?php if($rs_y['year']==$currentYear){ echo 'selected'; } ?>><?= $rs_y['year'] ?></option>
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
                <input type="date" class="form-control input-sm" name="startDate" id="startDate">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Akhir pendaftaran :</label>
            <div class="col-lg-3">
                <input type="date" class="form-control input-sm" name="endDate" id="endDate">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Harga daftar :</label>
            <div class="col-lg-3">
                <input type="number" class="form-control input-sm" name="prize" id="prize">
            </div>
        </div>
    
        <div class="form-group">
            <label class="col-lg-3 control-label">Harga daftar (ภาษาไทย):</label>
            <div class="col-lg-3">
                <input type="text" class="form-control input-sm" name="prize_thai" id="prize_thai">
            </div>
        </div>
    
        <div class="form-group">
            <label class="col-lg-3 control-label">Jumlah grup :</label>
            <div class="col-lg-3">
                <input type="number" min="1" class="form-control input-sm" name="group_number" id="group">
            </div>
        </div>
    
        <div class="form-group">
            <label class="col-lg-3 control-label">Level :</label>
            <div class="col-lg-3">
                <select class="form-control input-sm" name="level" id="level">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Status :</label>
            <div class="col-lg-3">
                <select name="status" class="form-control input-sm" id="status">
                    <option value="1">Buka</option>
                    <option value="0">Tutup</option>
                </select>
            </div>
        </div>
           
    </form>

    
    
    <p class="text-center">
        <button onclick="mustawaAddSave()" class="btn btn-success btn-sm" name="save">SAVE</button>
        <div align="center" id="process"></div>
    </p>
