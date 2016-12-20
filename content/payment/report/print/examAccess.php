<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../../../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional theme -->
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->

    
    <title>LAPORAN YURAN</title>
    
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
            font:35px "jawi";
        }
        #subText{
            font: 20px "jawi";
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
                include '../../../../connect.php';
                $termRg = $_GET['termRg'];
                $class = $_GET['class'];
                $faculty = $_GET['faculty'];
                $department = $_GET['department'];
                $year = $_GET['year'];
                
                //Get faculty data
                $fakulty_data = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$faculty'");
                $rs_fakultydata = mysqli_fetch_array($fakulty_data);
                $fakulty_name = $rs_fakultydata['ft_arab_name'];

                //Get department data
                $department_data = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$department'");
                $rs_department = mysqli_fetch_array($department_data);
                $department_name = $rs_department['dp_arab_name'];

                //Set class system
                $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register)");
                $rs_register = mysqli_fetch_array($register);
                $year_register = $rs_register['year'];

                $c1 = $year_register ;
                $c2 = $year_register-1;
                $c3 = $year_register-2;
                $c4 = $year_register-3;

                //Set class name
                $class_check = $class;
                if($class_check == $c1){ $cname = '1'; }
                if($class_check == $c2){ $cname = '2'; }
                if($class_check == $c3){ $cname = '3'; }
                if($class_check == $c4){ $cname = '4'; }
                
                if($department=='0'){
                $sql = mysqli_query($con, "SELECT p.reciet_code AS yc,px.reciet_code AS ec,s.*,sr.*,sx.*,p.*,px.* FROM students s
                                INNER JOIN student_register sr ON s.st_id=sr.st_id
                                INNER JOIN student_register_exam sx ON s.st_id=sx.st_id
                                INNER JOIN payments p ON s.st_id=p.st_id
                                INNER JOIN exam_pay px ON s.st_id=px.st_id
                                WHERE s.class='$class' AND s.ft_id='$faculty'
                                AND sr.academic_year='$year' AND sr.term='$termRg' AND sr.pay_status='SUDAH LUNAS'
                                AND sx.year='$year' AND sr.term='$termRg' AND sx.pay_status='SUDAH LUNAS'
                                AND p.academicYear='$year'
                                AND px.academic_year='$year'
                                ORDER BY s.student_id
                                ");
                }else{
                    $sql = mysqli_query($con, "SELECT p.reciet_code AS yc,px.reciet_code AS ec,s.*,sr.*,sx.*,p.*,px.* FROM students s
                                INNER JOIN student_register sr ON s.st_id=sr.st_id
                                INNER JOIN student_register_exam sx ON s.st_id=sx.st_id
                                INNER JOIN payments p ON s.st_id=p.st_id
                                INNER JOIN exam_pay px ON s.st_id=px.st_id
                                WHERE s.class='$class' AND s.ft_id='$faculty' AND s.dp_id='$department'
                                AND sr.academic_year='$year' AND sr.term='$termRg' AND sr.pay_status='SUDAH LUNAS'
                                AND sx.year='$year' AND sr.term='$termRg' AND sx.pay_status='SUDAH LUNAS'
                                AND p.academicYear='$year'
                                AND px.academic_year='$year'
                                ORDER BY s.student_id
                                ");
                }
                ?>
	<body>	
            
            <br><br>
            <div id="printableArea">
                
                <table width="100%">
                    <tr align="center">
                        <td align="center">
                            <div id="main">جامعة الشيخ داود الفطاني اﻹسلامية - جالا </div>
                            <div id="subText"> نام اونتوق ففرفسأن  فغكل <?= $termRg ?>  تاهون اكاديميك <?= $year ?></div>    
                            <div id="subText"><?= $fakulty_name ?> <font size="4px">&nbsp;&nbsp;&nbsp;<?= $department_name ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; الفرقة <?= $cname ?> </div>
                        </td>
                    </tr>
                </table>
                
                <table border="1px" width="100%">
                    <tr style=" line-height: 2px;">
                        <td align="middle">UJIAN</td>
                        <td align="middle">YURAN</td>
                        <td align="center">JENIS KELAMIN</td>
                        <td align="center"><div id="main">نام - نسب</div></td>
                        <td align="center">NIM</td>
                        <td align="center">BIL</td>
                    </tr>
                    <?php 
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
                <button type="button" class="btn btn-success btn-sm" onclick="printDiv('printableArea')">Print <span class="glyphicon glyphicon-print"></span></button>
            </div>
            
    </body>
</html>
