<?php
    $termRg = $_POST['termRg'];
    $class = $_POST['classRoom'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    $year = $_POST['year'];
    $status = $_POST['status'];
    
    include("../function/function.php"); 
    //echo $department;
?>
    
    <div id="printableArea">
        
        <div class="pull-right">
            <a target="_blank" class="btn btn-success btn-sm" href="content/payment/report/print/examReportByClass.php?termRg=<?= $termRg ?>&class=<?= $class ?>&faculty=<?= $faculty ?>&department=<?= $department ?>&year=<?= $year ?>&status=<?= $status ?>"><span class="glyphicon glyphicon-print"></span> PRINT</a>
        </div>
        <br><br>
        <table class="table table-bordered table-hover table-striped">
            <tr style=" line-height: 5px;">
                <td align="center">BIL</td>
                <td align="center">NIM</td>
                <td align="center">NAMA - NASAB</td>
                <td align="center"><div id="main">نام - نسب</div></td>
                <td align="center">TARIKH BAYAR</td>
                <td align="center">NO.RESIT</td>
            </tr>
            <?php 
                $sql = examReportByClass($termRg, $year, $class, $faculty, $department, $status);
                $i = 1;
                while ($result = mysqli_fetch_array($sql)){
                    $firstname_rumi = str_replace("\'", "&#39;", $result['firstname_rumi']);
                    $lastname_rumi = str_replace("\'", "&#39;", $result['lastname_rumi']);
                    $firstname_jawi = str_replace("\'", "&#39;", $result['firstname_jawi']);
                    $lastname_jawi = str_replace("\'", "&#39;", $result['lastname_jawi']);
            ?>
            <tr style=" line-height: 5px;">
                <td align="center"><?= $i ?></td>
                <td align="center"><?= $result['student_id'] ?></td>
                <td align="left"><?= $firstname_rumi ?> - <?= $lastname_rumi ?></td>
                <td align="right"><div id="subText"><?= $firstname_jawi ?> - <?= $lastname_jawi ?></div></td>
                <td align="center"><?= $result['pay_date'] ?></td>
                <td align="center"><?= $result['reciet_code'] ?></td>
            </tr>
            <?php
                $i++;
                }
            ?>
        </table>
    </div>
    
    <div align="center">
        <button type="button" class="btn btn-success" onclick="printDiv('printableArea')">Print <span class="glyphicon glyphicon-print"></span></button>
    </div>

