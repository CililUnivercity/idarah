<?php
    $class = $_GET['class'];
?>
<h4><span class="glyphicon glyphicon-print"></span> CALON MAHASISWA BILIK <?= $class ?></h4>
<hr>
<div class="pull-right">
    <a href="?page=admissions&&admissionpage=report" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> BACK</a>
    <a href="module/admission/print/exell.php?class=<?= $class ?>" target="_blank" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span> EXELL</a>
    <a href="module/admission/print/word.php?class=<?= $class ?>" target="_blank" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span> PRINT</a>
</div>
<br><br>
<table class="table table-hover table-striped table-bordered">
    <tr>
        <td align="center"><div id="subText"><b>فيليهن كدوا</b></div></td>
        <td align="center"><div id="subText"><b>فيليهن فرتام</b></div></td>
        <td align="center"><div id="subText"><b>نمبر</b></div></td>
        <td align="center"><div id="subText"><b>تليفون</b></div></td>
        <td align="center"><div id="subText"><b>نمبر دفتر</b></div></td>
        <td align="center"><div id="subText"><b>کمفوڠ</b></div></td>
        <td align="center"><div id="subText"><b>سكوله</b></div></td>
        <td align="center"><div id="subText"><b>نام - نسب</b></div></td>
        <td align="center"><div id="subText"><b>بيل</b></div></td> 
    </tr>
    <?php
        //Admision yaer setting
        $admissionRegister = mysqli_query($con, "SELECT * FROM admissionRegister WHERE ar_status='1'");
        $admissionRegisterRow = mysqli_fetch_array($admissionRegister);
        $cyear1 = $admissionRegisterRow['ar_year'];
    
        $pretestMen = mysqli_query($con, "SELECT p.*,s.* FROM pretest p JOIN students s ON p.st_id=s.st_id WHERE p.testClass='$class' AND p.pre_register_year='$cyear1' ORDER BY p.odrNumber");
        $i = 1;
        while($rowPretestMen = mysqli_fetch_array($pretestMen)){
            $fname = str_replace("\'", "&#39;", $rowPretestMen["firstname_jawi"]);
            $lname = str_replace("\'", "&#39;", $rowPretestMen["lastname_jawi"]);
            $sanawi_graduate = str_replace("\'", "&#39;", $rowPretestMen["sanawi_graduate"]);
            $testClass = $rowPretestMen['testClass'];
            $testNumber = $rowPretestMen['testNumber'];
            $odrNumber = $rowPretestMen['odrNumber'];
            $sanawiVillage = str_replace("\'", "&#39;", $rowPretestMen["sanawiVillage"]);
            $telephone = $rowPretestMen["telephone"];
            
            //Faculty and department choesed
            $first_ftId = $rowPretestMen['first_ftId'];
            $first_dpId = $rowPretestMen['first_dpId'];
            $second_ftId = $rowPretestMen['second_ftId'];
            $second_dpId = $rowPretestMen['second_dpId'];
            
            //First selection
                            if($first_dpId == '0'){
                                $fId = $first_ftId;
                                //Setting
                                if($fId == '122'){
                                    $selected = 'S';
                                }elseif($fId == '123'){
                                    $selected = 'U';
                                }elseif($sId == '124'){
                                    $selected = 'D';
                                }
                            }elseif($first_dpId != '0'){
                                $fId = $first_dpId;
                                switch ($fId){
                                    case 22:
                                        $selected = "PAI";
                                        break;
                                    case 23:
                                        $selected = "PBSM";
                                        break;
                                    case 28:
                                        $selected = "MM Dakwah";
                                        break;
                                }
                            }

                            //Second selection
                            if($second_dpId == '0'){
                                $sId = $second_ftId;
                                //Setting
                                if($sId == '122'){
                                    $selected2 = 'S';
                                }elseif($sId == '123'){
                                    $selected2 = 'U';
                                }elseif($sId == '124'){
                                    $selected2 = 'D';
                                }
                            }elseif($second_dpId != '0'){
                                $fId = $second_dpId;
                                switch ($fId){
                                    case 22:
                                        $selected2 = "PAI";
                                        break;
                                    case 23:
                                        $selected2 = "PBSM";
                                        break;
                                    case 28:
                                        $selected2 = "MM Dakwah";
                                        break;
                                }
                            }
            

    ?>
        <tr>
            <td align="center"><?= $selected2 ?></td>
            <td align="center"><?= $selected ?></td>
            <td align="center"><?= $testNumber ?></td>
            <td align="center"><?= $telephone ?></td>
            <td align="center"><?= $odrNumber ?></td>
            <td align="right"><div id="subText"><?= $sanawiVillage ?></div></td>
            <td align="right"><div id="subText"><?= $sanawi_graduate ?></div></td>
            <td align="right"><div id="subText"><?= $fname ?> - <?= $lname ?></div></td>
            <td align="center"><?= $i ?></td>
        </tr>
    <?php
        $i++;
        }
    ?>
</table>