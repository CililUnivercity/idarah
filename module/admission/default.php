<h4><span class="glyphicon glyphicon-check"></span> PENERIMAAN MAHASISWA BARU</h4>
<hr>

<?php
    //Admision yaer setting
    $admissionRegister = mysqli_query($con, "SELECT * FROM admissionRegister WHERE ar_status='1'");
    $admissionRegisterRow = mysqli_fetch_array($admissionRegister);
    $cyear1 = $admissionRegisterRow['ar_year'];
    
    $sqlRegisBefore = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE p.payStatus='0' AND p.pre_register_year='$cyear1'");
    $numRegisBefore = mysqli_num_rows($sqlRegisBefore);
    
    $sqlRegisAfter = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE p.payStatus='1' AND p.pre_register_year='$cyear1'");
    $numRegisAfter = mysqli_num_rows($sqlRegisAfter);
    
    $sqlRegisTrans = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE p.payStatus='1' and p.type='1' AND p.pre_register_year='$cyear1'");
    $numRegisTrans = mysqli_num_rows($sqlRegisTrans);
    
    $sqlRegisMuqaddimah = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE p.payStatus='1' and s.muqaddimah='1' AND p.pre_register_year='$cyear1'");
    $numRegisMuqaddimah = mysqli_num_rows($sqlRegisMuqaddimah);
?>

<div class="col-lg-3 col-md-6">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-comments fa-5x"></i>
                </div>
                <div class="col-xs-9 text-center">
                    <div class="huge"><h1><?= $numRegisBefore ?></h1></div>
                    <div class="huge"><b>PEMOHON</b></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-comments fa-5x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <div class="huge"><h1><?= $numRegisAfter ?></h1></div>
                    <div class="huge"><b>TERDAFTAR (TAHUN 1)</b></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-comments fa-5x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <div class="huge"><h1><?= $numRegisTrans ?></h1></div>
                    <div><b>TERDAFTAR (TRANSFER)</b></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-comments fa-5x"></i>
                </div>
                <div class="col-xs-9 text-center">
                    <div class="huge"><h1><?= $numRegisMuqaddimah ?></h1></div>
                    <div><b>MUQADDIMAH</B></div>
                </div>
            </div>
        </div>
    </div>
</div>

               