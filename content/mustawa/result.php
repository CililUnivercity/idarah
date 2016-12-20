<?php
    include '../../connect.php';
    $mustawadata = mysqli_query($con, "SELECT * FROM mustawadata");
?>
<h4>Hasil pengajian</h4>

<div id="mustawaContent">
    <div align="center">
        <form>
            <div class="form-group">
                <div class="col-lg-2">
                    
                </div>
                <div class="col-lg-2">
                    
                </div>
                <div class="col-lg-2">
                    <select class="form-control">
                        <option>--TAHUN--</option>
                        <?php
                            while($mustawadataResult = mysqli_fetch_array($mustawadata)){
                        ?>
                        <option><?= $mustawadataResult['level'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-lg-2">
                    <select class="form-control">
                        <option>--TAHUN--</option>
                    </select>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        </form>
    </div>
    
    
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>