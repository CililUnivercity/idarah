<?php
    include '../../connect.php';
    $class = $_POST['class'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];   
?>
    
    <div id="printableArea">
        
        <div class="pull-right">
            <a target="_blank" class="btn btn-success btn-sm" href="content/student/print/bachelorBiodataByClass.php?class=<?= $class ?>&faculty=<?= $faculty ?>&department=<?= $department ?>"><span class="glyphicon glyphicon-print"></span> PRINT EXCELL</a>
        </div>
        <br><br>
        <table class="table table-bordered table-hover table-striped">
            <tr style=" line-height: 5px;">
                <td align="center">BIL</td>
                <td align="center">NIM</td>
                <td align="center">NAMA - NASAB</td>
                <td align="center"><div id="main">نام - نسب</div></td>
                <td align="center">Alamat</td>
                <td align="center">NAMA IBU</td>
                <td align="center">NAMA BAPA</td>
                <td align="center">SANAWI DARI</td>
            </tr>
            <?php 
                $sql = mysqli_query($con, "SELECT * FROM students WHERE class='$class' AND ft_id='$faculty' AND dp_id='$department' AND student_id!=''");
                $i = 1;
                while ($result = mysqli_fetch_array($sql)){
                    $firstname_rumi = str_replace("\'", "&#39;", $result['firstname_rumi']);
                    $lastname_rumi = str_replace("\'", "&#39;", $result['lastname_rumi']);
                    $firstname_jawi = str_replace("\'", "&#39;", $result['firstname_jawi']);
                    $lastname_jawi = str_replace("\'", "&#39;", $result['lastname_jawi']);
                    $house_number = $result['house_number'];
                    $place = $result['place'];
                    $t_road = str_replace("\'", "&#39;", $result['t_road']);
                    $t_village_name = str_replace("\'", "&#39;", $result['t_village_name']);
                    $t_subdistrict= str_replace("\'", "&#39;", $result['t_subdistrict']);
                    $t_district = str_replace("\'", "&#39;", $result['t_district']);
                    $t_province_sec = str_replace("\'", "&#39;", $result['t_province_sec']);
                    $post = $result['post'];
                    $father_name = str_replace("\'", "&#39;", $result['father_name']);
                    $father_lastname = str_replace("\'", "&#39;", $result['father_lastname']);
                    $mother_name = str_replace("\'", "&#39;", $result['mother_name']);
                    $mother_lastname = str_replace("\'", "&#39;", $result['mother_lastname']);
                    $sanawi_graduate = str_replace("\'", "&#39;", $result['sanawi_graduate']);
            ?>
            <tr style=" line-height: 5px;">
                <td align="center" width="3%"><?= $i ?></td>
                <td align="center" width="10%"><?= $result['student_id'] ?></td>
                <td align="left" width="15%"><?= $firstname_rumi ?> - <?= $lastname_rumi ?></td>
                <td align="right" width="15%"><div id="subText"><?= $firstname_jawi ?> - <?= $lastname_jawi ?></div></td>
                <td align="left" width="25%"><?= $house_number ?> &nbsp; <b>ม.</b><?= $place ?> &nbsp; <b>ถนน.</b><?= $t_road ?> &nbsp; <b>หมู่บ้าน.</b><?= $t_village_name ?> <b>ต.</b><?= $t_subdistrict ?> &nbsp; <b>อ.</b> <?= $t_district ?> <b>จ.</b><?= $t_province_sec ?> <?= $post ?></td>
                <td align="left"><?= $mother_name ?> - <?= $mother_lastname ?></td>
                <td align="left"><?= $father_name ?> - <?= $father_lastname ?></td>
                <td align="right" width="5%"><div id="subText"><?= $sanawi_graduate ?></div></td>
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



