<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional theme -->
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->

    
    <title>LAPORAN</title>
    
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
                include '../../connect.php';
                $class = $_GET['class'];
                $faculty = $_GET['faculty'];
                $department = $_GET['department'];
                
                
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
                
                $sql = mysqli_query($con, "SELECT * FROM students WHERE ft_id='$faculty' AND dp_id='$department' AND class='$class' AND student_id!='' ORDER BY student_id");
                
                ?>
	<body>	
            
            <br><br>
            <div id="printableArea">
                <table width="100%">
                    <tr align="center">
                        <td align="center">
                            <div id="main">جامعة الشيخ داود الفطاني اﻹسلامية - جالا </div> 
                            <div id="subText"><?= $fakulty_name ?> <font size="4px">&nbsp;&nbsp;&nbsp;<?= $department_name ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; الفرقة <?= $cname ?> </div>
                        </td>
                    </tr>
                </table>
                
                <table class="table table-bordered">
                    <thead>
                        <tr> 
                            <td align="center"><b><div id="subText">ݢمبر</div></b></td>
                            <td align="center"><b><div id="subText">سالينن کد فڠنلن</div></b></td>
                            <td align="center"><b><div id="subText">سالينن سناراي دافور</div></b></td>
                            <td align="center"><b><div id="subText">شهادة</div></b></td>
                            <td align="center"><b><div id="subText"><b>نام - نسب</b></div></td>
                            <td align="center"><b>#</b></td>
                          </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $i = 1;
                        while($row = mysqli_fetch_array($sql)){
                            $id = $row['st_id'];
                            $student_id = str_replace("\'", "&#39;", $row["student_id"]);
                            $name_r = str_replace("\'", "&#39;", $row["firstname_rumi"]);
                            $lastname_r = str_replace("\'", "&#39;", $row["lastname_rumi"]);
                            $name_j = str_replace("\'", "&#39;", $row["firstname_jawi"]);
                            $lastname_j = str_replace("\'", "&#39;", $row["lastname_jawi"]);
                            $certificate = $row["confCertificate"];
                            $photo = $row["photo"];
                            $citizenBook = $row["citizen_book"];
                            $id_book = $row['id_book'];

                            if($photo==''){
                                $photoResult = "<span class='glyphicon glyphicon-remove'></span>";
                            }else{
                                $photoResult = "<span class='glyphicon glyphicon-ok'></span>";
                            }

                            if($id_book==''){
                                $id_bookResult = "<span class='glyphicon glyphicon-remove'></span>";
                            }else{
                                $id_bookResult = "<span class='glyphicon glyphicon-ok'></span>";
                            }

                            if($citizenBook==''){
                                $citizenBookResult = "<span class='glyphicon glyphicon-remove'></span>";
                            }else{
                                $citizenBookResult = "<span class='glyphicon glyphicon-ok'></span>";
                            }

                            if($certificate==''){
                                $certificateResult = "<span class='glyphicon glyphicon-remove'></span>";
                            }else{
                                $certificateResult = "<span class='glyphicon glyphicon-ok'></span>";
                            }
                    ?>
                    
                        <tr id="<?= $id ?>">
                            <td align="center"><?= $photoResult ?></td>
                            <td align="center"><?= $id_bookResult ?></td>
                            <td align="center"><?= $citizenBookResult ?></td>
                            <td align="center"><?= $certificateResult ?></td>
                            <td align="right"><div id='subText'><?= $name_j ?> - <?= $lastname_j ?></div></td>
                            <td align="center"><?= $student_id ?></td>
                        </tr>
                    
                    <?php
                        $i++;
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            
            <div align="center">
                <button type="button" class="btn btn-success btn-sm" onclick="printDiv('printableArea')">Print <span class="glyphicon glyphicon-print"></span></button>
            </div>
            
    </body>
</html>
