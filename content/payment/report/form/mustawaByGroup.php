<?php
    include '../../../function/connect.php';
    $mustawadata = mysqli_query($con, "SELECT * FROM mustawadata");
?>
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
            <a class="btn btn-success btn-sm" onclick="mustawaReportSerach('content/payment/report/action/mustawaReportSerach.php', 'lastStatement')"><span class="glyphicon glyphicon-search"></span> Cari</a>
        </div>