<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Optional theme -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    
    <title>Calon mahasiswa JISDA</title>
    
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
    
    <script language="javascript" type="text/javascript">
        function printDiv(printableArea) {
            var printContents = document.getElementById(printableArea).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

    </head>
    <?php
        include '../../../connect.php';
        $class = $_GET['class'];  
    ?>
	<body>	
            
            <br><br>
            <div id="printableArea">
                
                <div id="main"><p class="text-center"><?= $class ?> چالون مهاسيسوا بيليق </p></div>
                
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
                        $pretestMen = mysqli_query($con, "SELECT p.*,s.* FROM pretest p JOIN students s ON p.st_id=s.st_id WHERE p.testClass='$class'");
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
                
            </div>
	<div align="center">
            <button type="button" class="btn btn-success" onclick="printDiv('printableArea')">Print <span class="glyphicon glyphicon-print"></span></button>
	</div>
    </body>
</html>


