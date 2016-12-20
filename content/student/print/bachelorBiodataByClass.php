<?php
                include '../../../connect.php';
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
                
                 
                $sql = mysqli_query($con, "SELECT * FROM students WHERE class='$class' AND ft_id='$faculty' AND dp_id='$department' AND student_id!=''");
                
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
                <td colspan="8" align="center">
                    <font size="4px"><b> جامعة الشيخ داود الفطاني اﻹسلامية - جالا </b></font><br><br>
                    <font size="4px">بيوداتا مهاسيسوا</font><br>
                    <font size="4px"><?= $fakulty_name ?> <font size="4px">&nbsp;&nbsp;&nbsp;<?= $department_name ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; الفرقة <?= $cname ?> </font>
                </td>  
            </tr>
        </table>

        <table x:str border="1" width="100%">
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
            </tbody>
        </table>
          
    </body>

</html>