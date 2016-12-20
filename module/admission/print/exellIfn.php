<?php
    header("Content-Type: application/vnd.ms-excel");
    header('Content-Disposition: attachment; filename="MyXls.xls"');#ชื่อไฟล์
    header('Cache-Control: max-age=0');
?>
<?php
    include '../../../connect.php';
    $class = $_GET['class'];  
?>

<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
    
    
<HTML dir="rtl" lang="ar">

<HEAD>

    <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
    <style>
        body {
            height: 842px;
            width: 595px;
            /* to centre page on screen*/
            margin-left: auto;
            margin-right: auto;
        }
            table {
        border-collapse: collapse;
            }
            @font-face {
            font-family: "jawi";
            src: url(font/jawi.ttf);
        }

        #main{
            font:25px "jawi";
        }
        #subText{
            font: 18px "jawi";
        }
        #thai{
            font: 12px "jawi";
        }
    </style>
</HEAD>
    
    <BODY>
        
        <table>
           <tr>
                <td colspan="7" align="center"><?= $class ?> چالون مهاسيسوا بيليق </td>
            </tr> 
            <tr>
                <td colspan="7"</td>
            </tr>
        </table>
        
        <table border="1">
            
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
                            $telephone = $rowPretestMen["telephone"];
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
                            <td><?= "Tel-".$telephone ?></td>
                            <td align="right"><div id="subText"><?= $sanawi_graduate ?> , <?= $sanawiVillage ?></div></td>
                            <td align="right"><div id="subText"><?= $fname ?> - <?= $lname ?></div></td>
                            <td align="center"><?= $i ?></td>
                        </tr>
                    <?php
                        $i++;
                        }
                    ?>
                </table>

    </BODY>

</HTML>