<?php
    $termRg = $_POST['termRg'];
    $class = $_POST['classRoom'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    $year = $_POST['year'];
    
    include("../function/function.php"); 
    //echo $department;
?>
    
    <div id="printableArea">
        
        <div class="pull-right">
            <a target="_blank" class="btn btn-success btn-sm" href="content/payment/report/print/examAccess2.php?termRg=<?= $termRg ?>&class=<?= $class ?>&faculty=<?= $faculty ?>&department=<?= $department ?>&year=<?= $year ?>"><span class="glyphicon glyphicon-print"></span> PRINT EXELL</a>
            <a target="_blank" class="btn btn-success btn-sm" href="content/payment/report/print/examAccess.php?termRg=<?= $termRg ?>&class=<?= $class ?>&faculty=<?= $faculty ?>&department=<?= $department ?>&year=<?= $year ?>"><span class="glyphicon glyphicon-print"></span> PRINT</a>
        </div>
        <br><br>
        <table class="table table-bordered table-hover table-striped">
            <tr style=" line-height: 5px;">
                <td aling="center">UJIAN</td>
                <td aling="center">YURAN</td>
                <td align="center">JENIS KELAMIN</td>
                <td align="center"><div id="main">نام - نسب</div></td>
                <td align="center">NIM</td>
                <td align="center">BIL</td>
            </tr>
            <?php 
                $sql = examAccess($termRg, $year, $class, $faculty, $department);
                //echo "alert('$department');";
                $i = 1;
                while ($result = mysqli_fetch_array($sql)){
                    $firstname_rumi = str_replace("\'", "&#39;", $result['firstname_rumi']);
                    $lastname_rumi = str_replace("\'", "&#39;", $result['lastname_rumi']);
                    $firstname_jawi = str_replace("\'", "&#39;", $result['firstname_jawi']);
                    $lastname_jawi = str_replace("\'", "&#39;", $result['lastname_jawi']);
            ?>
            <tr style=" line-height: 5px;">
                <td align="center"><?= $result['ec'] ?></td>
                <td align="center"><?= $result['yc'] ?></td>
                <td align="center"><?= $result['gender'] ?></td>
                <td align="right"><div id="subText"><?= $firstname_jawi ?> - <?= $lastname_jawi ?></div></td>
                <td align="center"><?= $result['student_id'] ?></td>
                <td align="center"><?= $i ?></td>
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
