<?php
    header("content-type:text/javascript");
    include '../../../../connect.php';
    
    $mustawa = $_POST['mustawa'];
    $mustawaText = addslashes($mustawa);
    
    $group = $_POST['group'];
    $groupText = addslashes($group);
    
    $reciet = $_POST['reciet'];
    $recietText = addslashes($reciet);
    
    $prize = $_POST['prize'];
    $prizeText = $_POST['prize'];
    
    $st_idText = $_POST['st_id'];
    
    $dateRegister = $_POST['dateReg'];
    

    //Get mustawa data from mustawadata table
    $mustawadata_sql = mysqli_query($con, "SELECT * FROM mustawadata WHERE mustawaData_id='$mustawaText'");
    $mustawadata_result = mysqli_fetch_array($mustawadata_sql);
    $yearFromtable = $mustawadata_result['year'];

    //Check mustawa exist registering
    $registerCheck = mysqli_query($con, "SELECT * FROM mustawa_register WHERE mustawadata_id='$mustawaText' AND st_id='$st_idText'");
    $registerCheckNum = mysqli_num_rows($registerCheck);
    
    //Check reciet year from mustatawa_register
    $mustawaYear = mysqli_query($con, "SELECT * FROM mustawa_register WHERE mustawa_register_id=(SELECT MAX(mustawa_register_id) FROM mustawa_register WHERE year='$yearFromtable')");
    $mustawaYearResult = mysqli_fetch_array($mustawaYear);
    $yearForCheck = $mustawaYearResult['year'];
    
    //Check reciet collum from mustawa_register
    $recietCheck = mysqli_query($con, "SELECT * FROM mustawa_register WHERE reciet='$recietText' AND year='$yearFromtable'");
    $recietCheckNum = mysqli_num_rows($recietCheck);
    
    if($yearFromtable!=$yearForCheck){
        $recietFromRegister = '1';
        $year = $yearFromtable;
    }else{
        $recietFromRegister = $recietText;
        $year = $yearFromtable;
    }
    
    
    if($registerCheckNum > 0){
        echo 'alert("Sudah daftar");';
        echo 'document.getElementById("process").innerHTML = "";';
    }else if($recietCheckNum > 0){
        echo 'document.getElementById("recietAlert").innerHTML = "<font color=\'red\'>No. Resit suda ada</font>";';
        echo 'document.getElementById("reciet").focus();';
        echo 'document.getElementById("process").innerHTML = "";';
    }else{
        $insert = mysqli_query($con, "INSERT INTO mustawa_register
                                  (mustawadata_id,payMoney,register_date,reciet,st_id,learningGroup,learningStatus,year)
                                   VALUES
                                  ($mustawaText,$prizeText,'$dateRegister',$recietFromRegister,$st_idText,$groupText,'0',$year)
                                   ");
        echo "mustawaPay($st_idText);";
        echo 'document.getElementById("process").innerHTML = "";';
        echo 'document.getElementById("recietAlert").innerHTML = "";';
        echo "alert('berhasil');";
    }

?>

