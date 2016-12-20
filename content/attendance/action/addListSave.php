<?php
    header("content-type: text/javascript");
    include("../../connect.php");
    $re_id = $_POST['re_id'];
    $ft_id = $_POST['ft_id'];
    $dp_id = $_POST['dp_id'];
    $studyDay = $_POST['studyDay'];
    $studyClass = $_POST['studyClass'];
    $tc_id = $_POST['tc_id'];
    $classId = $_POST['class']; 
    
    include '../../function/function.php';
    $register = registerSelect($re_id);
    $term = $register['term_id'];
    $year = $register['year'];
    
    //Get subject and teacher from teachig table
    $registerSubject = mysqli_query($con, "SELECT * FROM registerSubject WHERE rs_id='$tc_id'");
    $rowRegisterSubject = mysqli_fetch_array($registerSubject);
    $s_id = $rowRegisterSubject['s_id'];
    $t_id = $rowRegisterSubject['t_id'];
    
    //Existing data checking
    $CHECK = mysqli_query($con, "SELECT * FROM attendance WHERE (ft_id='$ft_id' AND dp_id='$dp_id' AND studyClass='$studyClass' AND s_id='$s_id' AND studyDay='$studyDay')");
    $NUMCHECK = mysqli_num_rows($CHECK);
    if($NUMCHECK > 0 ){
        echo <<<JS
        alert("Data sudah ada");
JS;
    }else{
    
    $INSERT = mysqli_query($con, "INSERT INTO attendance VALUES ('','$ft_id','$dp_id','$term','$year','$studyDay','$studyClass','$s_id','$classId','$t_id')");
    echo <<<JS
        refreshAddList('addList', 'attendance', '$re_id','$ft_id', '$dp_id', '$classId');
JS;
    }
    //$('.modal-backdrop').hide();
?>

