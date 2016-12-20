<?php
    include_once '../function/function.php';
?>

<form class="form-horizontal" id="examReportByTerm">
    <div class="form-group">
        
        <div class="col-lg-12 col-lg-offset-4">
            
            <div class="col-lg-2">
                <select class="form-control input-sm" name="term" id="term">
                    <option value="0">SEMESTER</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <div class="col-lg-2">
                <select class="form-control input-sm" name="year" id="year">
                    <option value="0">TAHUN</option>
                    <?php
                        $sql = year();
                        while($year = mysqli_fetch_array($sql)){
                    ?>
                    <option value="<?= $year['year'] ?>"><?= $year['year'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            
        </div>
        
    </div>

</form>

<button onclick="examReportByTerm()" class="btn btn-success btn-sm" name="save"><span class="glyphicon glyphicon-search"></span> SEARCH</button>
