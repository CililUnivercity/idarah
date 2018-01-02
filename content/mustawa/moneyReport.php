<?php
    include '../../connect.php';
    $mustawadata = mysqli_query($con, "SELECT * FROM mustawadata");
?>
<h4>Laporan duit daftar</h4>
<div class="pull-left">
    <a class="btn btn-success btn-sm" onclick="filterSelection('1')">GRUP</a>
    <a class="btn btn-success btn-sm" onclick="filterSelection('2')">SEMUA</a>
</div>
<br><br>
<div id="filterSelection1" style="display: none">
    <div align="center">
        <form class="form-horizontal" name="mustawaSearch" id="mustawaSearch">
            <div class="form-group">
                <div class="col-lg-2">
                    
                </div>
                <div class="col-lg-2">
                    
                </div>
                <div class="col-lg-2">
                    <select class="form-control" name="mustawaData_id" id="mustawaData_id" onchange="mustawaProgramSelect()">
                        <option value="0">--Program--</option>
                        <?php
                            while($mustawadataResult = mysqli_fetch_array($mustawadata)){
                        ?>
                        <option value="<?= $mustawadataResult['mustawaData_id'] ?>">Mustawa : <?= $mustawadataResult['level'] ?> Tahun : <?= $mustawadataResult['year'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-lg-2">
                    <select class="form-control" name="group" id="group">
                            <option value="0">--Grup--</option>
                        </select>
                </div>
                <div class="col-lg-2" id="selectAlert">
                    
                </div>
            </div>
        </form>
        
        <div align="center">
            <a class="btn btn-success btn-sm" onclick="mustawaReportSerach('content/mustawa/action/mustawaReportSerach.php', 'subcontent')"><span class="glyphicon glyphicon-search"></span> Cari</a>
        </div>
       
    </div>
</div>
<div id="filterSelection2" style="display: none">
    <div align="center">
        <form class="form-horizontal" name="mustawaSearchByYear" id="mustawaSearchByYear">
            <div class="form-group">
                <div class="col-lg-2">
                    
                </div>
                
                <div class="col-lg-2">
                    
                </div>
                <div class="col-lg-1">
                    
                </div>
                <div class="col-lg-2">
                    <select class="form-control" name="mustawaData_id_a" id="mustawaData_id_a" onchange="mustawaProgramSelect()">
                        <option value="0">--Program--</option>
                        <?php
                            $mustawadata = mysqli_query($con, "SELECT * FROM mustawadata");
                            while($mustawadataResult = mysqli_fetch_array($mustawadata)){
                        ?>
                        <option value="<?= $mustawadataResult['mustawaData_id'] ?>">Mustawa : <?= $mustawadataResult['level'] ?> Tahun : <?= $mustawadataResult['year'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                
                <div class="col-lg-2" id="selectAlert">
                    
                </div>
            </div>
        </form>
        
        <div align="center">
            <a class="btn btn-success btn-sm" onclick="mustawaReportSerachByYear('content/mustawa/action/mustawaReportSerachByYear.php', 'subcontent')"><span class="glyphicon glyphicon-search"></span> Cari</a>
        </div>
        <br>   
       
    </div>
</div>
<br>
<div id="subcontent">
        <br><br><br><br><br>
</div>

