<?php
    include_once 'connect.php';
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
        
function faculty($ft_id){
    include 'connect.php';
    $sql = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$ft_id'");
    $row = mysqli_fetch_array($sql);
    $result = $row['ft_arab_name'];
    return $result;
}

function department($dp_id){
    include 'connect.php';
    $sql = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$dp_id'");
    $row = mysqli_fetch_array($sql);
    $result = $row['dp_arab_name'];
    return $result;
}

function register($order){
    include 'connect.php';
    $sql = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE p_id='0' ORDER BY $order DESC");
    //$row = mysqli_fetch_array($sql);
    return $sql;
}

function registerSelect($re_id){
    include 'connect.php';
    $sql = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE re_id='$re_id'");
    $row = mysqli_fetch_array($sql);
    return $row;
}

function subjectName($ft_id,$dp_id,$classId,$term){
    include 'connect.php';
    //$sql = $term;
    
    $sql = mysqli_query($con, "SELECT tc.*,s.*,t.* FROM registerSubject tc
                               INNER JOIN subject s ON tc.s_id=s.s_id
                               INNER JOIN teachers t ON tc.t_id=t.t_id
                               WHERE tc.ft_id='$ft_id' AND tc.dp_id='$dp_id' AND tc.rs_class='$classId' AND tc.rs_term='$term'
                               ");
      
     
    return $sql;
}

function dayName($id){
    switch ($id){
        case '1':
            $dayName = "<font color='green'>ISNIN</font>";
            break;
        case '2':
            $dayName = "<font color='red'>SELASA</font>";
            break;
        case '3':
            $dayName = "<font color='yellow'>RABU</font>";
            break;
        case '4':
            $dayName = "<font color='blue'>KHAMIS</font>";
            break;
        case '5':
            $dayName = "<font color='grey'>JUMAT</font>";
            break;
        case '6':
            $dayName = "<font color='pink'>SABTU</font>";
            break;
        case '7':
            $dayName = "<font color='orange'>AHAD</font>";
            break;
    }
    return $dayName;
}
?>
