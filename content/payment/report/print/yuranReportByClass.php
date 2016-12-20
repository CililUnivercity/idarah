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
        ?>
	<body>	
            
            <br><br>
            <div id="printableArea">
        <?php
        
            $term_s = $_GET['term'];
            $year_s = $_GET['year'];
            $class_s = $_GET['class'];
            $faculty_s = $_GET['faculty'];
            $department_s = $_GET['department'];
            $status_s = $_GET['status'];

            if($status_s == '1'){
                $sql = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s 
                    INNER JOIN student_register sr ON s.st_id=sr.st_id
                    LEFT JOIN payments p ON sr.sr_id=p.sr_id
                    WHERE s.class='$class_s' and s.ft_id='$faculty_s' and s.dp_id='$department_s' and sr.academic_year='$year_s' and sr.term='$term_s' ORDER BY s.student_id");
            }else{
                $sql = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s 
                    INNER JOIN student_register sr ON s.st_id=sr.st_id
                    LEFT JOIN payments p ON sr.sr_id=p.sr_id
                    WHERE s.class='$class_s' and s.ft_id='$faculty_s' and s.dp_id='$department_s' and sr.academic_year='$year_s' and sr.term='$term_s' and sr.pay_status='$status_s' ORDER BY s.student_id");
            }

            //Get faculty data
            $fakulty_data = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$faculty_s'");
            $rs_fakultydata = mysqli_fetch_array($fakulty_data);
            $fakulty_name = $rs_fakultydata['ft_arab_name'];

            //Get department data
            $department_data = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$department_s'");
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
            $class_check = $class_s;
            if($class_check == $c1){ $cname = '1'; }
            if($class_check == $c2){ $cname = '2'; }
            if($class_check == $c3){ $cname = '3'; }
            if($class_check == $c4){ $cname = '4'; }
        ?>
	<body>			
            <div id="printableArea">
                
                <table width="100%">
                    <tr align="center">
                        <td align="center">
                            <div id="main">جامعة الشيخ داود الفطاني اﻹسلامية - جالا </div>
                            <div id="subText"> يوران  فغكل <?= $term_s ?>  تاهون اكاديميك <?= $year_s ?></div>    
                            <div id="subText"><?= $fakulty_name ?> <font size="4px">&nbsp;&nbsp;&nbsp;<?= $department_name ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; الفرقة <?= $cname ?> </div>
                        </td>
                    </tr>
                </table>
            
                <table border="1px" width="100%">
                      <tr height="2px">
                          <td align="center" height="30"><div id="subText"><b>نمبر رشيد</b></div></td>
                          <td align="center"><div id="subText"><b>تغكل باير</b></div></td>
                          <td align="center"><div id="subText"><b>يوران</b></div></td>
                        <td align="center"><div id="subText"><b>باقا</b></div></td>
                        <td align="center"><div id="subText"><b>نام</b></div></td>
                        <td align="center"><div id="subText"><b>نمبرفوكؤ</b></div></td>
                        <td align="center"><div id="subText"><b>بيل</b></div></td>
                      </tr>
                    <tbody>
                        <?php
                          $sumMoney = 0 ;
                          $i = 0 ;
                          while($rs_search = mysqli_fetch_array($sql)){
                              $i = $i+1; 
                        ?>
                        <tr>
                            <td align="center"><div id="subText"><?= $rs_search['reciet_code'] ?></div></td>
                          <td align="center"><div id="subText"><?= $rs_search['pay_date'] ?></div></td>
                          <td align="center"><div id="subText"><?= number_format($rs_search['money']) ?></div></td>
                          
                          <?php 
                            $sumMoney = ($rs_search['money'])+ ($sumMoney);
                          ?>
                          
                          <td align="right"><div id="subText"><?= $rs_search['lastname_jawi'] ?></div></td>
                          <td align="right"><div id="subText"><?= $rs_search['firstname_jawi'] ?></div></td>
                          <td align="center"><div id="subText"><?= $rs_search['student_id'] ?></div></td>
                          <td align="center"><div id="subText"><?= $i ?></div></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <table border="1px" width="100%">
                      <tr height="2px">
                          <td align="center" width="70%"><b><?= number_format($sumMoney) ?></b></td>
                            <td align="center" height="30" width="30%"><div id="subText"><b>جمله دويت سموا</b></div></td>
                      </tr>
                </table>
            </div>
            </div>
            <br>
            
            <div align="center">
                <button type="button" class="btn btn-success btn-sm" onclick="printDiv('printableArea')">Print <span class="glyphicon glyphicon-print"></span></button>
            </div>
            
    </body>
</html>
