<?php
    $class = $_GET['class'];
?>
<h4><span class="glyphicon glyphicon-print"></span> MEREKA YANG BELUM CUKUP SYARAT BILIK <B><?= $class ?></B></h4>
<hr>

<div class="pull-right">
    <a href="?page=admissions&&admissionpage=filterReport" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> BACK</a>
    <a href="module/admission/print/exellfillt.php?class=<?= $class ?>" target="_blank" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span> EXELL</a>
</div>
<br><br>
<table class="table table-hover table-striped table-bordered">
    <tr>
        <td align="center"><div id="subText"><b>شرط يڠ بلوم چوکوف</b></div></td>
        <td align="center"><div id="subText"><b>نمبر تليفون</b></div></td>
        <td align="center"><div id="subText"><b>سكوله</b></div></td>
        <td align="center"><div id="subText"><b>نام - نسب</b></div></td>
        <td align="center"><div id="subText"><b>بيل</b></div></td> 
    </tr>
    <?php
        $admissionRegister = mysqli_query($con, "SELECT * FROM admissionRegister WHERE ar_status='1'");
        $admissionRegisterRow = mysqli_fetch_array($admissionRegister);
        $cyear1 = $admissionRegisterRow['ar_year'];
        
        $pretestMen = mysqli_query($con, "SELECT p.*,s.* FROM pretest p JOIN students s ON p.st_id=s.st_id WHERE p.testClass='$class' AND p.payStatus='1' AND p.pre_register_year='$cyear1' ORDER BY p.odrNumber");
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
            $certificate = $rowPretestMen['certificate'];
            $confCertificate = $rowPretestMen['confCertificate'];
            $citizen_book = $rowPretestMen['citizen_book'];
            $id_book = $rowPretestMen['id_book'];
            $photo = $rowPretestMen['photo'];
    ?>
        <tr>
            <td align="right">
                <div id="subText">
                    <?php
                    
                        //Phot case
                        if($photo == 1){
                            $showPhoto = '';
                        }else{
                            $showPhoto = 'ݢمبر';
                        }

                        //id_book case
                        if($id_book == 1){
                            $showId_book = '';
                        }else{
                            $showId_book = '| سالينن کاد ڤڠنالن';
                        }

                        //citizen_book
                        if($citizen_book == 1){
                            $showCitizen_book = '';
                        }else{
                            $showCitizen_book = '| سالينن سناراي دافور';
                        }

                        //certificate case
                        if($certificate == '' && $confCertificate == ''){
                            $showCertificate = '| شهادة /  تصديق';
                        }elseif ($certificate == '' && $confCertificate == '1'){
                            $showCertificate = '';
                        }elseif ($certificate == '1' && $confCertificate == ''){
                            $showCertificate = '| شهادة';
                        }else{   
                            $showCertificate = '';
                        }

                        echo $showPhoto.$showId_book.$showCitizen_book.$showCertificate;
                    
                    ?>
                </div>
                
            </td>
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