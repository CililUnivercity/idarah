<?php
    include '../../../function/connect.php';
?>
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
            <a class="btn btn-success btn-sm" onclick="mustawaReportSerachByYear('content/payment/report/action/mustawaReportSerachByYear.php', 'lastStatement')"><span class="glyphicon glyphicon-search"></span> Cari</a>
        </div>