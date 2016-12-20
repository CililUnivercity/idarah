<?php
    $class = $_GET['class'];
?>
<h4><span class="glyphicon glyphicon-print"></span> CALON MAHASISWA BILIK <?= $class ?></h4>
<hr>
<div class="pull-right">
    <a href="?page=admissions&&admissionpage=information" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> BACK</a>
    <a href="module/admission/print/exellIfn.php?class=<?= $class ?>" target="_blank" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span> EXELL</a>
    <a href="module/admission/print/wordIfn.php?class=<?= $class ?>" target="_blank" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span> PRINT</a>
</div>
<br><br>
<table class="table table-hover table-striped table-bordered">
    <tr>
        <td align="center"><div id="subText"><b>علامت</b></div></td>
        <td align="center"><div id="subText"><b>باف</b></div></td>
        <td align="center"><div id="subText"><b>ايبو</b></div></td>
        <td align="center"><div id="subText"><b>نمبر تليفون</b></div></td>
        <td align="center"><div id="subText"><b>سكوله</b></div></td>
        <td align="center"><div id="subText"><b>نام - نسب</b></div></td>
        <td align="center"><div id="subText"><b>بيل</b></div></td> 
    </tr>
    <?php
        $pretestMen = mysqli_query($con, "SELECT p.*,s.* FROM pretest p JOIN students s ON p.st_id=s.st_id WHERE p.testClass='$class' ORDER BY p.odrNumber");
        $i = 1;
        while($rowPretestMen = mysqli_fetch_array($pretestMen)){
            $fname = str_replace("\'", "&#39;", $rowPretestMen["firstname_jawi"]);
            $lname = str_replace("\'", "&#39;", $rowPretestMen["lastname_jawi"]);
            $sanawi_graduate = str_replace("\'", "&#39;", $rowPretestMen["sanawi_graduate"]);
            $house_number = str_replace("\'", "&#39;", $rowPretestMen["house_number"]);
            $place = str_replace("\'", "&#39;", $rowPretestMen["place"]);
            $post = str_replace("\'", "&#39;", $rowPretestMen["post"]);
            $telephone = str_replace("\'", "&#39;", $rowPretestMen["telephone"]);
            $t_village_name = str_replace("\'", "&#39;", $rowPretestMen["t_village_name"]);
            $t_road = str_replace("\'", "&#39;", $rowPretestMen["t_road"]);
            $t_subdistrict = str_replace("\'", "&#39;", $rowPretestMen["t_subdistrict"]);
            $t_district = str_replace("\'", "&#39;", $rowPretestMen["t_district"]);
            $t_province_sec = str_replace("\'", "&#39;", $rowPretestMen["t_province_sec"]);
            $sanawiVillage = str_replace("\'", "&#39;", $rowPretestMen["sanawiVillage"]);
            $mother_name = str_replace("\'", "&#39;", $rowPretestMen["mother_name"]);
            $mother_lastname = str_replace("\'", "&#39;", $rowPretestMen["mother_lastname"]);
            $father_name =  str_replace("\'", "&#39;", $rowPretestMen["father_name"]);
            $father_lastname = str_replace("\'", "&#39;", $rowPretestMen["father_lastname"]);
            
    ?>
        <tr>
            <td align="left">หมู่บ้าน <?= $t_village_name ?> เลขที่ <?= $house_number ?> หมู่ที่ <?= $place ?> ต.<?= $t_subdistrict ?> อ.<?= $t_district ?> จ.<?= $t_province_sec ?> <?= $post ?></td>
            <td align="left"><?= $father_name ?> - <?= $father_lastname ?></td>
            <td align="left"><?= $mother_name ?> - <?= $mother_lastname ?></td>
            <td align="center"><?= $telephone ?></td>
            <td align="right"><div id="subText"><?= $sanawi_graduate ?> , <?= $sanawiVillage ?></div></td>
            <td align="right"><div id="subText"><?= $fname ?> - <?= $lname ?></div></td>
            <td align="center"><?= $i ?></td>
        </tr>
    <?php
        $i++;
        }
    ?>
</table>