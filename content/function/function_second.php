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
    
    function year($connection){
        include $connection;
        $sql = mysqli_query($con, "SELECT * FROM year ORDER BY year");
        return $sql;
    }
    
    function faculty($connection){
        include $connection;
        $faculty = mysqli_query($con, "SELECT * FROM fakultys");
        return $faculty;
    }
    
    function department($connection){
        include $connection;
        $department = mysqli_query($con, "SELECT * FROM departments");
        return $department;
    }
?>
