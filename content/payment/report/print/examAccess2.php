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
    <?php
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="MyXls.xls"');#ชื่อไฟล์
        header('Cache-Control: max-age=0');
    ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"

xmlns:x="urn:schemas-microsoft-com:office:excel"

xmlns="http://www.w3.org/TR/REC-html40">

<HTML dir="rtl" lang="ar">
    <head>

        <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
        
    </head>
      
    <body>
        <table x:str width="100%">
            <tr>
                <td colspan="6" align="center">
                    <font size="4px"><b> جامعة الشيخ داود الفطاني اﻹسلامية - جالا </b></font><br><br>
                    <font size="4px">نام اونتوق ففرفسأن فغكل <?= $termRg ?>  تاهون اكاديميك <?= $year ?></font><br>
                    <font size="4px"><?= $fakulty_name ?> <font size="4px">&nbsp;&nbsp;&nbsp;<?= $department_name ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; الفرقة <?= $cname ?> </font>
                </td>  
            </tr>
        </table>

        <table x:str border="1" width="100%">
            <tr style=" line-height: 5px;">
                        <td aling="center">UJIAN</td>
                        <td aling="center">YURAN</td>
                        <td align="center">JENIS KELAMIN</td>
                        <td align="center"><div id="main"> نسب</div></td>
                        <td align="center"><div id="main">نام </div></td>
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
                         <td align="right"><div id="subText"><?= $lastname_jawi ?></div></td>
                        <td align="right"><div id="subText"><?= $firstname_jawi ?></div></td>
                        <td align="center"><?= $result['student_id'] ?></td>
                        <td align="center"><?= $i ?></td>
                    </tr>
                    <?php
                        $i++;
                        }
                    ?>
            </tbody>
        </table>
          
    </body>

</html>