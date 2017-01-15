<?php
    header("content-type:text/javascript");
    
    include '../../../connect.php';
    $t_id = $_POST['teacher'];
    $s_id = $_POST['s_id'];
    $re_id = $_POST['register'];
    $ft_id = $_POST['ft_id'];
    $dp_id = $_POST['dp_id'];
    $rs_class = $_POST['rs_class'];
    $rs_lastUpdate = date('Y-m-d');
    
    //get data from register data
    $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE re_id='$re_id'");
    $registerResult = mysqli_fetch_array($register);
    $rs_term = $registerResult['term_id'];
    $rs_year = $registerResult['year'];
    
    //echo "alert('$year');";
    $registerSubjectCheck = mysqli_query($con, "SELECT * FROM registerSubject WHERE s_id='$s_id' AND ft_id='$ft_id' AND dp_id='$dp_id'");
    $registerSubjectCheckNum = mysqli_num_rows($registerSubjectCheck);
    
    //echo "alert('$registerSubjectCheckNum');";
    if($registerSubjectCheckNum > '0'){
        echo "alert('Data sudah ada !');";
        echo "document.getElementById('msg').innerHTML = '';";
    }else{
        $INSERT = mysqli_query($con, "INSERT INTO registerSubject 
                          (s_id,t_id,re_id,ft_id,dp_id,rs_class,rs_term,rs_academic_year,rs_lastUpdate)
                          values
                          ('$s_id','$t_id','$re_id','$ft_id','$dp_id','$rs_class','$rs_term','$rs_year','$rs_lastUpdate')
                          ");
        echo "alert('Data berhasil di tambah');";
        echo "document.getElementById('msg').innerHTML = '';";
    }
?>