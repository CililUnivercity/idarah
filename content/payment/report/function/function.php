<?php
    include 'connect.php';
    $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register WHERE p_id='0')");
    $rs_register = mysqli_fetch_array($register);
    $year_register = $rs_register['year'];

    //Current year and term
    $cy = $year_register; /*Current year are receive from max of re_id in register table*/
    $term = $rs_register['term_id'];
            
    $c1 = $year_register;
    $c2 = $year_register-1;
    $c3 = $year_register-2;
    $c4 = $year_register-3;
    
    function year(){
        include 'connect.php';
        $sql = mysqli_query($con, "SELECT * FROM year ORDER BY year");
        return $sql;
    }
    
    function sumYuranMoney(){
        include 'connect.php';
        $sql = mysqli_query($con, "SELECT p.*,s.*,SUM(p.money) AS money,COUNT(p.st_id) AS people FROM payments p INNER JOIN students s ON p.st_id=s.st_id WHERE s.program='0' GROUP BY p.pay_date ORDER BY p.pay_date DESC LIMIT 0,10");
        return $sql;
    }
    
    function searchFromTo($from, $to){
        include 'connect.php';
        sleep(1);
        $sql = mysqli_query($con, "SELECT p.*,s.*,SUM(p.money) AS money,COUNT(p.st_id) AS people FROM payments p INNER JOIN students s ON p.st_id=s.st_id WHERE s.program='0' AND (pay_date BETWEEN '$from' AND '$to') GROUP BY pay_date ORDER BY pay_date");
        return $sql;
    }
    
    function faculty(){
        include 'connect.php';
        $faculty = mysqli_query($con, "SELECT * FROM fakultys");
        return $faculty;
    }
    
    function department(){
        include 'connect.php';
        $department = mysqli_query($con, "SELECT * FROM departments");
        return $department;
    }
    
    function yuranReportByClass($payStatus, $faculty, $department, $class, $term, $year_register){
        include 'connect.php'; 
        if($payStatus == '1'){
            $yuranReportByClass = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s 
                INNER JOIN student_register sr ON s.st_id=sr.st_id
                LEFT JOIN payments p ON sr.sr_id=p.sr_id
                WHERE s.class='$class' and s.ft_id='$faculty' and s.dp_id='$department' and sr.academic_year='$year_register' and sr.term='$term' ORDER BY s.student_id
                ");
        }else{
            $yuranReportByClass = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s 
                INNER JOIN student_register sr ON s.st_id=sr.st_id
                LEFT JOIN payments p ON sr.sr_id=p.sr_id
                WHERE s.class='$class' and s.ft_id='$faculty' and s.dp_id='$department' and sr.academic_year='$year_register' and sr.term='$term' and sr.pay_status='$payStatus' ORDER BY s.student_id
                ");
        }
        return $yuranReportByClass;
    }
    
    function yuranReportByterm($year, $term){
        include 'connect.php';
        $sql = mysqli_query($con, "SELECT sr.*,p.*,s.* FROM student_register sr
                                   INNER JOIN payments p ON sr.sr_id=p.sr_id 
                                   INNER JOIN students s ON sr.st_id=s.st_id
                                   WHERE sr.academic_year='$year' AND sr.term='$term' AND s.program='0' AND sr.pay_status='SUDAH LUNAS'
                                   ORDER BY p.reciet_code
                                   ");
        return $sql;
    }
    
    function totalTermMoney($year, $term){
        include 'connect.php';
        $sql = mysqli_query($con, "SELECT sum(p.money) AS totalMoney,sr.*,p.*,s.* FROM student_register sr
                                   INNER JOIN payments p ON sr.sr_id=p.sr_id 
                                   INNER JOIN students s ON sr.st_id=s.st_id
                                   WHERE sr.academic_year='$year' AND sr.term='$term' AND s.program='0'
                                   ORDER BY p.reciet_code
                                   ");
        return $sql;
    }
    
    function masterSumYuranMoney(){
        include 'connect.php';
        $sql = mysqli_query($con, "SELECT p.*,s.*,SUM(p.money) AS money,COUNT(p.st_id) AS people FROM payments p INNER JOIN students s ON p.st_id=s.st_id WHERE s.program='0' GROUP BY p.pay_date ORDER BY p.pay_date DESC LIMIT 0,10");
        return $sql;
    }
    
    function masterDataProgram(){
        include 'connect.php';
        $sql = mysqli_query($con, "SELECT * FROM program");
        return $sql;
    }
    
    function MasterSearchFromTo($from, $to, $program){
        include 'connect.php';
        sleep(1);
        $sql = mysqli_query($con, "SELECT p.*,s.*,SUM(p.money) AS money,COUNT(p.st_id) AS people FROM payments p INNER JOIN students s ON p.st_id=s.st_id WHERE s.program='$program' AND (pay_date BETWEEN '$from' AND '$to') GROUP BY pay_date ORDER BY pay_date");
        return $sql;
    }
    function masterYuranReportByterm($year, $term, $program){
        include 'connect.php';
        $sql = mysqli_query($con, "SELECT sr.*,p.*,s.* FROM student_register sr
                                   INNER JOIN payments p ON sr.sr_id=p.sr_id 
                                   INNER JOIN students s ON sr.st_id=s.st_id
                                   WHERE sr.academic_year='$year' AND sr.term='$term' AND s.program='$program'
                                   ORDER BY p.reciet_code
                                   ");
        return $sql;
    }
    function examAccess($termRg, $year, $class, $faculty, $department){
        include 'connect.php';
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
        return $sql;
    }
    function examReportByClass($termRg, $year, $class, $faculty, $department, $status){
        include 'connect.php';
        if($status == '1'){
            $sql = mysqli_query($con, "SELECT s.*,srx.*,xp.* FROM students s 
                 INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                 LEFT JOIN exam_pay xp ON srx.srx_id=xp.srx_id
                 WHERE s.class='$class' and s.ft_id='$faculty' and s.dp_id='$department' and srx.year='$year' and srx.term='$termRg' ORDER BY s.student_id"
                 );
        }else{
            $sql = mysqli_query($con, "SELECT s.*,srx.*,xp.* FROM students s 
                 INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                 LEFT JOIN exam_pay xp ON srx.srx_id=xp.srx_id
                 WHERE s.class='$class' and s.ft_id='$faculty' and s.dp_id='$department' and srx.year='$year' and srx.term='$termRg' and srx.pay_status='$status' ORDER BY s.student_id"
                 );
        }
        return $sql;
    }
    function examReportByterm($year, $term){
        include 'connect.php';
        $sql = mysqli_query($con, "SELECT srx.*,xp.*,s.* FROM student_register_exam srx
                                   INNER JOIN exam_pay xp ON srx.srx_id=xp.srx_id 
                                   INNER JOIN students s ON srx.st_id=s.st_id
                                   WHERE srx.year='$year' AND srx.term='$term' AND s.program='0' AND srx.pay_status='SUDAH LUNAS'
                                   ORDER BY xp.reciet_code
                                   ");
        return $sql;
    }
?>